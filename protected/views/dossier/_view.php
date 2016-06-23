<?php
/* @var $this DossierController */
/* @var $data Dossier */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DossierID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DossierID), array('view', 'id'=>$data->DossierID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DossierTitle')); ?>:</b>
	<?php echo CHtml::encode($data->DossierTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DossierNote')); ?>:</b>
	<?php echo CHtml::encode($data->DossierNote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefStateID')); ?>:</b>
	<?php echo CHtml::encode($data->refState->StateName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefClientID')); ?>:</b>
	<?php echo CHtml::encode($data->refClient->CltName); ?>
	<br />


</div>