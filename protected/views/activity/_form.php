<?php
/* @var $this ActivityController */
/* @var $model Activity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ActivName'); ?>
		<?php echo $form->textField($model,'ActivName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ActivName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActivDescription'); ?>
		<?php echo $form->textArea($model,'ActivDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ActivDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->