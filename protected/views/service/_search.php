<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ServID'); ?>
		<?php echo $form->textField($model,'ServID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ServName'); ?>
		<?php echo $form->textField($model,'ServName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ServDescription'); ?>
		<?php echo $form->textArea($model,'ServDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->