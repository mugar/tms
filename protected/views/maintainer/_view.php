<?php
/* @var $this MaintainerController */
/* @var $data Maintainer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintainerID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->MaintainerID), array('view', 'id'=>$data->MaintainerID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintName')); ?>:</b>
	<?php echo CHtml::encode($data->MaintName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintAdress')); ?>:</b>
	<?php echo CHtml::encode($data->MaintAdress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintPhone')); ?>:</b>
	<?php echo CHtml::encode($data->MaintPhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintEmail')); ?>:</b>
	<?php echo CHtml::encode($data->MaintEmail); ?>
	<br />


</div>