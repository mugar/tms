<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Task Management System',
	'language'=>'fr',
	// preloading 'log' component
	'preload'=>array('log','mail'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.YiiMailer.YiiMailer'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'mahdi',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
		'wdcalendar'    => array( 'embed' => true ),
		
	),

	'homeUrl'=>array('/wdcalendar/default/index'),
	'defaultController' => 'wdcalendar/default',
	
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginRequiredAjaxResponse' => 'YII_LOGIN_REQUIRED',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=tms',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'qpcmz',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'defaultPageSize'=>10,
		'pageSizeArray'=>array(10=>10,15=>15,20=>20,50=>50,100=>100,"all"=>"Tous"),
		'fileExtensions'=>array("pdf","doc","xls","csv","jpg","jpeg","gif","png"),
		'version'=>'v1.0.0',
		'adminEmail'=>'mahdi.mastouri@gmail.com',
	),
);
