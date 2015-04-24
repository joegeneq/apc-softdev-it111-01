<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdviserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advisers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adviser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adviser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'adviser_full_name',
            [
                'attribute' => 'section_id',
                'value' => 'section.section_name',
            ],
            [
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            'adviser_gender',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
