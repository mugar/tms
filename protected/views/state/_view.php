<?php
/* @var $this StateController */
/* @var $data State */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('StateID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->StateID), array('view', 'id'=>$data->StateID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StateName')); ?>:</b>
	<?php echo CHtml::encode($data->StateName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StateColor')); ?>:</b>
	<?php echo CHtml::encode($data->StateColor); ?>
	<br />


</div>