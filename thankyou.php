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

?>
<!DOCTYPE html> 
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]--> 
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]--> 
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]--> 
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js not-ie"> <!--<![endif]--> 
<head> 
  <meta charset="utf-8" /> 
  <title><?= _('Join Mozilla') ?></title> 
  
  <!-- Empty conditional comment hack
       Prevents load stacking in IE8
       See http://www.phpied.com/conditional-comments-block-downloads/ --> 
  <!--[if IE]><![endif]--> 
  
  <!-- Chrome Frame for browsers that support it --> 
  <meta http-equiv="X-UA-Compatible" content="chrome=1"> 
    <meta name="viewport" content="width=978" /> 
    <meta name="DC.creator" content="Crowd Favorite - http://www.crowdfavorite.com" /> 
    
    <link rel="shortcut icon" type="image/ico" href="http://mozilla.org/favicon.ico" /> 
    <link rel="stylesheet" href="assets/css/main.css?ver=0.1" type="text/css" media="screen" /> 
    
    <script type="text/javascript" src="assets/js/modernizr.js?ver=0.1"></script> 
    <script type="text/javascript" data-main="main" src="assets/js/require-jquery.js?ver=0.1"></script> 
    </head><body class="page-thanks"> 
    <div id="act-1" class="act"> 
      <header id="moz-header"> 
	<h1><a href="http://mozilla.org/"><img id="moz-logo" src="assets/img/mozilla-logo.png?ver=0.1" alt="Mozilla" width="109" height="28" /></a></h1> 
	<nav> 
          <ul> 
            <li><a href="http://www.mozilla.org/about/"><?= _('About Us') ?></a></li> 
            <li><a href="http://www.mozilla.org/community/"><?= _('Community Map') ?></a></li> 
            <li><a href="http://www.mozilla.org/projects/"><?= _('Our Projects') ?></a></li> 
            <li><a href="http://www.mozilla.org/contribute/"><?= _('Get Involved') ?></a></li> 
          </ul> 
	</nav> 
      </header>		
      <div class="in"> 
        <div class="title-card"> 
          <h1><?= _('Join Mozilla') ?></h1> 
          <img id="shield-thanks" src="assets/img/page-thanks/mozilla-logo.png" alt="Mozilla" /> 
        </div> 
      </div><!--/in--> 
    </div><!--/act-1--> 
    <section id="act-2" class="act"> 
      <div class="in"> 
        <div id="thanks"> 
          <div class="title-card"> 
            <h1><?= _('Thanks for making the web a better place!') ?></h1> 
          </div> 
          <div class="content"> 
            <p><?= _('You&apos;re officially a card-carrying supporter of Mozilla. Print it out. Put it in your wallet. Flash it with pride.') ?></p> 
          </div> 
          <aside class="social"> 
            <h1 class="title"><?= _('Brag about it now:') ?></h1> 
            <ul> 
              <li class="twitter"><a href="#"><?= _('Twitter') ?></a></li> 
              <li class="facebook"><a href="#"><?= _('Facebook') ?></a></li> 
            </ul> 
          </aside> 
          <a class="call-to-action" href="#"> 
            <img id="mozilla-card" src="assets/img/page-thanks/card.png" alt="" width="227" height="153" />
		  </a>
		  <form method="post" id="get-pdf" name="get-pdf" action="pdf.php" target="_blank" onsubmit="return false;">
			<input type="hidden" name="lang" value="<?= $locale ?>">
			<label for="supporter-name"><?= _('Please enter your name as you would like it to appear on your Mozilla Supporter card.') ?></label>
			<input type="text" id="supporter-name" name="name" value="" />
		  </form>
		  <a class="call-to-action" href="#">
            <span id="print-card-button" class="button fwd" href="#"><span><?= _('Print My Card') ?></span></span> 
          </a> 
        </div><!--/call-to-action--> 
      </div><!--/in--> 
    </section><!--/act-2--> 

    <?= /* L10n: Displayed next to a dynamic ticker showing number of downloads */ _('# of Firefox browsers distributed worldwide') ?>

<!-- DEMO FUNCTIONALITY TO GET THE USER THEIR PDF -->
<script type="text/javascript">
	jQuery(function($) {
		$('.call-to-action').click(function() {
			$('form#get-pdf').removeAttr('onsubmit').submit();
			return false;
		});
	});
</script>
<!-- /DEMO FUNCTIONALITY TO GET THE USER THEIR PDF -->

<?php require_once('footer.php'); ?>
