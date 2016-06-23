<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->ServID=>array('view','id'=>$model->ServID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Services', 'url'=>array('index')),
	array('label'=>'Nouveau Service', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->ServID)),
	array('label'=>'Gestion des Services', 'url'=>array('admin')),
);
?>

<h1>Modification Service <?php echo $model->ServID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>