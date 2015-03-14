<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

<div class="row">
            <div class="col-lg-4">

                <?php $form = ActiveForm::begin(); ?>

                <!-- <?= $form->field($model, 'acounttype')->textInput(['maxlength' => 45]) ?> -->

                <?= $form->field($model, 'acounttype')->dropDownList(['' => 'Select account type', 'Instructor' => 'Instructor', 'Parents' => 'Parents']) ?>

                <?= $form->field($model, 'accountusername')->textInput(['maxlength' => 45]) ?>

                <?= $form->field($model, 'accountpassword')->textInput(['maxlength' => 45]) ?>

                </div>

                <div class="col-lg-4">

                <!-- <?= $form->field($model, 'accountdateregistered')->textInput() ?> -->

                <?= $form->field($model, 'accountdateregistered')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                    'inline' => false,        
                    'clientOptions' => [
                        'autoclose' => true,
                        'startDate' => '+0d',
                        'format' => 'dd-M-yyyy'
                    ]
                ]);?>

                <?= $form->field($model, 'accountstatus')->textInput(['maxlength' => 45]) ?>

                <?= $form->field($model, 'instructor_id')->textInput() ?>

                </div>

                <div class="col-lg-4">

                <?= $form->field($model, 'admin_id')->textInput() ?>

                <?= $form->field($model, 'parents_id')->textInput() ?>
                </div>

                </div>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>