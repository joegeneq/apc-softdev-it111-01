<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'studentidnumber')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'studentfirstname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'studentlastname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'studentgender')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'studentbirthdate')->textInput() ?>

    <?= $form->field($model, 'studentaddress')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'studentadmissiondate')->textInput() ?>

    <?= $form->field($model, 'stuentlevel')->textInput() ?>

    <?= $form->field($model, 'studentstatus')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
