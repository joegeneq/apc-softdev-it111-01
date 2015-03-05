<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'studentidnumber') ?>

    <?= $form->field($model, 'studentfirstname') ?>

    <?= $form->field($model, 'studentlastname') ?>

    <?= $form->field($model, 'studentgender') ?>

    <?php // echo $form->field($model, 'studentbirthdate') ?>

    <?php // echo $form->field($model, 'studentaddress') ?>

    <?php // echo $form->field($model, 'studentadmissiondate') ?>

    <?php // echo $form->field($model, 'stuentlevel') ?>

    <?php // echo $form->field($model, 'studentstatus') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
