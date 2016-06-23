<?php
/* @var $this MaintainerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mainteneurs',
);

$this->menu=array(
	array('label'=>'Nouveau mainteneur', 'url'=>array('create')),
	array('label'=>'Gestion des Mainteneurs', 'url'=>array('admin')),
);
?>

<h1>Mainteneurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
