<?php
/* @var $this DossierController */
/* @var $model Dossier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dossier-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'DossierTitle'); ?>
		<?php echo $form->textField($model,'DossierTitle',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'DossierTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DossierNote'); ?>
		<?php echo $form->textArea($model,'DossierNote',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'DossierNote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefStateID'); ?>
		<?php echo $form->dropDownList($model,'RefStateID',CHtml::listData(State::model()->findAll(),'StateID','StateName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'RefStateID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefClientID'); ?>
		<?php echo $form->dropDownList($model,'RefClientID',CHtml::listData(Client::model()->findAll(),'ClientID','CltName'),array('prompt'=>'','style'=>'width:150px')); ?>
		<?php echo $form->error($model,'RefClientID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauvegarder'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->