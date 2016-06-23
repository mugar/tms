<?php
/* @var $this StateController */
/* @var $model State */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'state-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Champs avec <span class="required">*</span> sont obligatoires.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'StateName'); ?>
		<?php echo $form->textField($model,'StateName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'StateName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StateColor'); ?>
		<?php echo $form->hiddenField($model,'StateColor',array('value'=>!$model->isNewRecord ? $model->StateColor : '0')); ?>
		<?php echo $form->error($model,'StateColor'); ?>
		<div id="calendarcolor"></div>
		</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$(document).ready(function(){
    var cv = $("#State_StateColor").val() ;
    if(cv == "") cv = "0";
    $("#calendarcolor").colorselect({
        title: "Color", 
        index: cv, 
        hiddenid: "State_StateColor"
    });
});
</script>