<?php
# Allow only POST request methods
if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
	@header('HTTP/1.1 405 Method Not Allowed');
	@header('Status: 405 Method Not Allowed');
	exit;
}

# prevent caching
@header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
@header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
@header('Cache-Control: no-store, no-cache, must-revalidate');
@header('Cache-Control: post-check=0, pre-check=0', false);
@header('Pragma: no-cache');

// constants
#define('APPLICATION_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
define('APPLICATION_ROOT', realpath(dirname(__FILE__)).'/');
define('LIB_DIR', APPLICATION_ROOT.'lib/'); // requires trailing slash
define('FPDF_FONTPATH', LIB_DIR.'fonts/'); // requires trailing slash
define('PDF_TEMPLATE_DIR', APPLICATION_ROOT.'assets/pdf/'); // requires trailing slash

// get libs
require_once(PDF_TEMPLATE_DIR.'pdf-config.php');
require_once(LIB_DIR.'fpdf16/fpdf.php');
require_once(LIB_DIR.'FPDI-1.4/fpdi.php');
// Set-up translations
$locale = htmlspecialchars(!empty($_POST['locale']) ? $_POST['locale'] : 'en_US');
// if we don't have a proper match to a language code then revert to english
if (!preg_match('/[a-z]{2}[\-_][A-Z]{2}/', $locale)) {
	$locale = 'en_US';
}

putenv("LC_ALL=" . $locale);
setlocale(LC_ALL , $locale);

bindtextdomain('messages', APPLICATION_ROOT . '/locale');
bind_textdomain_codeset("messages", "UTF-8");
textdomain('messages');

// Simplify the passed in language code
// this application's default is en-US, but locales should have underscores
// strip based on dash or underscore for safety's sake
$lang = $locale;
if (strpos($lang, '-') != false) {
	$lang = substr($lang, 0, strpos($lang, '-'));
}
elseif (strpos($lang, '_') != false) {
	$lang = substr($lang, 0, strpos($lang, '_'));
}

// set date format
$date_format = /*L10n: Used on both certificate & card. See http://php.net/strftime for formatting directions */ _('%m.%e.%Y');

// Config variable entities
$date = strftime($date_format);
$endorsed_by = /*L10n: Displayed on the left-hand side of the certificate, before "Mozilla on <date>" */ _('ENDORSED BY');
$on_date = sprintf( /*L10n: Displayed on the right-hand side of the certificate, after "Endorsed by Mozilla" */ _('ON %s'), strftime($date_format));

// Name sanitization, be stringent and disallow PDF object delimiter chars
$find = array('/', '(', ')', '>', '<', '%', '{', '}', '[', ']');
$name = (!empty($_POST['name']) ? str_replace($find, '', $_POST['name']) : $config['default_name']);

// fallback support for servers that don't have mbstring support installed in PHP
$name = (function_exists('mb_strtoupper') ? mb_strtoupper($name, 'UTF-8') : strtoupper($name));

// Language specific UTF 8 decoding for FPDF when defined, otherwise default to Standard Western
$charset = (!empty($config['langs'][$lang]) ? $config['langs'][$lang] : 'ISO-8859-1');
$date = iconv('UTF-8', $charset, $date);
$on_date = iconv('UTF-8', $charset, $on_date);
$endorsed_by = iconv('UTF-8', $charset, $endorsed_by);
$name = iconv('UTF-8', $charset, $name);

// init
$pdf =& new FPDI('P', 'pt');
$pdf->SetAuthor($config['info']['author']);
$pdf->SetSubject($config['info']['subject']);
$pdf->SetTitle($config['info']['title']);
$pdf->SetAutoPageBreak(false);
$loaded_fonts = array();

// build
foreach ($config['pages'] as $template) {
	$template_file = PDF_TEMPLATE_DIR.$template['template_basename'].'-'.$lang.'.pdf';
	if (!is_file($template_file)) {
		$template_file = PDF_TEMPLATE_DIR.$template['template_basename'].'-en.pdf';		
	}
	
	// add new page from template
	$pagecount = $pdf->setSourceFile($template_file);
	$pgidx = $pdf->importPage(1, '/MediaBox');
	$pgsize = $pdf->getTemplateSize($pgidx);
	$pdf->addPage($template['orientation'], array($pgsize['h'], $pgsize['w']));
	$pdf->useTemplate($pgidx);
	
	// insert text
	if (!empty($template['text'])) {
		foreach ($template['text'] as $varname => $text) {
			// load font
			if (!in_array($text['font'], $loaded_fonts)) {
				$pdf->AddFont($text['font'], '', sprintf($config['fonts'][$text['font']], $charset));
				array_push($loaded_fonts, $text['font']);
			}
			
			// setup font for this text
			$pdf->SetFont($text['font'], '', $text['size']);
			$pdf->SetTextColor($text['color']['r'], $text['color']['g'], $text['color']['b']);
			$pdf->SetXY($text['position']['x'], $text['position']['y']);
			
			// text align
			$align = 'L';
			if (!empty($text['align']) && in_array($text['align'], array('L', 'C', 'R'))) {
				$align = $text['align'];
			}
			
			// box width
			$width = 0;
			if (!empty($text['position']['w'])) {
				$width = intval($text['position']['w']);
			}
			
			// write				
			$pdf->Cell($width, 0, $$varname, 0, 0, $align);
		}
	}
}

// deliver
$pdfname = /*L10n: Used for certificate download filename */ _('Join-Mozilla-Supporter');
$pdf->Output($pdfname.'.pdf', $config['delivery_method']);

exit;
?>
