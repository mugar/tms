<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Utilisateurs'=>array('index'),
	'Gérer',
);

$this->menu=array(
	array('label'=>'Liste des Utilisateurs', 'url'=>array('index')),
	array('label'=>'Nouveau Utilisateur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des Utilisateurs</h1>



<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'UserID',
		'UserName',
		'Login',
		//'Password',
		'Email',
		'Active',
		array(
			'name'=>'RefGroupID',
			'value'=>'$data->refGroup->GroupName',
			'filter'=>Chtml::listData(Group::model()->findAll(),'GroupID','GroupName'),
		),
		array(
			'class'=>'CButtonColumn',
		    'header'=>CHtml::dropDownList('pageSize',Yii::app()->user->getState('pageSize'),Yii::app()->params['pageSizeArray'],array(
				'onchange'=>"$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
		    )),
		),
	),
)); ?>