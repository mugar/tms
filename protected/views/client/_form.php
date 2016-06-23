<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CltName'); ?>
		<?php echo $form->textField($model,'CltName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CltName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CltAdress'); ?>
		<?php echo $form->textField($model,'CltAdress',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'CltAdress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CltPhone'); ?>
		<?php echo $form->textField($model,'CltPhone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CltPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CltEmail'); ?>
		<?php echo $form->textField($model,'CltEmail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CltEmail'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->