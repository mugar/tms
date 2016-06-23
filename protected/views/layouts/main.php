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

        $cs=Yii::app()->clientScript;
		
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/alert.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/calendar.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/colorselect.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dailog.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dp.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/dropdown.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/main.css', NULL);
        $cs->registerLinkTag("stylesheet", "text/css", $wdcalendar_assets . '/css/Error.css', NULL);	

        $cs->registerScriptFile( $wdcalendar_assets . '/js/Common.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/wdCalendar_lang_US.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.calendar.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.colorselect.js', CClientScript::POS_END);

	?>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div class="cHead" id="mainMenu">
		<div class="ftitle"><?php echo CHtml::link(CHtml::encode(Yii::app()->name), Yii::app()->homeUrl ); ?></div>
		<div id="mainmenu">
			<?php
			if(!Yii::app()->user->isGuest){
				$items = array();
				$items[] = array('label'=>'Calendrier', 'url'=>array('/wdcalendar/default/index'));
				$items[] = array('label'=>'Tâches', 'url'=>array('/task/admin'));
				$items[] = array('label'=>'Dossiers', 'url'=>array('/dossier/admin'));
				if(Yii::app()->user->getState('__group') == 1){
					$items[] = array('label'=>'Utilisateurs', 'url'=>array('/user/admin'));
					$items[] = array('label'=>'Groupes', 'url'=>array('/group/admin'));
				}
				$items[] = array('label'=>'Clients', 'url'=>array('/client/admin'));
				$items[] = array('label'=>'Mainteneurs', 'url'=>array('/maintainer/admin'));
				$items[] = array('label'=>'Activités', 'url'=>array('/activity/admin'));
				if(Yii::app()->user->getState('__group') == 1){
					$items[] = array('label'=>'Statuts', 'url'=>array('/state/admin'));
					$items[] = array('label'=>'Services', 'url'=>array('/service/admin'));
				}
				$items[] = array('label'=>'Se connecter', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array('class'=>'itemLogin'));
				$items[] = array('label'=>'Se déconnecter ('.Yii::app()->user->getState('__username').')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array('class'=>'itemLogout'));
				$this->widget('zii.widgets.CMenu',array(
					'items'=>$items,
				));
			}
			?>
		</div><!-- mainmenu -->
		<br clear="left"/>
		<div id="loadingpannel" class="ptogtitle loadicon" style="display: none;">Chargement...</div>
		<div id="errorpannel" class="ptogtitle loaderror" style="display: none;">Impossible de charger vos données, Veuillez essayer plus tard</div>
	</div>          

	<div id="center">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	</div>
	
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> - All Rights Reserved. <?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

<?php
    if (Yii::app()->components['user']->loginRequiredAjaxResponse){
        Yii::app()->clientScript->registerScript('ajaxLoginRequired', '
            jQuery("body").ajaxComplete(
                function(event, request, options) {
                    if (request.responseText == "'.Yii::app()->components['user']->loginRequiredAjaxResponse.'") {
                        window.location.href = options.url;
                    }
                }
            );
        ');
    }
	Yii::app()->clientScript->registerScript('pageHeight', '
		$(document).ready(function(){
			var centerHeight = $(window).height() - $("#mainMenu").height() - $("#footer").height() - 24;
			if($("#center").height() < centerHeight)
				$("#center").height(centerHeight);
		});
	');
	
?>

</body>
</html>
