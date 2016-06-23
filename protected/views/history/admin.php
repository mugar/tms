<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs=array(
	'Histories'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'List History', 'url'=>array('index')),
	array('label'=>'Create History', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#history-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion Histories</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'history-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'HistoryID',
		'Action',
		'DateTime',
		'RefTaskID',
		'RefUserID',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
