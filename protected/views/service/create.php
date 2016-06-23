<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Services', 'url'=>array('index')),
	array('label'=>'Gestion des Services', 'url'=>array('admin')),
);
?>

<h1>Nouveau Service</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>