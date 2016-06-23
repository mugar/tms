<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->ClientID=>array('view','id'=>$model->ClientID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des clients', 'url'=>array('index')),
	array('label'=>'Nouveau Client', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->ClientID)),
	array('label'=>'Gestion des clients', 'url'=>array('admin')),
);
?>

<h1>Modification Client <?php echo $model->ClientID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>