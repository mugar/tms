<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'history-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Action'); ?>
		<?php echo $form->textArea($model,'Action',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateTime'); ?>
		<?php echo $form->textField($model,'DateTime'); ?>
		<?php echo $form->error($model,'DateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefTaskID'); ?>
		<?php echo $form->textField($model,'RefTaskID'); ?>
		<?php echo $form->error($model,'RefTaskID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefUserID'); ?>
		<?php echo $form->textField($model,'RefUserID'); ?>
		<?php echo $form->error($model,'RefUserID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->