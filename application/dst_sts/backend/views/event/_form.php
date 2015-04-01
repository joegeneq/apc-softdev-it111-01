<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_title')->textInput(['maxlength' => 45]) ?>

    <!-- <?= $form->field($model, 'event_date')->textInput() ?> -->

    <?php 
    // with an ActiveForm instance 
    ?>
    <?= $form->field($model, 'event_date')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'startDate' => '+0',
            ]
    ]);?>

    <?= $form->field($model, 'event_venue')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'event_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'event_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Select status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
