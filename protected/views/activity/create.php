<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activités'=>array('index'),
	'Créer',
);

$this->menu=array(
	array('label'=>'Liste des Activités', 'url'=>array('index')),
	array('label'=>'Gestion  des Activités', 'url'=>array('admin')),
);
?>

<h1>Nouvelle avtivité</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>