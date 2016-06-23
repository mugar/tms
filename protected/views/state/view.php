<?php
/* @var $this StateController */
/* @var $model State */

$this->breadcrumbs=array(
	'Statuts'=>array('index'),
	$model->StateID,
);

$this->menu=array(
	array('label'=>'Liste des Statuts', 'url'=>array('index')),
	array('label'=>'Nouveau statut', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->StateID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->StateID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des Statuts', 'url'=>array('admin')),
);
?>

<h1>Statut #<?php echo $model->StateID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'StateID',
		'StateName',
		'StateColor',
	),
)); ?>
