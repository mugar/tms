<?php
/* @var $this StateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Statuts',
);

$this->menu=array(
	array('label'=>'Nouveau statut', 'url'=>array('create')),
	array('label'=>'Gestion des Statuts', 'url'=>array('admin')),
);
?>

<h1>Statuts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
