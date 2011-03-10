<?php
/**
 * Root path
 */
define('APPLICATION_ROOT', $_SERVER['DOCUMENT_ROOT']);

// Un-comment line below for local development - causes resources to be loaded from local assets
// define('URL_BASE', '');
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
?>