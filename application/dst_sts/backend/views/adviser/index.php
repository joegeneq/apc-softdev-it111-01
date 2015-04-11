<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

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
        <?= Html::button('Create Adviser', [/*'create'], [*/'value'=>Url::to('index.php?r=adviser/create'),'class' => 'btn btn-success','id'=>'modalAddAdviserbtn']) ?>
    </p>

    <?php

        Modal::begin([
                'header'=>'<h4>Add Adviser</h4>',
                'id'=>'modalAddAdviser',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContAddAdviser'></div>";

        Modal::end();

        ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'adviser_first_name',
            'adviser_last_name',
            'adviser_gender',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
