<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id_number')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'student_first_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'student_last_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'student_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'student_birthdate')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                //'startDate' => '+0',
            ]
    ]);?>

    <?= $form->field($model, 'student_address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_admission_date')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                //'startDate' => '+0',
            ]
    ]);?>

    <?= $form->field($model, 'student_level')->dropDownList([ '1' => 'Grade 1', 
                                                                '2' => 'Grade 2', 
                                                                '3' => 'Grade 3',
                                                                '4' => 'Grade 4',
                                                                '5' => 'Grade 5',
                                                                '6' => 'Grade 6',
                                                                '7' => '1st Year HS',
                                                                '8' => '2nd Year HS',
                                                                '9' => '3rd Year HS',
                                                                '10' => '4th Year HS',
                                                            ], ['prompt' => 'Select level']) ?>

    <?= $form->field($model, 'student_status')->dropDownList([ 'Enrolled' => 'Enrolled', 'Unenrolled' => 'Unenrolled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
