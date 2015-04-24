<?php

use yii\helpers\Html;
use yii\grid\GridView;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(Yii::$app->user->identity->user_type=='Adviser') { ?>
        <?= Html::a('Create Attendance', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } else {} ?>
    </p>

    <?php if(Yii::$app->user->identity->user_type=='Adviser') { ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model) {
            if ($model->attendance_status == 'Present') {
                return ['class'=>'success'];

            } else if ($model->attendance_status == 'Absent') {
                return ['class'=>'danger'];                
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'attendance_date',
            [
                'attribute'=>'student_id',
                'value'=>'student.student_full_name',
            ],
            [
                'attribute' => 'attendance_date',
                'value' => 'attendance_date',
                'options'=> ['class'=>'width-20'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'attendance_date',
                        'clientOptions' => [
                            'autoclose' => false,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]),
            ],
            'attendance_status',
            //'student_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>
    <?php } else { ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'attendance_date',
            [
                'attribute'=>'student_id',
                'value'=>'student.student_full_name',
            ],
            [
                'attribute' => 'attendance_date',
                'value' => 'attendance_date',
                'options'=> ['class'=>'width-20'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'attendance_date',
                        'clientOptions' => [
                            'autoclose' => false,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]),
            ],
            'attendance_status',
            //'student_id',
        ],
        ]); ?>
    <?php } ?>
</div>
