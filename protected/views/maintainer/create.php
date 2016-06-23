<?php
/* @var $this MaintainerController */
/* @var $model Maintainer */

$this->breadcrumbs=array(
	'Mainteneurs'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Mainteneurs', 'url'=>array('index')),
	array('label'=>'Gestion des Mainteneurs', 'url'=>array('admin')),
);
?>

<h1>Nouveau mainteneur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>