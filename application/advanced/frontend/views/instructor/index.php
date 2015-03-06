<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instructors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instructor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'instructorfirstname',
            'instructorlastname',
            'instructoradmissiondate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
