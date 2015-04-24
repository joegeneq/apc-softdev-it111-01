<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            [
                'attribute' => 'student_id',
                'value' => 'student.student_full_name',
            ],
            'parents_full_name',
            'parents_contact_number',
            'parents_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
