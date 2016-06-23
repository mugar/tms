<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	$model->UserID=>array('view','id'=>$model->UserID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Utilisateurs', 'url'=>array('index')),
	array('label'=>'Nouveau Utilisateur', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->UserID)),
	array('label'=>'Gestion des Utilisateurs', 'url'=>array('admin')),
);
?>

<h1>Modification Utilisateur <?php echo $model->UserID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>