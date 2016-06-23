<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des clients', 'url'=>array('index')),
	array('label'=>'Gestion des clients', 'url'=>array('admin')),
);
?>

<h1>Nouveau Client</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>