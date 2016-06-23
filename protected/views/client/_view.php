<?php
/* @var $this ClientController */
/* @var $data Client */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ClientID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ClientID), array('view', 'id'=>$data->ClientID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CltName')); ?>:</b>
	<?php echo CHtml::encode($data->CltName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CltAdress')); ?>:</b>
	<?php echo CHtml::encode($data->CltAdress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CltPhone')); ?>:</b>
	<?php echo CHtml::encode($data->CltPhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CltEmail')); ?>:</b>
	<?php echo CHtml::encode($data->CltEmail); ?>
	<br />


</div>