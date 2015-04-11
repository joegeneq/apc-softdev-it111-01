<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

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
        <?= Html::button('Create Student', [/*'create'], [*/'value'=>Url::to('index.php?r=student/create'),'class' => 'btn btn-success','id'=>'modalAddStudentbtn']) ?>
    </p>

    <?php

        Modal::begin([
                'header'=>'<h4>Add Student</h4>',
                'id'=>'modalAddStudent',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContAddStudent'></div>";

        Modal::end();

        ?>

    <?php Pjax::begin(); ?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id_number',
            'student_first_name',
            'student_last_name',
            'student_gender',
            // 'student_birthdate',
            // 'student_address',
            // 'student_admission_date',
            // 'student_level',
            // 'student_status',
            // 'section_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?> 

</div>
