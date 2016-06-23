<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	$model->HistoryID=>array('view','id'=>$model->HistoryID),
	'Update',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Create History', 'url'=>array('create')),
	array('label'=>'View History', 'url'=>array('view', 'id'=>$model->HistoryID)),
	array('label'=>'Manage History', 'url'=>array('admin')),
);
?>

<h1>Update History <?php echo $model->HistoryID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>