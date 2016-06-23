<?php
/* @var $this DossierController */
/* @var $model Dossier */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	$model->DossierID=>array('view','id'=>$model->DossierID),
	'Modification',
);

$this->menu=array(
	array('label'=>'Liste des Dossiers', 'url'=>array('index')),
	array('label'=>'Nouveau Dossier', 'url'=>array('create')),
	array('label'=>'Voir Détails', 'url'=>array('view', 'id'=>$model->DossierID)),
	array('label'=>'Gestion des Dossiers', 'url'=>array('admin')),
);
?>

<h1>Modification Dossier <?php echo $model->DossierID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>