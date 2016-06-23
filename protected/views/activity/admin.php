<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activités'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Activités', 'url'=>array('index')),
	array('label'=>'Nouvelle activité', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#activity-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Activités</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'activity-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ActivID',
		'ActivName',
		'ActivDescription',
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('activity-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>
