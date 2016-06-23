<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Utilisateurs', 'url'=>array('index')),
	array('label'=>'Gestion des Utilisateurs', 'url'=>array('admin')),
);
?>

<h1>Nouveau Utilisateur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>