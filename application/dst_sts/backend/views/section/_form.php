<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Section */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'section_name')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'section_level')->dropDownList([ 'Grade 1' => 'Grade 1', 
                                                                'Grade 2' => 'Grade 2', 
                                                                'Grade 3' => 'Grade 3',
                                                                'Grade 4' => 'Grade 4',
                                                                'Grade 5' => 'Grade 5',
                                                                'Grade 6' => 'Grade 6',
                                                            ], ['prompt' => 'Select level']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
