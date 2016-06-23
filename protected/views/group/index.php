<?php
/* @var $this GroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Groupes',
);

$this->menu=array(
	//array('label'=>'Create Group', 'url'=>array('create')),
	array('label'=>'Gestion des Groupes', 'url'=>array('admin')),
);
?>

<h1>Groupes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
