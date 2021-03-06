<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mycomment */

$this->title = 'Update Mycomment: ' . ' ' . $model->author;
$this->params['breadcrumbs'][] = ['label' => 'Mycomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->author, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mycomment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
