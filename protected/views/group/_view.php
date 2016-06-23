<?php
/* @var $this GroupController */
/* @var $data Group */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GroupID), array('view', 'id'=>$data->GroupID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupName')); ?>:</b>
	<?php echo CHtml::encode($data->GroupName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupDescription')); ?>:</b>
	<?php echo CHtml::encode($data->GroupDescription); ?>
	<br />


</div>