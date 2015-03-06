<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'parentfirstname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parentlastname')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parentgender')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parentcontactnumber')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parentaddress')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
