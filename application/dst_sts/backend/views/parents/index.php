<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

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
        <?= Html::button('Create Parents', [/*'create'], [*/'value'=>Url::to('index.php?r=parents/create'),'class' => 'btn btn-success','id'=>'modalAddParentbtn']) ?>
    </p>

    <?php

        Modal::begin([
                'header'=>'<h4>Add Parent</h4>',
                'id'=>'modalAddParent',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContAddParent'></div>";

        Modal::end();

        ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'Username',
                'value'=>'user.username',
            ],
            [
                'attribute'=>"Child's Name",
                'value'=>'student.student_first_name',
            ],
            'parents_first_name',
            'parents_last_name',
            'parents_contact_number',
            'parents_address',
            // 'user_id',
            // 'student_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
