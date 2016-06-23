<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<?php
		$wdcalendar_assets = Yii::app()->
                getAssetManager()
                    ->publish( 
                        Yii::getPathOfAlias(
                            'application.modules.wdcalendar.assets'
                        ),
                        false,
                        -1,
                        YII_DEBUG
                    );

        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('jquery.ui');
		$cs->registerCoreScript('bbq');
        $cssCoreUrl = $cs->getCoreScriptUrl();
		$cs->registerCssFile($cssCoreUrl . '/jui/css/base/jquery-ui.css'); 
		
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/alert.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/calendar.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/colorselect.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dailog.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dp.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dropdown.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/main.css', NULL);
        //$cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/Error.css', NULL);

        $cs->registerScriptFile( $wdcalendar_assets . '/js/Common.js', CClientScript::POS_END);

        // for EDIT
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.form.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.validate.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/datepicker_lang_US.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.datepicker.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.dropdown.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.colorselect.js', CClientScript::POS_END);


        /*$cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.alert.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.ifrmdailog.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/wdCalendar_lang_US.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.calendar.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/wdcal.js', CClientScript::POS_END);*/
		
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<?php echo $content; ?>
	
</body>
</html>
