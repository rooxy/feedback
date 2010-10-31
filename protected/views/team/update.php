<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Löschen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>$model->title.' wirklich löschen?')),
);
?>

<h1><?php echo $model->title; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'team-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
    $dataProvider=new CArrayDataProvider($model->members);

     $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'user-grid',
        'dataProvider'=>$dataProvider,
        'columns'=>array(
            'login',
            array(
                'class'=>'CLinkColumn',
                'labelExpression'=>'"entfernen"',
                'urlExpression'=>'Yii::app()->controller->createUrl("removeMember",array("userId"=>$data->primaryKey,"memberId"=>"'.$model->id.'"))',
            ),
        ),
)); ?>