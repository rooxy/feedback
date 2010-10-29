<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Abbrechen', 'url'=>array('index')),
);
?>

<h1>Benutzer erstellen</h1>

<?php echo $this->renderPartial('_create_form', array('model'=>$model)); ?>