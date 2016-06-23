<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activités'=>array('index'),
	$model->ActivID,
);

$this->menu=array(
	array('label'=>'Liste des Activités', 'url'=>array('index')),
	array('label'=>'Nouvelle activité', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->ActivID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ActivID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des activités', 'url'=>array('admin')),
);
?>

<h1>Activité #<?php echo $model->ActivID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ActivID',
		'ActivName',
		'ActivDescription',
	),
)); ?>
