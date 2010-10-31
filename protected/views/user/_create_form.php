<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

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

    <h1>Teams</h1>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'team-grid',
        'summaryText'=>'',
        'dataProvider'=>Team::model()->search(),
        'selectableRows'=>2,
        'columns'=>array(
            array(
                'name'=>'title',
                'header'=>'Team'
            ),
            array(
                'class'=>'CCheckBoxColumn',
                'header'=>'ist Mitglied',
            ),
        ),
    )); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Erstellen' : 'Speichern'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->