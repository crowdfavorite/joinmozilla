<?php
/*
Temporary fix: Override default URL base in config.php and use files from this domain. We need to load resources locally because Firefox doesn't load font files cross-domain by default.

Better solutions:
- Somehow add an .htaccess rule to BSD or CDN allowing more permissive cross-domain loading of fonts
- Make all pages live on the same domain
*/
//define('URL_BASE', '');
require_once('config.php');
?>
<!DOCTYPE html> 
<?= html_open(); ?>
<head> 
    <meta charset="utf-8" /> 
    <title><?= _('Join Mozilla') ?></title> 
    <?= head_shared() ?>
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
                status : false, // check login status
                cookie : false, // enable cookies to allow the server to access the session
            });
            var link = document.getElementById("facebook-link");
            if (link) {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    FB.ui({
                    "method":"feed",
                    "description":"<?= /* L10n: Facebook status update body */ _('I just joined Mozilla, the makers of Firefox. Together we&rsquo;re protecting the world&rsquo;s largest public resource. Join us today!') ?>",
                    "name":"<?= /* L10n: Facebook status update title */ _('I protect the Internet!') ?>",
              		"picture":"https://donate.mozilla.org/page/-/joinmozilla/assets/img/firefox-crest.png",
                    "link":"http://www.mozilla.org/join"
                }, function() {
                    //alert('Thanks for sharing!');
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
      <div class="in clearfix"> 
        <div class="col-1">
          <div class="title-card"> 
            <h1><?= _('Thanks for making<br/> the web a better place!') ?></h1> 
          </div> 
          <div class="content"> 
            <p><?= _('You&rsquo;re officially a card-carrying<br /> supporter of Mozilla. Print it out.<br/> Put it in your wallet. Flash it with pride.') ?></p> 
          </div> 
          <aside class="social"> 
            <h1 class="title"><?= _('Brag about it now:') ?></h1> 
            <ul> 
              <li class="twitter"><a onclick="window.open(this.href, 'joinmozilla', 'location=false,status=false,toolbar=false,width=550,height=400'); return false;" href="http://twitter.com/share?text=<?= /* L10n: Tweet, 120 characters max */ urlencode(_('I just made the web better and Joined Mozilla. You can too!')) ?>&amp;url=<?= urlencode('http://www.mozilla.org/join'); ?>"><?= _('Twitter') ?></a></li> 
              <li class="facebook"><a id="facebook-link" href="#"><?= _('Facebook') ?></a></li> 
            </ul> 
          </aside> 
        </div><!--/col-1-->
        <div class="col-2"> 
          <div class="card-form">
            <a class="call-to-action" href="#"> 
              <img id="mozilla-card" src="assets/img/page-compact/card-<?= $img_locale ?>.png" alt="" width="281" height="182" />
            </a>
            <form method="post" id="get-pdf" name="get-pdf" action="pdf.php" target="_blank" onsubmit="return false;">
              <input type="hidden" name="locale" value="<?= $locale ?>">
              <input type="text" id="supporter-name" name="name" value="" placeholder="<?= _('Your Name') ?>" />
              <p class="caption"><label for="supporter-name"><?= _('Please enter your name as you would like it to appear on your Mozilla Supporter card.') ?></label></p>
            </form>
            <a href="#" id="print-card-button" class="call-to-action button fwd"><span><?= _('Print My Card') ?></span></a> 
          </div><!--/card-form-->
        </div><!--/col-2--> 
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

    <?php require_once('moz-footer.php'); ?>
    </body>
</html>