# Lib Fonts for FPDF


## Generating Fonts for Different Languages

Everything is based off of the [League Gothic](http://www.theleagueofmoveabletype.com/fonts/7-league-gothic) font file `League_Gothic-webfont.ttf` in the `/assets/fonts/league-gothic` directory. 

Unfortunately character set generation is a bit limited by the tools at hand. The current workflow uses [ttf2pt1](http://ttf2pt1.sourceforge.net/) to generate the necessary `t1a` and `afm` postscript files necessary for use in the [FPDF](http://fpdf.org/) library. Since postscript files have limited space for characters there will need to be character set specific files created. Also, the software wants to convert from TrueType font format. To convert fonts from OpenType format go to [FontSquirrel WebFont Generator](http://www.fontsquirrel.com/fontface/generator) to convert the font. IMPORTANT: select the "Custom Subsetting..." option and select everything available to completely duplicate the font - the "No Subsetting" option actually does subset...

Character sets supported by the conversion software are:

- latin1: for all the languages using the Latin-1 encoding
- latin2: for the Central European languages
- latin4: for the Baltic languages
- latin5: for the Turkish language
- cyrillic: for the languages with Cyrillic alphabet
- russian: historic synonym for cyrillic
- bulgarian: historic synonym for cyrillic
- adobestd: for the AdobeStandard encoding used by TeX

The copy of League Gothic supplied is a very full featured font and should handle all of these variations.

**To add a language specific font file:**

- Generate the `t1a` & `afm` files
	- IMPORTANT: Use the map files provided by FPDF to ensure that the character set is extracted properly.
	- Please follow the `league-gothic-ISO-8859-x` file name format. The PDF generator looks for `league-gothic-` paired with `ISO-8859-x` to find the correct font file.
	- example to generate ISO-8859-1 files: `ttf2pt1 -a -L /path/to/joinmozilla/lib/fpdf16/font/makefont/iso-8859-1.map /path/to/League_Gothic-webfont.ttf league-gothic-ISO-8859-1`
	- Move the created files to the `/joinmozilla/lib/fonts` directory if they weren't created there
- Generate the PHP file for FPDF uses to load the font
	- Open `/joinmozilla/lib/fonts/mkfont.php` and add a new processing line for the font that you are adding.
	- example: `MakeFont($font_dir.'League_Gothic-webfont.ttf', $this_dir.'league-gothic-ISO-8859-1.afm', 'ISO-8859-1');`
	- Run the file to generate the font config file.
- Set the language -> charset relationships in the PDF config file
	- Open `/joinmozilla/assets/pdf/pdf-config.php`
	- Edit the 'langs' sub-array to create language to charset relationships. These are used for font-selection as well as UTF8 -> ISO string translations.
	- If no relationship exists for a language that language will be treated as ISO-8859-1.


## This Directory

The simple fact is FPDF wants to look in to a single directory for its fonts so these can't be stored along with their full counterparts in nested directories.