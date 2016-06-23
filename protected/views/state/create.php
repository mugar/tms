<?php
/* @var $this StateController */
/* @var $model State */

$this->breadcrumbs=array(
	'Statuts'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Statuts', 'url'=>array('index')),
	array('label'=>'Gestion des Statuts', 'url'=>array('admin')),
);
?>

<h1>Nouveau statut</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>