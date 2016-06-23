<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'GroupID'); ?>
		<?php echo $form->textField($model,'GroupID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GroupName'); ?>
		<?php echo $form->textField($model,'GroupName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GroupDescription'); ?>
		<?php echo $form->textArea($model,'GroupDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->