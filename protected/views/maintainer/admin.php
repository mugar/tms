<?php
/* @var $this MaintainerController */
/* @var $model Maintainer */

$this->breadcrumbs=array(
	'Mainteneurs'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Mainteneurs', 'url'=>array('index')),
	array('label'=>'Nouveau mainteneur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#maintainer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Mainteneurs</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maintainer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'MaintainerID',
		'MaintName',
		'MaintAdress',
		'MaintPhone',
		'MaintEmail',
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('maintainer-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>
