<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Section', [/*'create'], [*/'value'=>Url::to('index.php?r=section/create'),'class' => 'btn btn-success','id'=>'modalAddSectionbtn']) ?>
    </p>

    <?php

        Modal::begin([
                'header'=>'<h4>Add Section</h4>',
                'id'=>'modalAddSection',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContAddSection'></div>";

        Modal::end();

    ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'section_name',
            'section_level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
