<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tâches'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Tâches', 'url'=>array('index')),
	//array('label'=>'Create Task', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#task-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.export-button').click(function(){
	var data = $('#search-input :input').serialize();
	data += '&type='+$(this).attr('id');
	window.open('index.php?r=task/export&'+data);
	return true;
});

");
?>

<h1>Gestion des Tâches</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

$criteria = new CDBcriteria;
if(Yii::app()->user->getState('__group') == 3){
	$criteria->condition = "(UserOwner = :UserOwner OR AssignedTo = :AssignedTo)";
	$criteria->params = array(":UserOwner"=>Yii::app()->user->id,":AssignedTo"=>Yii::app()->user->id);
}
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'task-grid',
	'dataProvider'=>$model->search($criteria),
	'filter'=>$model,
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'=>array(
		//'TaskID',
		'TaskTitle',
		//'TaskDescription',
		array(
			'header'=>'Date Début (>=)',
			'name'=>'TaskStart',
			'value'=>'Controller::php2JsTimeFR(Controller::mySql2PhpTime($data->TaskStart))',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'TaskStart',
				'language' => 'fr',
				'defaultOptions' => array(
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
			),true),
		),
		array(
			'header'=>'Date Fin (<=)',
			'name'=>'TaskEnd',
			'value'=>'Controller::php2JsTimeFR(Controller::mySql2PhpTime($data->TaskEnd))',
			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'TaskEnd',
				'language' => 'fr',
				'defaultOptions' => array(
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
			),true),
		),
		array(
			'name'=>'RefStateID',
			'filter'=>CHtml::listData(State::model()->findAll(),'StateID','StateName'),
			'value'=>'$data->refState->StateName',
			
		),
		/*
		'RefClientID',
		'RefStateID',
		*/
		array(
			'name'=>'RefServiceID',
			'filter'=>CHtml::listData(Service::model()->findAll(),'ServID','ServName'),
			'value'=>'$data->refService->ServName',
		),
		array(
			'name'=>'RefActivityID',
			'filter'=>CHtml::listData(Activity::model()->findAll(),'ActivID','ActivName'),
			'value'=>'$data->refActivity->ActivName',
		),
		array(
			'name'=>'UserOwner',
			'filter'=>CHtml::listData(User::model()->findAll(),'UserID','UserName'),
			'value'=>'$data->userOwner->UserName',
		),
		array(
			'name'=>'AssignedTo',
			'filter'=>CHtml::listData(User::model()->findAll(),'UserID','UserName'),
			'value'=>'$data->assignedTo->UserName',
		),
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('task-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
	'ajaxUpdate'=>'task-grid,search-input',
));
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
	jQuery('#Task_TaskStart').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['fr'],[]));
	jQuery('#Task_TaskEnd').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['fr'],[]));
}
");
?>

<input style="display:none" type="button" value="Exporter en Excel" id="export-excel" class="export-button"/>
<input type="button" value="Exporter en PDF" id="export-pdf" class="export-button"/>
