<?php
/* @var $this ActivityController */
/* @var $model Activity */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ActivID'); ?>
		<?php echo $form->textField($model,'ActivID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActivName'); ?>
		<?php echo $form->textField($model,'ActivName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActivDescription'); ?>
		<?php echo $form->textArea($model,'ActivDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->