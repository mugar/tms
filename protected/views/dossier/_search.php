<?php
/* @var $this DossierController */
/* @var $model Dossier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'DossierID'); ?>
		<?php echo $form->textField($model,'DossierID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DossierTitle'); ?>
		<?php echo $form->textField($model,'DossierTitle',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DossierNote'); ?>
		<?php echo $form->textArea($model,'DossierNote',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RefStateID'); ?>
		<?php echo $form->textField($model,'RefStateID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RefClientID'); ?>
		<?php echo $form->textField($model,'RefClientID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->