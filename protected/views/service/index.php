<?php
/* @var $this ServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Services',
);

$this->menu=array(
	array('label'=>'Nouveau Service', 'url'=>array('create')),
	array('label'=>'Gestion des Services', 'url'=>array('admin')),
);
?>

<h1>Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
