<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->UserID), array('view', 'id'=>$data->UserID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
	<?php echo CHtml::encode($data->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Login')); ?>:</b>
	<?php echo CHtml::encode($data->Login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefGroupID')); ?>:</b>
	<?php echo CHtml::encode($data->refGroup->GroupName); ?>
	<br />


</div>