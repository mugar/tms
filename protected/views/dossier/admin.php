<?php
/* @var $this DossierController */
/* @var $model Dossier */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Dossiers', 'url'=>array('index')),
	array('label'=>'Nouveau Dossier', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dossier-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Dossiers</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dossier-grid',
	'dataProvider'=>$model->search($criteria),
	'filter'=>$model,
	'columns'=>array(
		'DossierID',
		'DossierTitle',
		'DossierNote',
		array(
			'name'=>'RefStateID',
			'value'=>'$data->refState->StateName',
			'filter'=>CHtml::listData(State::model()->findAll(),'StateID','StateName'),
		),
		array(
			'name'=>'RefClientID',
			'value'=>'$data->refClient->CltName',
			'filter'=>CHtml::listData(Client::model()->findAll(),'ClientID','CltName'),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
