<?php

use yii\helpers\Html;
use yii\grid\GridView;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model) {
            if ($model->student_status == 'Enrolled') {
                return ['class'=>'success'];

            } else if ($model->student_status == 'LOA - Leave of Absence') {
                return ['class'=>'warning'];          

            } else if ($model->student_status == 'AWOL - Absence Without Leave') {
                return ['class'=>'danger'];                
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'section_id',
                'value' => 'section.section_name',
            ],
            'student_id_number',
            'student_full_name',
            'student_gender',
            [
                'attribute' => 'student_birthdate',
                'value' => 'student_birthdate',
                'options'=> ['class'=>'width-30'],
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'student_birthdate',
                        'clientOptions' => [
                            'autoclose' => false,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]),
            ],
            // 'student_address',
            // 'student_admission_date',
            'student_level',
            'student_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
