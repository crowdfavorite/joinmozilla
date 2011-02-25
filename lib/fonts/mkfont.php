<?php
# Font must first be converted to a t1a w/afm via the ttf2pt1 utility
# $ ttf2pt1 -a League_Gothics-webfont.ttf league-gothic
# will produce league-gothic.t1a & league-gothic.afm

define('FILE_ROOT', dirname(__FILE__).'/../../../');

# Generate config file & compress font for FPDF useage
include(FILE_ROOT.'lib/fpdf16/font/makefont/makefont.php');
$this_dir = FILE_ROOT.'lib/fonts/';
$font_dir = FILE_ROOT.'assets/fonts/league-gothic/';

MakeFont($font_dir.'League_Gothic-webfont.ttf', $this_dir.'league-gothic.afm');

?>