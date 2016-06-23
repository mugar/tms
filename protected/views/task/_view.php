<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaskID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TaskID), array('view', 'id'=>$data->TaskID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaskTitle')); ?>:</b>
	<?php echo CHtml::encode($data->TaskTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaskDescription')); ?>:</b>
	<?php echo CHtml::encode($data->TaskDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaskStart')); ?>:</b>
	<?php echo CHtml::encode($this->php2JsTimeFR($this->mySql2PhpTime($data->TaskStart))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaskEnd')); ?>:</b>
	<?php echo CHtml::encode($this->php2JsTimeFR($this->mySql2PhpTime($data->TaskEnd))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PercentComplete')); ?>:</b>
	<?php echo CHtml::encode($data->PercentComplete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefClientID')); ?>:</b>
	<?php echo CHtml::encode($data->refClient->CltName); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RefStateID')); ?>:</b>
	<?php echo CHtml::encode($data->RefStateID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefServiceID')); ?>:</b>
	<?php echo CHtml::encode($data->RefServiceID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefActivityID')); ?>:</b>
	<?php echo CHtml::encode($data->RefActivityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserOwner')); ?>:</b>
	<?php echo CHtml::encode($data->UserOwner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AssignedTo')); ?>:</b>
	<?php echo CHtml::encode($data->AssignedTo); ?>
	<br />

	*/ ?>

</div>