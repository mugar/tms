<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Utilisateurs',
);

$this->menu=array(
	array('label'=>'Nouveau Utilisateur', 'url'=>array('create')),
	array('label'=>'Gestion des Utilisateurs', 'url'=>array('admin')),
);
?>

<h1>Utilisateurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
