<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groupes'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Groupes', 'url'=>array('index')),
	//array('label'=>'Create Group', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Groupes</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'GroupID',
		'GroupName',
		'GroupDescription',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('group-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>
