<?php
/* @var $this MaintainerController */
/* @var $model Maintainer */

$this->breadcrumbs=array(
	'Mainteneurs'=>array('index'),
	$model->MaintainerID,
);

$this->menu=array(
	array('label'=>'Liste des Mainteneurs', 'url'=>array('index')),
	array('label'=>'Nouveau mainteneur', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->MaintainerID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->MaintainerID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des Mainteneurs', 'url'=>array('admin')),
);
?>

<h1>Mainteneur #<?php echo $model->MaintainerID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'MaintainerID',
		'MaintName',
		'MaintAdress',
		'MaintPhone',
		'MaintEmail',
	),
)); ?>
