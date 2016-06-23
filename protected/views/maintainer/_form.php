<?php
/* @var $this MaintainerController */
/* @var $model Maintainer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maintainer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MaintName'); ?>
		<?php echo $form->textField($model,'MaintName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'MaintName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MaintAdress'); ?>
		<?php echo $form->textField($model,'MaintAdress',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'MaintAdress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MaintPhone'); ?>
		<?php echo $form->textField($model,'MaintPhone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'MaintPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MaintEmail'); ?>
		<?php echo $form->textField($model,'MaintEmail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'MaintEmail'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->