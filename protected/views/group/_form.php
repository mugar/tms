<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'GroupName'); ?>
		<?php echo $form->textField($model,'GroupName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'GroupName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GroupDescription'); ?>
		<?php echo $form->textArea($model,'GroupDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'GroupDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->