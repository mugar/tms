<?php
/* @var $this MaintainerController */
/* @var $model Maintainer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'MaintainerID'); ?>
		<?php echo $form->textField($model,'MaintainerID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaintName'); ?>
		<?php echo $form->textField($model,'MaintName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaintAdress'); ?>
		<?php echo $form->textField($model,'MaintAdress',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaintPhone'); ?>
		<?php echo $form->textField($model,'MaintPhone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaintEmail'); ?>
		<?php echo $form->textField($model,'MaintEmail',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->