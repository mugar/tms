<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groupes'=>array('index'),
	$model->GroupID,
);

$this->menu=array(
	array('label'=>'Liste des Groupes', 'url'=>array('index')),
	//array('label'=>'Create Group', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->GroupID)),
	//array('label'=>'Delete Group', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GroupID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des Groupes', 'url'=>array('admin')),
);
?>

<h1>Groupe #<?php echo $model->GroupID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GroupID',
		'GroupName',
		'GroupDescription',
	),
)); ?>
