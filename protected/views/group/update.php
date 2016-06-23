<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groupes'=>array('index'),
	$model->GroupID=>array('view','id'=>$model->GroupID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Groupes', 'url'=>array('index')),
	//array('label'=>'Create Group', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->GroupID)),
	array('label'=>'Gestion des Groupes', 'url'=>array('admin')),
);
?>

<h1>Modification Groupe <?php echo $model->GroupID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>