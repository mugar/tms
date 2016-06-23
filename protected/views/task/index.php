<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tâches',
);

$this->menu=array(
	//array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Gestion des Tâches', 'url'=>array('admin')),
);
?>

<h1>Tâches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
