<?php
# Font must first be converted to a t1a w/afm via the ttf2pt1 utility
# $ ttf2pt1 -a League_Gothic-webfont.ttf league-gothic
# will produce league-gothic.t1a & league-gothic.afm
# !IMPORTANT - see individual lines below for samples of creating encoding specific fonts

define('FILE_ROOT', realpath(dirname(__FILE__).'/../../'));
var_dump(FILE_ROOT);
# Generate config file & compress font for FPDF useage
include(FILE_ROOT.'/lib/fpdf16/font/makefont/makefont.php');
$this_dir = FILE_ROOT.'/lib/fonts/';
$font_dir = FILE_ROOT.'/assets/fonts/league-gothic/';

# Std. Western Font
# ttf2pt1 -a -L /path/to/joinmozilla/lib/fpdf16/font/makefont/iso-8859-1.map League_Gothic-webfont.ttf league-gothic-ISO-8859-1
MakeFont($font_dir.'League_Gothic-webfont.ttf', $this_dir.'league-gothic-ISO-8859-1.afm', 'ISO-8859-1');

# Eastern Euro Font
# ttf2pt1 -a -L /path/to/joinmozilla/lib/fpdf16/font/makefont/iso-8859-2.map League_Gothic-webfont-super-full.ttf league-gothic-ISO-8859-1
MakeFont($font_dir.'League_Gothic-webfont.ttf', $this_dir.'league-gothic-ISO-8859-2.afm', 'ISO-8859-2');

?>