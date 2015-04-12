<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('success')) { ?>

        <div class="alert alert-success"><p>Added to the database!</p></div>

    <?php } else if(Yii::$app->session->hasFlash('failed')) { ?>

        <div class="alert alert-danger"><p>Not added to the database!</p></div>

    <?php } else { ?>

    <p>Please fill out the following fields to signup:</p>

    <?php } ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'user_type')->dropDownList([ 'Parent' => 'Parent', 'Adviser' => 'Adviser', ], ['prompt' => 'Select user type']) ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'full_name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
