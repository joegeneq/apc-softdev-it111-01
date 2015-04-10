<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'student_id_number') ?>

    <?= $form->field($model, 'student_first_name') ?>

    <?= $form->field($model, 'student_last_name') ?>

    <?= $form->field($model, 'student_gender') ?>

    <?php // echo $form->field($model, 'student_birthdate') ?>

    <?php // echo $form->field($model, 'student_address') ?>

    <?php // echo $form->field($model, 'student_admission_date') ?>

    <?php // echo $form->field($model, 'student_level') ?>

    <?php // echo $form->field($model, 'student_status') ?>

    <?php // echo $form->field($model, 'section_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
