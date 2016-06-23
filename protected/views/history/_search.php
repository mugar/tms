<?php
/* @var $this HistoryController */
/* @var $model History */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'HistoryID'); ?>
		<?php echo $form->textField($model,'HistoryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Action'); ?>
		<?php echo $form->textArea($model,'Action',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateTime'); ?>
		<?php echo $form->textField($model,'DateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RefTaskID'); ?>
		<?php echo $form->textField($model,'RefTaskID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RefUserID'); ?>
		<?php echo $form->textField($model,'RefUserID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->