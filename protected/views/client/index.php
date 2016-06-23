<?php
/* @var $this ClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=>'Nouveau Client', 'url'=>array('create')),
	array('label'=>'Gestion des clients', 'url'=>array('admin')),
);
?>

<h1>Clients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
