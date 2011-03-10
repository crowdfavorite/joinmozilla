<?php require_once('config.php'); ?>
<!DOCTYPE html>
   <?= html_open(); ?>
   <head>
   <meta charset="utf-8" />
   <title><?= _('Join Mozilla') ?></title>
   <?= head_shared() ?>
   </head>
   <body class="page-index">
     <div id="act-1" class="act">
       <header id="moz-header">
         <h1><a href="http://mozilla.org/"><img id="moz-logo" src="<?= URL_BASE; ?>assets/img/mozilla-logo.png?ver=<?= VER; ?>" alt="Mozilla" width="109" height="28" /></a></h1>
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
      <hgroup class="title-card">
        <h1><?= _('Join Mozilla') ?></h1>
        <h2><?= _('Help us build a better Web.') ?></h2>
      </hgroup>
      <div id="crest">
        <img id="shield" src="<?= URL_BASE; ?>assets/img/mozilla-crest.png?ver=<?= VER ?>" alt="Mozilla" />
        <p id="motto-1" class="content"><?= _('We\'re a non-profit organization who believes the Web should be free, open, accessible, transparent, safe and&mdash;most of all&mdash;a force for the good of humanity.') ?></p>
        <p id="motto-2" class="content"><?= _('We\'re the proud makers of Firefox and, every day, we strive to create innovations that make the Web a better place for the billions of people who use it.') ?></p>
      </div><!--/crest-->
      <div class="call-to-action">
        <a class="button down" href="#act-3"><?= _('Protect the Web. Join Mozilla') ?></a>
      </div>
    </div><!--/in-->
  </div><!--/act-1-->
  <section id="act-2" class="act">
    <div class="in">
      <hgroup class="title-card">
        <h1><?= _('Share the Love, Show the Love') ?></h1>
        <h2><?= _('Joining gives you:') ?></h2>
      </hgroup>
      <div class="content">
        <img id="img-merch" src="<?= URL_BASE; ?>assets/img/merch-<?= $img_locale ?>.png?ver=<?= VER ?>" alt="" />
        <ul>
          <li><span><?= _('Deep inner pride for helping Mozilla build a Web for everyone') ?></span></li>
          <li><span><?= _('Access to cool Mozilla swag that will impress your friends') ?></span></li>
          <li><span><?= /* L10n: This can be replaced with a local idiom that means "good feelings" */ _('Good feelings in the cockles of your heart') ?></span></li>
        </ul>
		<p><a href="http://www.mozilla.org/join/faq.html"><?= _('Have questions?') ?></a></p>
      </div><!--/content-->
    </div><!--/in-->
  </section>
  <section id="act-3" class="act">
    <div class="in">
      <img id="merch-shirt" src="<?= URL_BASE; ?>assets/img/shirt-<?= $img_locale ?>.png?ver=<?= VER ?>" alt="Shirt + Card - $30" />
      <img id="merch-card" src="<?= URL_BASE; ?>assets/img/card-<?= $img_locale ?>.png?ver=<?= VER ?>" alt="Just the Card - $5" />
