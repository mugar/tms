<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div id="search-input">

		<div class="row">
			<?php echo $form->label($model,'TaskTitle'); ?>
			<?php echo $form->textField($model,'TaskTitle',array('size'=>45,'maxlength'=>45)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'TaskDescription'); ?>
			<?php echo $form->textArea($model,'TaskDescription',array('rows'=>6, 'cols'=>50)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'TaskStart'); ?> (>=)
			<?php echo $form->textField($model,'TaskStart',array('id'=>'Search_TaskStart')); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'TaskEnd'); ?> (<=)
			<?php echo $form->textField($model,'TaskEnd',array('id'=>'Search_TaskEnd')); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'PercentComplete'); ?>
			<?php echo $form->textField($model,'PercentComplete',array('style'=>'width:30px')); ?> %
		</div>

		<div class="row">
			<?php echo $form->label($model,'TravailFait'); ?>
			<?php echo $form->textArea($model,'TravailFait',array('rows'=>6, 'cols'=>50)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'TravailRestant'); ?>
			<?php echo $form->textArea($model,'TravailRestant',array('rows'=>6, 'cols'=>50)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'RefClientID'); ?>
			<?php echo $form->dropDownList($model,'RefClientID',CHtml::listData(Client::model()->findAll(),'ClientID','CltName'),array('prompt'=>'','style'=>'width:150px','multiple'=>true)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'RefStateID'); ?>
			<?php echo $form->dropDownList($model,'RefStateID',CHtml::listData(State::model()->findAll(),'StateID','StateName'),array('prompt'=>'','style'=>'width:150px','multiple'=>true)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'RefServiceID'); ?>
			<?php echo $form->dropDownList($model,'RefServiceID',CHtml::listData(Service::model()->findAll(),'ServID','ServName'),array('prompt'=>'','style'=>'width:150px','multiple'=>true)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'RefActivityID'); ?>
			<?php echo $form->dropDownList($model,'RefActivityID',CHtml::listData(Activity::model()->findAll(),'ActivID','ActivName'),array('prompt'=>'','style'=>'width:150px','multiple'=>true)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'UserOwner'); ?>
			<?php echo $form->dropDownList($model,'UserOwner',CHtml::listData(User::model()->findAll(),'UserID','UserName'),array('prompt'=>'','style'=>'width:150px','multiple'=>true)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'AssignedTo'); ?>
			<?php echo $form->dropDownList($model,'AssignedTo',CHtml::listData(User::model()->findAll(),'UserID','UserName'),array('prompt'=>'','style'=>'width:150px','multiple'=>true)); ?>
		</div>
		
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->