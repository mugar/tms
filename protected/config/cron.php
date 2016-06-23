<?php
return array(         
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',         
	'name'=>'Cron',         
	'preload'=>array('log'),          
	'import'=>array(                 
		'application.components.*',                 
		'application.models.*',         
		),         
		// application components         
		'components'=>array(                 
			'db'=>array(                         
				'connectionString' => 'mysql:host=localhost;dbname=tms',                        
				'emulatePrepare' => true,                         
				'username' => 'root',                         
				'password' => 'qpcmz',                         
				'charset' => 'utf8',                         
				'enableProfiling' => true,                 
				),
			'log'=>array(                         
				'class'=>'CLogRouter',                         
				'routes'=>array(                                 
					array(                                         
						'class'=>'CFileLogRoute',                                         
						'logFile'=>'cron.log',                                         
						'levels'=>'error, warning',                                 
						),                                 
					array(                                         
						'class'=>'CFileLogRoute',                                         
						'logFile'=>'cron_trace.log',                                         
						'levels'=>'trace',                                 
						),                         
					),                 
				),              
				'ePdf' => array(
			'class'         => 'ext.yii-pdf.EYiiPdf',
			'params'        => array(
				'mpdf'     => array(
					'librarySourcePath' => 'application.vendors.mpdf.*',
					'constants'         => array(
						'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
					),
					'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
					'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
						'mode'              => '', //  This parameter specifies the mode of the new document.
						'format'            => 'A4', // format A4, A5, ...
						'default_font_size' => 10, // Sets the default document font size in points (pt)
						'default_font'      => 'Arial', // Sets the default font-family for the new document.
						'mgl'               => 8, // margin_left. Sets the page margins for the new document.
						'mgr'               => 8, // margin_right
						'mgt'               => 14, // margin_top
						'mgb'               => 16, // margin_bottom
						'mgh'               => 8, // margin_header
						'mgf'               => 8, // margin_footer
						'orientation'       => 'P', // landscape or portrait orientation
												)
					),
				'HTML2PDF' => array(
					'librarySourcePath' => 'application.vendors.html2pdf.*',
					'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
					/*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
						'orientation' => 'P', // landscape or portrait orientation
						'format'      => 'A4', // format A4, A5, ...
						'language'    => 'en', // language: fr, en, it ...
						'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
						'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
						'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
					)*/
						),
					
					),
				),		
				   
				'functions'=>array(                         
					'class'=>'application.extensions.functions.Functions',                 
					),         
				), 
			);

?>
