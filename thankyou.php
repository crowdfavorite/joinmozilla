<?php
/**
 * Override default URL base in config.php
 * and use files from this domain. We're loading local resources because Firefox
 * doesn't load font files cross-domain.
 */
define('URL_BASE', '');
require_once('config.php');
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
    <link rel="stylesheet" href="<?= URL_BASE; ?>assets/css/main-en.css?ver=<?= VER ?>" type="text/css" media="screen" /> 
    
    <script type="text/javascript" src="<?= URL_BASE ?>assets/js/modernizr.js?ver=<?= VER ?>"></script>
	<script type="text/javascript" data-main="main" src="<?= URL_BASE ?>assets/js/require-jquery.js?ver=<?= VER ?>"></script>
    <?php
    /*
    Load Facebook connect Javascript asyncronously and initialize stream share
    http://developers.facebook.com/docs/reference/javascript/fb.init/
    http://developers.facebook.com/docs/reference/javascript/FB.ui/
    http://developers.facebook.com/docs/reference/dialogs/feed/
    */
    ?>
    <script type="text/javascript">
        require(["http://connect.facebook.net/en_US/all.js"], function(){
          window.fbAsyncInit = function() {
            FB.init({
                appId  : '198340516862242',
                status : true, // check login status
                cookie : true, // enable cookies to allow the server to access the session
            });
            var link = document.getElementById("facebook-link");
            if (link) {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    FB.ui({
                    "method":"feed",
                    "description":"<?= /* L10n: Facebook status update body */ _('I just joined Mozilla, the makers of Firefox. Together we&rsquo;re protecting the world&rsquo;s largest public resource. Join us today!') ?>",
                    "name":"<?= /* L10n: Facebook status update title */ _('I protect the Internet!') ?>",
              		"picture":"http://donate.mozilla.org/page/-/protecttheweb/assets/img/mozilla-crest.png",
                    "link":"http://www.mozilla.org/join"
                }, function() {
                    window.location.href = "http://www.mozilla.org/join";
                });
                }, false);
            };
          };
        });
		// form submission
		jQuery(function($) {
			$('.call-to-action').click(function() {
				$('form#get-pdf').removeAttr('onsubmit').submit();
				return false;
			});
		});
	</script>
    </head>
    <body class="page-thanks"> 
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
              <li class="twitter"><a onclick="window.open(this.href, 'joinmozilla', 'location=false,status=false,toolbar=false,width=550,height=400'); return false;" href="http://twitter.com/share?text=<?= /* L10n: Tweet, 120 characters max */ urlencode(_('I just made the web better and Joined Mozilla. You can too!')) ?>&amp;url=<?= urlencode('http://www.mozilla.org/join'); ?>"><?= _('Twitter') ?></a></li> 
              <li class="facebook"><a id="facebook-link" href="#"><?= _('Facebook') ?></a></li> 
            </ul> 
          </aside> 
          <a class="call-to-action" href="#"> 
            <img id="mozilla-card" src="assets/img/page-thanks/card.png" alt="" width="227" height="153" />
          </a>
          <form method="post" id="get-pdf" name="get-pdf" action="pdf.php" target="_blank" onsubmit="return false;">
            <input type="hidden" name="locale" value="<?= $locale ?>">
            <label for="supporter-name"><?= _('Please enter your name as you would like it to appear on your Mozilla Supporter card.') ?></label>
            <input type="text" id="supporter-name" name="name" value="" />
          </form>
          <a class="call-to-action" href="#">
            <span id="print-card-button" class="button fwd" href="#"><span><?= _('Print My Card') ?></span></span> 
          </a> 
        </div><!--/call-to-action--> 
      </div><!--/in--> 
    </section><!--/act-2--> 
    <!-- <?= /* L10n: Displayed next to a dynamic ticker showing number of downloads */ _('# of Firefox browsers distributed worldwide') ?> -->
    <?php
    /*
    This div required by Facebook JS
    See http://developers.facebook.com/docs/reference/javascript/
    */
    ?>
    <div id="fb-root"></div>
<?php require_once('footer.php'); ?>
