<?php

define('APPLICATION_ROOT', $_SERVER['DOCUMENT_ROOT']);

header('Content-type: text/html; charset=utf-8');
if (array_key_exists('locale', $_GET))
  $locale = $_GET['locale'];
else
  $locale = 'en-US';
putenv("LC_ALL=" . $locale);
setlocale(LC_ALL , $locale);

bindtextdomain('messages', APPLICATION_ROOT . '/locale');
bind_textdomain_codeset("messages", "UTF-8");
textdomain('messages');

require_once('header.php');
?>

<p>
<?= _('I AM AN OFFICIAL, CERTIFICATE HOLDING, WEB BETTERING, OPEN SOFTWARE LOVING, PUBLIC RESOURCE PROTECTING, FORCE OF GOOD MAKING, SUPPORTER OF MOZILLA.') ?>
</p>

<p><?= sprintf( /* L10n: '%s' is a date. */ _('ENDORSED BY MOZILLA ON %s'), date(_("n/j/Y"))) ?></p>

</div>
</section>

<?php
require_once('footer.php');
?>