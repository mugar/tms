<?php
/* @var $this ServiceController */
/* @var $data Service */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ServID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ServID), array('view', 'id'=>$data->ServID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ServName')); ?>:</b>
	<?php echo CHtml::encode($data->ServName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ServDescription')); ?>:</b>
	<?php echo CHtml::encode($data->ServDescription); ?>
	<br />


</div>