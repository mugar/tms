<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ClientID'); ?>
		<?php echo $form->textField($model,'ClientID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CltName'); ?>
		<?php echo $form->textField($model,'CltName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CltAdress'); ?>
		<?php echo $form->textField($model,'CltAdress',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CltPhone'); ?>
		<?php echo $form->textField($model,'CltPhone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CltEmail'); ?>
		<?php echo $form->textField($model,'CltEmail',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->