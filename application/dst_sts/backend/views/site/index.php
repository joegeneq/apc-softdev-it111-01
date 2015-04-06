<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'DCarmelite School of Taguig - Student Tracking System';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="font-size:40px;"><img id="dst-logo" src="../views/site/images/dst-logo.png"/> D'Carmelite School of Taguig</h1>
        <h2 style="margin-top:-75px;">Student Tracking System</h2>

    </div>

    <div class="body-content">

    
        <h1 align='center'>Welcome back, <?=Yii::$app->user->identity->first_name?>!<br><br>Admin Portals:</h1>
        <p align="center">
            <?= Html::a('Add User', ['site/signup'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Add Event', ['event/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Add Student', ['student/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Assign Parent', ['parents/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Assign Instructor', ['instructor/index'], ['class' => 'btn btn-success']) ?>
        </p>

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