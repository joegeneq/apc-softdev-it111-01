<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id_number')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'student_full_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'student_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'student_birthdate')->textInput() ?>

    <?= $form->field($model, 'student_address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'student_admission_date')->textInput() ?>

    <?= $form->field($model, 'student_level')->textInput() ?>

    <?= $form->field($model, 'student_status')->dropDownList([ 'Enrolled' => 'Enrolled', 'LOA - Leave of Absence' => 'LOA - Leave of Absence', 'AWOL - Absence Without Leave' => 'AWOL - Absence Without Leave', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'section_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
