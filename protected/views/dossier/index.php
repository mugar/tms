<?php
/* @var $this DossierController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dossiers',
);

$this->menu=array(
	array('label'=>'Nouveau Dossier', 'url'=>array('create')),
	array('label'=>'Gestion des Dossiers', 'url'=>array('admin')),
);
?>

<h1>Dossiers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
