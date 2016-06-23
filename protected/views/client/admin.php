<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des clients', 'url'=>array('index')),
	array('label'=>'Nouveau Client', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des clients</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ClientID',
		'CltName',
		'CltAdress',
		'CltPhone',
		'CltEmail',
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('client-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>
