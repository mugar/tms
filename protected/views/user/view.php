<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	$model->UserID,
);

$this->menu=array(
	array('label'=>'Liste des Utilisateurs', 'url'=>array('index')),
	array('label'=>'Nouveau Utilisateur', 'url'=>array('create')),
	array('label'=>'Modifier', 'url'=>array('update', 'id'=>$model->UserID)),
	array('label'=>'Supprimer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->UserID),'confirm'=>'Voulez-vous vraiment supprimer cet élément ?')),
	array('label'=>'Gestion des Utilisateurs', 'url'=>array('admin')),
);
?>

<h1>Utilisateur #<?php echo $model->UserID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'UserID',
		'UserName',
		'Login',
		//'Password',
		'Email',
		'Active',
		array(
			'name'=>'RefGroupID',
			'value'=>$model->refGroup->GroupName
		),
	),
)); ?>
