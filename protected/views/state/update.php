<?php
/* @var $this StateController */
/* @var $model State */

$this->breadcrumbs=array(
	'Statuts'=>array('index'),
	$model->StateID=>array('view','id'=>$model->StateID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Statuts', 'url'=>array('index')),
	array('label'=>'Nouveau statut', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->StateID)),
	array('label'=>'Gestion des Statuts', 'url'=>array('admin')),
);
?>

<h1>Modification Statut <?php echo $model->StateID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>