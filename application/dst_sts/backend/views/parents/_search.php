<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ParentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parents_full_name') ?>

    <?= $form->field($model, 'parents_contact_number') ?>

    <?= $form->field($model, 'parents_address') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'student_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
