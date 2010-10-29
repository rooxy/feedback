<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Neuer Benutzer', 'url'=>array('create')),
);
?>

<h1>Benutzer</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'login',
		array(
			'class'=>'application.views.widgets.ModifyDeleteButtonColumn',
		),
	),
)); ?>
