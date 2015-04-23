<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'DCarmelite School of Taguig - Student Tracking System';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="font-size:40px;"><img id="dst-logo" src="/views/site/images/dst-logo.png"/> D'Carmelite School of Taguig</h1>
        <h2 style="margin-top:-75px;">Student Tracking System</h2>

    </div>

    <div class="body-content">

    <?php 
        if(Yii::$app->user->isGuest) { ?>

            <center><img id="staffpic" src="/views/site/images/staffpic.jpg" width="600px" height="400px"/></center>

            </br>
 
            <div class="row">
                <div class="col-xs-11">
                    <h2>D'Carmelite's Profile</h2>


                    <p style="font-size:16px; margin">Established in 1995 as a non-profit non stock corporation and was founded by the late Mrs Carmelita Factuar. 
                    It obtained government recognition from the Department of Education in 2011. (See <a href="?r=site/about">"About"</a> page for more info)</p>

        <?php 
        } else if(Yii::$app->user->identity->user_type == 'admin') { ?>
            <h1 align='center'>Welcome back, <?=Yii::$app->user->identity->first_name?>!<br><br>Admin Portals:</h1>
            <p align="center"><?= Html::a('Add User', ['site/signup'], ['class' => 'btn btn-success']) ?></p>

        <?php 
        } else if(Yii::$app->user->identity->user_type == 'Parent') { ?>
            <h1 align='center'>Welcome back, <?=Yii::$app->user->identity->full_name ?></h1>
            <p align='center'><?= Html::a('Attendance Record', ['attendance/index'], ['class' => 'btn btn-success']) ?></p>

        <?php 
        } else if(Yii::$app->user->identity->user_type == 'Adviser') { ?>
            <h1 align='center'>Welcome back, <?=Yii::$app->user->identity->full_name ?></h1>
            <p align='center'><?= Html::a('Attendance Record', ['attendance/index'], ['class' => 'btn btn-success']) ?></p>

        <?php 
        } 
        ?>

            </br>
               
            </div>
            
        </div>

    </div>
</div>

    <script type="text/javascript" src="../web plugins/demo/scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="../web plugins/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>