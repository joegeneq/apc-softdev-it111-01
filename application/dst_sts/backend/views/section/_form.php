<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Adviser;

/* @var $this yii\web\View */
/* @var $model backend\models\Section */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adviser_id')->dropDownList(
        ArrayHelper::map(Adviser::find()->all(),'id','adviser_first_name'),
        ['prompt'=>"Select adviser's name"]
    ) ?>

    <?= $form->field($model, 'section_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'section_level')->dropDownList([ '1' => 'Grade 1', 
                                                                '2' => 'Grade 2', 
                                                                '3' => 'Grade 3',
                                                                '4' => 'Grade 4',
                                                                '5' => 'Grade 5',
                                                                '6' => 'Grade 6',
                                                            ], ['prompt' => 'Select level']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
