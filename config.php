<?php

// just in case... ~sp
if (!defined('PHP_EOL')) {
	define('PHP_EOL', "\n");
}

/**
 * Root path
 */
define('APPLICATION_ROOT', $_SERVER['DOCUMENT_ROOT']);

// Un-comment line below for local development - causes resources to be loaded from local assets
//define('URL_BASE', '//joinmozilla.local/');
if (!defined('URL_BASE')) {
  /**
   * URL base for assets CDN (default is path to BSD Tools CDN)
   *
   * It's VERY IMPORTANT that this use the protocol-relative URL format for a couple reasons.
   * 1. It won't cause security warnings in IE because you won't be mixing http:// and https://
   * 2. If you use http://, BSD will re-write and proxy the URL, BREAKING WEBFONTS IN Firefox.
   */
  define('URL_BASE', '//donate.mozilla.org/page/-/protecttheweb/');
}
/**
 * Cache-busting constant for assets
 * Change ver string when assets need to be refreshed.
 * Append ?ver=<?= VER > to end of assets urls
 */
define('VER', '0.1');

/**
 * Return the HTML tag fragment with conditional-comment IE classes.
 */
function html_open() {
	return '
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js not-ie"> <!--<![endif]-->
';
}
/**
 * Return standard scripts and styles markup
 */
function head_shared() { ?>
<!-- Empty conditional comment hack
 Prevents load stacking in IE8
 See http://www.phpied.com/conditional-comments-block-downloads/ -->
<!--[if IE]><![endif]-->

<!-- Chrome Frame for browsers that support it -->
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta name="viewport" content="width=978" />
<meta name="DC.creator" content="Crowd Favorite - http://www.crowdfavorite.com" />

<link rel="shortcut icon" type="image/ico" href="http://mozilla.org/favicon.ico" />

<link rel="stylesheet" href="<?= URL_BASE; ?>assets/css/main-en.css?ver=<?= VER; ?>" type="text/css" media="screen" />

<script type="text/javascript" src="<?= URL_BASE; ?>assets/js/modernizr.js?ver=<?= VER; ?>"></script>
<script type="text/javascript" data-main="<?= URL_BASE; ?>assets/js/main.js" src="<?= URL_BASE; ?>assets/js/require-jquery.js?ver=<?= VER; ?>"></script>
<?php
}

header('Content-type: text/html; charset=utf-8');
if (array_key_exists('locale', $_GET))
  $locale = htmlspecialchars($_GET['locale']);
else
  $locale = 'en-US';

/**
 * Consistent locale string for images so we can translate them.
 */
$img_locale = str_replace('-', '_', $locale);

putenv("LC_ALL=" . $locale);
setlocale(LC_ALL , $locale);

bindtextdomain('messages', APPLICATION_ROOT . '/locale');
bind_textdomain_codeset("messages", "UTF-8");
textdomain('messages');

function bsdtools_custom_fields_to_select_data() {
	/**
	 * BSD Tools custom fields output defintions. Each 1st level array will create a Select box
	 * Each 2nd level array item will create a select option.
	 *
	 * There must be a corresponding input element in the DOM for these items to replace.
	 */
	$fields = array(
		'custom1_fit' => array(
			'womens' => /* L10n: Womens T-Shirt select text */ _("Women's"),
			'mens' => /* L10n: Mens T-Shirt select text */ _("Men's")
		),
		'custom1_size' => array(
			's' => /* L10n: Small T-Shirt Size select text */ _("Small"),
			'm' => /* L10n: Medium T-Shirt Size select text */ _("Medium"),
			'l' => /* L10n: Large T-Shirt Size select text */ _("Large"),
			'xl' => /* L10n: X-Large T-Shirt Size select text */ _("XL"),
			'xxl' => /* L10n: 2X-Large T-Shirt Size select text */ _("XXL"),
		),
		'custom2' => array(
			'blue' => /* L10n: Blue T-Shirt select text */ _("Blue"),
			'black' => /* L10n: Black T-Shirt select text */ _("Black"),
			'grey' => /* L10n: Grey T-Shirt select text */ _("Grey")
		)
	);

	$js = PHP_EOL."\t\tvar field_trans = {".PHP_EOL;
	foreach ($fields as $field_name => $field_data) {
		$field_name = addslashes($field_name);
		$js .= "\t\t\t'{$field_name}': {".PHP_EOL;
		foreach ($field_data as $field_key => $field_item) {
			$field_key = addslashes($field_key);
			$field_item = addslashes($field_item);
			$js .= "\t\t\t\t'{$field_key}': '{$field_item}',".PHP_EOL;
		}
		$js .= "\t\t\t},".PHP_EOL;
	}
	$js .= "\t\t}; // end field trans obj";
		
	return $js;
}
?>