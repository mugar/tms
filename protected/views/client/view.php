<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->ClientID,
);

$this->menu=array(
	array('label'=>'Liste des clients', 'url'=>array('index')),
	array('label'=>'Nouveau Client', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->ClientID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ClientID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des clients', 'url'=>array('admin')),
);
?>

<h1>Client #<?php echo $model->ClientID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ClientID',
		'CltName',
		'CltAdress',
		'CltPhone',
		'CltEmail',
	),
)); ?>
