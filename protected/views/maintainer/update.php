<?php
/* @var $this MaintainerController */
/* @var $model Maintainer */

$this->breadcrumbs=array(
	'Mainteneurs'=>array('index'),
	$model->MaintainerID=>array('view','id'=>$model->MaintainerID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Mainteneurs', 'url'=>array('index')),
	array('label'=>'Nouveau maintainer', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->MaintainerID)),
	array('label'=>'Gestion des Mainteneurs', 'url'=>array('admin')),
);
?>

<h1>Modification mainteneur <?php echo $model->MaintainerID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>