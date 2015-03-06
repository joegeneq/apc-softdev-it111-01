<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instructor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instructor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'instructorfirstname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'instructorlastname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'instructoradmissiondate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
