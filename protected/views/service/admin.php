<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Service', 'url'=>array('index')),
	array('label'=>'Nouveau service', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Services</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ServID',
		'ServName',
		'ServDescription',
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('service-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>
