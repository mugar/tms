<?php
/* @var $this StateController */
/* @var $model State */

$this->breadcrumbs=array(
	'Statuts'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Statuts', 'url'=>array('index')),
	array('label'=>'Nouveau statut', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#state-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Statuts</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'state-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'StateName',
			'type' => 'raw',
			'value'=>function($data){
				return '<div style="color:#fff;padding:2px;text-align:center;background:'.Controller::tc($data->StateColor).'">'.$data->StateName.'</div>';
			},
		),
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('state-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>
