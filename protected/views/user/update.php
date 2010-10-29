<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Abbrechen', 'url'=>array('index')),
);
?>

<h1>Passwort zurücksetzen</h1>

<?php echo $this->renderPartial('_update_form', array('model'=>$model)); ?>