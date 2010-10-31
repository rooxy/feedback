<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'plain_password'); ?>
		<?php echo $form->passwordField($model,'plain_password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'plain_password'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'conf_password'); ?>
		<?php echo $form->passwordField($model,'conf_password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'conf_password'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Erstellen' : 'Speichern'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->