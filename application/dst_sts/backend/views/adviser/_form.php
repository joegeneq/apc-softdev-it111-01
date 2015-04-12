<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Adviser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adviser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->where(['user_type'=>'Adviser'])->all(),'id','full_name'),
        ['prompt'=>"Select adviser's name"]
    ) ?>

    <?= $form->field($model, 'adviser_full_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'adviser_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
