<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Team', 'url'=>array('index')),
	array('label'=>'Create Team', 'url'=>array('create')),
	array('label'=>'View Team', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Team', 'url'=>array('admin')),
);
?>

<h1>Update Team <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>