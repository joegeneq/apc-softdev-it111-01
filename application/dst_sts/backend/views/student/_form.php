<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Section;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section_id')->dropDownList(
        ArrayHelper::map(Section::find()->all(),'id','section_name'),
        ['prompt'=>"Select section name"]
    ) ?>

    <?= $form->field($model, 'student_id_number')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'student_full_name')->textInput(['maxlength' => 45]) ?>

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

    <?= $form->field($model, 'student_level')->dropDownList([ 'Grade 1' => 'Grade 1', 
                                                                'Grade 2' => 'Grade 2', 
                                                                'Grade 3' => 'Grade 3',
                                                                'Grade 4' => 'Grade 4',
                                                                'Grade 5' => 'Grade 5',
                                                                'Grade 6' => 'Grade 6',
                                                            ], ['prompt' => 'Select level']) ?>

    <?= $form->field($model, 'student_status')->dropDownList([ 'Enrolled' => 'Enrolled', 'LOA - Leave of Absence' => 'LOA - Leave of Absence', 'AWOL - Absence Without Leave' => 'AWOL - Absence Without Leave', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
