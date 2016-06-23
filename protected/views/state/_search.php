<?php
/* @var $this StateController */
/* @var $model State */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'StateID'); ?>
		<?php echo $form->textField($model,'StateID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StateName'); ?>
		<?php echo $form->textField($model,'StateName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StateColor'); ?>
		<?php echo $form->textField($model,'StateColor',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->