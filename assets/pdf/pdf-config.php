<?php
/*
- All coordinates from top left of template
 	- fudged due to inaccuracies of pdf engine
- All measurements in points
- All font sizes in points
- PDF Template Export
	- PDF 1.3 spec required
	- embed complete fonts (set to subset below 1% use)
	- do not flatten transparency
	- do not convert text to outlines
	- no compression
- PDF file "MediaBox" determines page size
- To add new fonts see: http://www.fpdf.org/en/tutorial/tuto7.htm
*/

$config = array(
	'info' => array(
		'title' => 'Mozilla Supporter Certification',
		'author' => 'Mozilla',
		'subject' => 'Join Mozilla Certification Files'
	),
	// Available Template Languages, will default to 'en'
	'langs' => array(
		'en'
	),
	// Default name in case something goes wrong
	'default_name' => 'Fabulous Mozilla Supporter',
	// delivery method
	'delivery_method' => 'I', // 'I' for inline, 'D' to force Download
	// define fonts
	'fonts' => array(
		'LeagueGothic' => 'league-gothic.php'
	),
	// determines page order
	'pages' => array(
		array(
			'template_basename' => 'joinmoz-card', // name of template without lang identifier or file ext
			'orientation' => 'Landscape', // must be 'Landscape' or 'Portrait'
			'text' => array(
				'name' => array(
					'position' => array(
						'x' => 20, // float
						'y' => 112 // float
					),
					'font' => 'LeagueGothic',
					'size' => 14, // in points
					'color' => array(
						'r' => 255,
						'g' => 255,
						'b' => 255
					)
				),
				'date' => array(
					'position' => array(
						'x' => 20,
						'y' => 125
					),
					'font' => 'LeagueGothic',
					'size' => '10',
					'color' => array(
						'r' => 255,
						'g' => 255,
						'b' => 255
					)
				)
			)
		),
		array(
			'template_basename' => 'joinmoz-cert',
			'orientation' => 'Landscape',
			'text' => array(
				'endorsed_by' => array(
					'position' => array(
						'x' => 0,
						'y' => '521',
						'w' => '306' // optional, defaults to 0 (full width of document) if absent
					),
					'font' => 'LeagueGothic',
					'size' => '30',
					'align' => 'R', // optional, defaults to 'L'
					'color' => array(
						'r' => 255,
						'g' => 255,
						'b' => 255
					)
				),
				'on_date' => array(
					'position' => array(
						'x' => 485,
						'y' => 521
					),
					'font' => 'LeagueGothic',
					'size' => '30',
					'color' => array(
						'r' => 255,
						'g' => 255,
						'b' => 255
					)
				)
			)
		),
	)
);

?>