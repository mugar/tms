<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->HistoryID,
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Create History', 'url'=>array('create')),
	array('label'=>'Update History', 'url'=>array('update', 'id'=>$model->HistoryID)),
	array('label'=>'Delete History', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->HistoryID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Manage History', 'url'=>array('admin')),
);
?>

<h1>View History #<?php echo $model->HistoryID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'HistoryID',
		'Action',
		'DateTime',
		'RefTaskID',
		'RefUserID',
	),
)); ?>
