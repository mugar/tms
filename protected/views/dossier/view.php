<?php
/* @var $this DossierController */
/* @var $model Dossier */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	$model->DossierID,
);

$this->menu=array(
	array('label'=>'Liste des Dossiers', 'url'=>array('index')),
	array('label'=>'Nouveau Dossier', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->DossierID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->DossierID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestion des Dossiers', 'url'=>array('admin')),
);
?>

<h1>Détails Dossier #<?php echo $model->DossierID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'DossierID',
		'DossierTitle',
		'DossierNote',
		array(
			'name'=>'RefStateID',
			'value'=>$model->refState->StateName,
		),
		array(
			'name'=>'RefClientID',
			'value'=>$model->refClient->CltName,
		),
	),
)); 
?>

<br>

<h1>Tâches du dossier</h1>

<?php

$Task = new Task('search');
$Task->RefDossierID = $model->DossierID;

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'task-grid',
	'dataProvider'=>$Task->search(),
	'columns'=>array(
		'TaskTitle',
		array(
			'name'=>'TaskStart',
			'value'=>'Controller::php2JsTimeFR(Controller::mySql2PhpTime($data->TaskStart))',
		),
		array(
			'name'=>'TaskEnd',
			'value'=>'Controller::php2JsTimeFR(Controller::mySql2PhpTime($data->TaskEnd))',
		),
		array(
			'header'=>'Pourcentage (%)',
			'name'=>'PercentComplete',
		),
		array(
			'name'=>'RefStateID',
			'value'=>'$data->refState->StateName',
		),
		'TravailFait',
		'TravailRestant',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
				'view'=>array(
					'url'=>'Yii::app()->createUrl("task/view", array("id"=>$data->TaskID))',
				),
			),
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('task-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
));

?>