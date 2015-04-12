<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Student;

/* @var $this yii\web\View */
/* @var $model frontend\models\Attendance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attendance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(),'id','student_id_number'),
        ['prompt'=>"Select students's ID number"]
    ) ?>

    <?= $form->field($model, 'attendance_date')->widget(
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

    <?= $form->field($model, 'attendance_status')->dropDownList([ 'Present' => 'Present', 'Absent' => 'Absent', 'N/A' => 'N/A', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>