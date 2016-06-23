<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'UserName'); ?>
		<?php echo $form->textField($model,'UserName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'UserName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Login'); ?>
		<?php echo $form->textField($model,'Login',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45,'value'=>'')); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->radioButtonList($model,'Active',array('1'=>'Yes','0'=>'No'),array('separator'=>'&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RefGroupID'); ?>
		<?php echo $form->dropDownList($model,'RefGroupID',CHtml::listData(Group::model()->findAll(),'GroupID','GroupName')); ?>
		<?php echo $form->error($model,'RefGroupID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->