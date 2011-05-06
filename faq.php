<?php
require_once('config.php');

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

?>
<!DOCTYPE html> 
<?= html_open(); ?>
<head> 
	<meta charset="utf-8" /> 
	<title><?= _('Join Mozilla') ?></title> 
	<?= head_shared() ?>
</head>
<body class="page-compact">
	<div id="act-1" class="act"> 
		<?php require_once('moz-header.php'); ?>
		<div class="in"> 
      <div class="title-card"> 
        <h1><?= _('Join Mozilla') ?></h1> 
        <img id="firefox-compact" src="assets/img/page-compact/firefox-logo.png" alt="<?= _('Mozilla Firefox') ?>" /> 
      </div> 
    </div><!--/in-->
  </div><!--/act-1-->
  <section id="act-2" class="act">
		<div id="faq" class="in">
		  <div class="title-card"> 
          <h1><?= _('Join Mozilla Support FAQ') ?></h1> 
      </div>
      <div class="content">
        <h2><?= _('How long will I be an official supporter?') ?></h2>
        <p>
          <?= _('When you join Mozilla you will become an official supporter for a 12-month period from the date you signed up. A few weeks before the 12-month period is complete, you will receive a notification asking if you would like to join again for another year. Please know that your subscription will not auto-renew.') ?>
        </p>
        <h2><?= _('What if I change my mind?') ?></h2>
        <p>
          <?= _('You can unsubscribe from any Join Mozilla communications at any time. Please know that your donation is a one-time event, and will not auto-renew.') ?>
        </p>
        <h2><?= _('When I Join Mozilla, what happens to my data?') ?></h2>
        <p>
          <?php /* TODO: Replace 'http://mozilla.org/' with actual URL for Join Mozilla ToS. */ ?>
          <?= sprintf( /* L10n: both placeholders are URLs. */ _('At the point of signing up your data is being given to Mozilla (which includes the Mozilla Foundation and Corporation). We will never sell, rent, or give your information to any third-party, and will only contact you as part of this program. For more information, check out our <a href="%s">terms of service</a> and <a href="%s">privacy policy</a>.'), "http://mozilla.org/", "http://www.mozilla.org/about/policies/privacy-policy.html") ?>
        </p>
        <h2><?= _('How will my data be used?') ?></h2>
        <p>
          <?= _('By signing up for the Join Mozilla program, your data will only be used by Mozilla (and its service providers). You will only receive information Mozilla related information.') ?>
        </p>
        <h2><?= _('Help! I have a question about being part of Join Mozilla. Who do I ask?') ?></h2>
        <p>
          <?= _('Fret not! Just send an e-mail to joinmozilla@mozilla.org and we\'ll get you sorted out.') ?>
        </p>
      </div><!--/content-->
		</div><!--/faq-->
	</section><!--/act-2-->
	<?php
	require_once('moz-footer.php');
	?>
</body>
</html>