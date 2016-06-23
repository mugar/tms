<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activités'=>array('index'),
	$model->ActivID=>array('view','id'=>$model->ActivID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Activités', 'url'=>array('index')),
	array('label'=>'Nouvelle avtivité', 'url'=>array('create')),
	array('label'=>'Voir détails', 'url'=>array('view', 'id'=>$model->ActivID)),
	array('label'=>'Gestion  des Activités', 'url'=>array('admin')),
);
?>

<h1>Modification Activité <?php echo $model->ActivID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>