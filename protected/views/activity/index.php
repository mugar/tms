<?php
/* @var $this ActivityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Activités',
);

$this->menu=array(
	array('label'=>'Nouvelle avtivité', 'url'=>array('create')),
	array('label'=>'Gestion  des Activités', 'url'=>array('admin')),
);
?>

<h1>Activités</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
