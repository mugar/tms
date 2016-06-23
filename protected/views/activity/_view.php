<?php
/* @var $this ActivityController */
/* @var $data Activity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActivID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ActivID), array('view', 'id'=>$data->ActivID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActivName')); ?>:</b>
	<?php echo CHtml::encode($data->ActivName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActivDescription')); ?>:</b>
	<?php echo CHtml::encode($data->ActivDescription); ?>
	<br />


</div>