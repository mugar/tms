<?php
/* @var $this DossierController */
/* @var $model Dossier */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Dossiers', 'url'=>array('index')),
	array('label'=>'Gestion des Dossiers', 'url'=>array('admin')),
);
?>

<h1>Nouveau Dossier</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>