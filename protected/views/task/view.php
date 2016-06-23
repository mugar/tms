<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tâches'=>array('index'),
	$model->TaskID,
);

$this->menu=array(
	array('label'=>'Liste des Tâches', 'url'=>array('index')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->TaskID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TaskID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des Tâches', 'url'=>array('admin')),
);
?>

<h1>Tâche #<?php echo $model->TaskID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TaskID',
		'TaskTitle',
		'TaskDescription',
		array(
			'name'=>'TaskStart',
			'value'=>$this->php2JsTimeFR($this->mySql2PhpTime($model->TaskStart)),
		),
		array(
			'name'=>'TaskEnd',
			'value'=>$this->php2JsTimeFR($this->mySql2PhpTime($model->TaskEnd)),
		),
		array(
			'name'=>'PercentComplete',
			'value'=>$model->PercentComplete.' %',
		),
		'TravailFait',
		'TravailRestant',
		array(
			'name'=>'RefClientID',
			'value'=>$model->refClient->CltName,
		),
		array(
			'name'=>'RefStateID',
			'value'=>$model->refState->StateName,
		),
		array(
			'name'=>'RefServiceID',
			'value'=>$model->refService->ServName,
		),
		array(
			'name'=>'RefActivityID',
			'value'=>$model->refActivity->ActivName,
		),
		array(
			'name'=>'UserOwner',
			'value'=>$model->userOwner->UserName,
		),
		array(
			'name'=>'AssignedTo',
			'value'=>$model->assignedTo->UserName,
		),
	),
)); ?>

<br />

<h3>Historique</h3>
<?php 
$history = new History('search');
$history->RefTaskID = $model->TaskID;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'history-grid',
	'dataProvider'=>$history->search(),
	//'filter'=>$history,
	'columns'=>array(
		array(
			'header'=>'Date',
			'name'=>'DateTime',
			'value'=>'Controller::php2JsTimeFR(Controller::mySql2PhpTime($data->DateTime))',
		),
		'Action',
		array(
			'header'=>'Utilisateur',
			'name'=>'RefUserID',
			'filter'=>CHtml::listData(User::model()->findAll(),'UserID','UserName'),
			'value'=>'$data->refUser->UserName',
		),
	),
)); ?>