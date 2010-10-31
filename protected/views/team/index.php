<?php
$this->menu=array(
	array('label'=>'Neues Team', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('team-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Teams</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'team-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
