<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'DCarmelite School of Taguig - Student Tracking System';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="font-size:40px;"><img id="dst-logo" src="images/dst-logo.png"/> D'Carmelite School of Taguig</h1>
        <h2 style="margin-top:-75px;">Student Tracking System</h2>

    </div>

    <div class="body-content">

    
        <h1 align='center'>Welcome back, <?=Yii::$app->user->identity->first_name?>!<br><br>Admin Portals:</h1>
        <p align="center">
            <?= Html::button('Add User', [/*'site/signup'], [*/'value'=>Url::to('index.php?r=site/signup'),'class' => 'btn btn-success','id'=>'modalAddUserbtn']) ?>
            <?= Html::a('Events', ['event/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Sections', ['section/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Advisers', ['adviser/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Students', ['student/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Parents', ['parents/index'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php

        Modal::begin([
                'header'=>'<h4>Add User</h4>',
                'id'=>'modalAddUser',
                'size'=>'modal-lg',
            ]);

        echo "<div id='modalContAddUser'></div>";

        Modal::end();

    ?>

        </br>
           
    </div>
            
</div>

    <script type="text/javascript" src="../web plugins/demo/scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="../web plugins/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>