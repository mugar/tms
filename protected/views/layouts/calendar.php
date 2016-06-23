<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="calendar">
	<?php echo $content; ?>
</div><!-- content -->

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


        // for EDIT
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.form.js', CClientScript::POS_END);
        //$cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.validate.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/datepicker_lang_US.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.datepicker.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.dropdown.js', CClientScript::POS_END);


        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.alert.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/jquery.ifrmdailog.js', CClientScript::POS_END);
        $cs->registerScriptFile( $wdcalendar_assets . '/js/wdcal.js', CClientScript::POS_END);
	?>

<?php $this->endContent(); ?>