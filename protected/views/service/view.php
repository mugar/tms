<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->ServID,
);

$this->menu=array(
	array('label'=>'Liste des Services', 'url'=>array('index')),
	array('label'=>'Nouveau Service', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->ServID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ServID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des Services', 'url'=>array('admin')),
);
?>

<h1>Service #<?php echo $model->ServID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ServID',
		'ServName',
		'ServDescription',
	),
)); ?>
