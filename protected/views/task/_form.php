<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */

Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary(array($model,$history)); ?>

<table>
<tr>
<td style="vertical-align:top;width:50%">
	<div class="row">
		<?php echo $form->labelEx($model,'TaskTitle'); ?>
		<?php echo $form->textField($model,'TaskTitle',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TaskTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TaskDescription'); ?>
		<?php echo $form->textArea($model,'TaskDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TaskDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TaskStart'); ?>
		<?php
		$model->TaskStart = $this->php2JsTimeFR($this->mySql2PhpTime($model->TaskStart));
		$this->widget('CJuiDateTimePicker',array(
			'model'=>$model, //Model object
			'attribute'=>'TaskStart', //attribute name
			'mode'=>'datetime', //use "time","date" or "datetime" (default)
			'options'=>array('stepMinute'=>15),// jquery plugin options
			'language' => 'fr'		
		));
		?>
		<?php //echo $form->textField($model,'TaskStart'); ?>
		<?php echo $form->error($model,'TaskStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TaskEnd'); ?>
		<?php
		$model->TaskEnd = $this->php2JsTimeFR($this->mySql2PhpTime($model->TaskEnd));
		$this->widget('CJuiDateTimePicker',array(
			'model'=>$model, //Model object
			'attribute'=>'TaskEnd', //attribute name
			'mode'=>'datetime', //use "time","date" or "datetime" (default)
			'options'=>array('stepMinute'=>15),// jquery plugin options
			'language' => 'fr'		
		));
		?>
		<?php //echo $form->textField($model,'TaskEnd'); ?>
		<?php echo $form->error($model,'TaskEnd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PercentComplete'); ?>
		<div id="inputSlider"><?php echo $form->textField($model,'PercentComplete',array('style'=>'width:25px','class'=>'required','readonly'=>true)); ?> %</div>
		<div id="slider" style="width:300px"></div>
		<br clear="both"/>
		<?php echo $form->error($model,'PercentComplete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefClientID'); ?>
		<?php echo $form->dropDownList($model,'RefClientID',CHtml::listData(Client::model()->findAll(),'ClientID','CltName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo CHtml::textField('NewClient',"",array('style'=>'display:none;width:148px;height:16px','id'=>'Task_NewClient')); ?>
		<?php echo CHtml::hiddenField('SourceClient',"old"); ?>
		<a href="javascript:void(0)" id="newClient">Nouveau client</a>
		<a href="javascript:void(0)" id="selectClient">Sélectionner un client</a>
		<?php echo $form->error($model,'RefClientID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefStateID'); ?>
		<?php echo $form->dropDownList($model,'RefStateID',CHtml::listData(State::model()->findAll(),'StateID','StateName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'RefStateID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefServiceID'); ?>
		<?php echo $form->dropDownList($model,'RefServiceID',CHtml::listData(Service::model()->findAll(),'ServID','ServName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'RefServiceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefActivityID'); ?>
		<?php echo $form->dropDownList($model,'RefActivityID',CHtml::listData(Activity::model()->findAll(),'ActivID','ActivName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'RefActivityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AssignedTo'); ?>
		<?php echo $form->dropDownList($model,'AssignedTo',CHtml::listData(User::model()->findAll(),'UserID','UserName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'AssignedTo'); ?>
	</div>
	
	<?php if(!$model->isNewRecord){ $history->Action = ""; ?>
	<div class="row">
		<?php echo $form->labelEx($history,'Action'); ?>
		<?php echo $form->textArea($history,'Action',array('rows'=>4, 'cols'=>35)); ?>
		<?php echo $form->error($history,'Action'); ?>
	</div>
	<?php } ?>
</td>
<td style="vertical-align:top">

	<div class="row">
		<?php echo $form->labelEx($model,'File'); ?>
		Extensions autorisées: <?php echo implode(",",Yii::app()->params['fileExtensions']) ?>
		<?php echo $form->fileField($model,'File'); ?>
		<?php echo $form->error($model,'File'); ?>
		<?php if($model->File) echo '<br><a href="'.Yii::app()->request->hostInfo.Yii::app()->baseUrl.'/files/'.$model->File.'" target="_blank" style="color:blue">'.$model->File.'</a>'; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefDossierID'); ?>
		<?php echo $form->dropDownList($model,'RefDossierID',CHtml::listData(Dossier::model()->findAll(),'DossierID','DossierTitle'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'RefDossierID'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'TravailFait'); ?>
		<?php echo $form->textArea($model,'TravailFait',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TravailFait'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TravailRestant'); ?>
		<?php echo $form->textArea($model,'TravailRestant',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TravailRestant'); ?>
	</div>
	<label class="required">Mainteneurs</label>
	<?php
	$taskMaintainers = CHtml::listData($this->loadModel($model->TaskID)->taskmaintainers,"TaskMaintainerID","RefMaintainerID");
	$maintainers = Maintainer::model()->findAll();
	foreach($maintainers as $maintainer){
		echo CHtml::checkbox("maintainers[".$maintainer->MaintainerID."]",in_array($maintainer->MaintainerID,$taskMaintainers),array("value"=>$maintainer->MaintainerID));
		echo " ".$maintainer->MaintName."<br />";
	}
	?>

</td>
</tr>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
	$script = '
		$(function() {
			$( "#slider" ).slider({
				value:'.($model->isNewRecord ? "10" : $model->PercentComplete).',
				min: 0,
				max: 100,
				step: 10,
				slide: function( event, ui ) {
					$( "#Task_PercentComplete" ).val( ui.value );
				}
			});
			$( "#Task_PercentComplete" ).val( $( "#slider" ).slider( "value" ) );
			$("#Task_RefStateID").change(function(){
				if($(this).val()==3){
					$("#slider").slider("value",100);	
					$( "#Task_PercentComplete" ).val( 100 );
				}			
			});
			$("#newClient").live("click",function(){
				$(this).hide();
				$("#selectClient").show();
				$("#Task_RefClientID").hide();
				$("#Task_NewClient").show();
				$("#SourceClient").val("new");
			});
			$("#selectClient").live("click",function(){
				$(this).hide();
				$("#newClient").show();
				$("#Task_RefClientID").show();
				$("#Task_NewClient").hide();
				$("#SourceClient").val("old");
			});
		});
	';
	Yii::app()->clientScript->registerScript('edit',$script,CClientScript::POS_END);
?>
