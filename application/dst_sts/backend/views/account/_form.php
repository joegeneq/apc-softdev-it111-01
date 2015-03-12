<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acounttype')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'accountusername')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'accountpassword')->passwordInput(['maxlength' => 45]) ?>

    <!-- <?= $form->field($model, 'accountdateregistered')->textInput() ?> -->

    <?= $form->field($model, 'accountdateregistered')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'inline' => true, 
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);?>

    <!-- <?= $form->field($model, 'accountstatus')->textInput(['maxlength' => 45]) ?> -->

    <!-- <?= $form->field($model, 'instructor_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'admin_id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
