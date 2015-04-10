<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Adviser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adviser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adviser_first_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'adviser_last_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'adviser_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
