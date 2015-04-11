<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Event', [/*'create'], [*/'value'=>Url::to('index.php?r=event/create'),'class' => 'btn btn-success','id'=>'modalAddEventbtn']) ?>
    </p>

    <?php

        Modal::begin([
                'header'=>'<h4>Add Event</h4>',
                'id'=>'modalAddEvent',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContAddEvent'></div>";

        Modal::end();

        ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'event_title',
            'event_date',
            'event_venue',
            'event_description:ntext',
            // 'event_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
