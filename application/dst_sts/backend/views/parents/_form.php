<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Parents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username'),
        ['prompt'=>'Select username']
    ) ?>

    <?= $form->field($model, 'parents_first_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parents_last_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parents_contact_number')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'parents_address')->textInput(['maxlength' => 255]) ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'student_id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
