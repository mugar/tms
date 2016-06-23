<?php
/* @var $this HistoryController */
/* @var $data History */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('HistoryID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->HistoryID), array('view', 'id'=>$data->HistoryID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Action')); ?>:</b>
	<?php echo CHtml::encode($data->Action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateTime')); ?>:</b>
	<?php echo CHtml::encode($data->DateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefTaskID')); ?>:</b>
	<?php echo CHtml::encode($data->RefTaskID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefUserID')); ?>:</b>
	<?php echo CHtml::encode($data->RefUserID); ?>
	<br />


</div>