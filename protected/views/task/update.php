<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tâches'=>array('index'),
	$model->TaskID=>array('view','id'=>$model->TaskID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Tâches', 'url'=>array('index')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->TaskID)),
	array('label'=>'Gestion des Tâches', 'url'=>array('admin')),
);
?>

<h1>Modification Tâche <?php echo $model->TaskID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'history'=>$history)); ?>