<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'eventtitle')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'eventdate')->textInput() ?>

    <?= $form->field($model, 'eventvenue')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'eventdescription')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'eventstatus')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
