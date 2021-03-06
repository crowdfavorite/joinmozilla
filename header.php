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
	<?php require_once('moz-header.php'); ?>
    <div class="in">
      <hgroup class="title-card">
        <h1><?= _('Join Mozilla') ?></h1>
        <h2><?= _('Help us build a better Web.') ?></h2>
      </hgroup>
      <div id="crest">
        <img id="shield" src="<?= URL_BASE; ?>assets/img/firefox-crest.png?ver=<?= VER ?>" alt="<?= _('Mozilla Firefox') ?>" />
        <p id="motto-1" class="content"><?= _('We\'re a non-profit organization that believes the Web should be open, accessible, transparent, safe and&mdash;most of all&mdash;a force for the good of humanity.') ?></p>
        <p id="motto-2" class="content"><?= _('We\'re the proud makers of Firefox and, every day, we strive to create innovations that make the Web a better place for the billions of people who use it.') ?></p>
      </div><!--/crest-->
      <div class="call-to-action">
        <a class="button down" href="#act-3"><?= _('Love the Web? Join Mozilla') ?></a>
      </div>
    </div><!--/in-->
  </div><!--/act-1-->
  <section id="act-2" class="act">
    <div class="in">
      <img id="img-merch" width="279" height="223" src="<?= URL_BASE; ?>assets/img/merch-<?= $img_locale ?>.png?ver=<?= VER ?>" alt="" />
      <hgroup class="title-card">
        <h1><?= _('Share the Love, Show the Love') ?></h1>
        <h2><?= _('For as little as $5, you can become a&nbsp;supporter.') ?> </h2>
      </hgroup>
      <div class="content">
        <p><?= _('Joining gives you:') ?></p>
        <ul>
          <li><span><?= _('Deep inner pride for helping Mozilla build a Web for everyone') ?></span></li>
          <li><span><?= _('Access to cool Mozilla and Firefox gear that will impress your friends') ?></span></li>
          <li><span><?= /* L10n: This can be replaced with a local idiom that means "good feelings" */ _('Good feelings in the cockles of your heart') ?></span></li>
        </ul>
        <p><?= sprintf(_('Want to do more? We also have lots of amazing <a href="%s">volunteer opportunities</a> available.'), 'http://www.mozilla.org/contribute/') ?> </p>
        <p><a href="http://join.mozilla.org/faq.en.html"><?= _('Have questions?') ?></a></p>
      </div><!--/content-->
    </div><!--/in-->
  </section>
  <section id="act-3" class="act">
    <div class="in">