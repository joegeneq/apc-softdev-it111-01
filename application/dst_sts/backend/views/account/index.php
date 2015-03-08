<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'acounttype',
            'accountusername',
            'accountpassword',
            'accountdateregistered',
            // 'accountstatus',
            // 'instructor_id',
            // 'admin_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p style="float:right"><a class="btn btn-lg glyphicon glyphicon-chevron-left" href="?r=site%2Findex">Back</a></p>

</div>