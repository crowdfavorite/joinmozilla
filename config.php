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
   */
  define('URL_BASE', 'http://donate.mozilla.org/page/-/protecttheweb/');
}
/**
 * Cache-busting constant for assets
 * Change ver string when assets need to be refreshed.
 * Append ?ver=<?= VER > to end of assets urls
 */
define('VER', '0.1');

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