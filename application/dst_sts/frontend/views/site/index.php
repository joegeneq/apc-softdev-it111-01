<?php
/* @var $this yii\web\View */
$this->title = 'DCarmelite School of Taguig - Student Tracking System';
?>
<div class="site-index">

    <div class="jumbotron" style="margin-top:-40px;">

        <h1 style="font-size:40px;"><img id="dst-logo" src="../views/site/images/dst-logo.png"/> D'Carmelite School of Taguig</h1>
        <h2 style="margin-top:-75px;">Student Tracking System</h2>

        <!--<p class="lead">Student Tracking System</p>-->
        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->

    </div>

    <div class="body-content">

    <!--START SLIDER DRAFT-->
    <!--<div id="wrapper">

        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="../web plugins/demo/images/toystory.jpg" data-thumb="images/toystory.jpg" alt="" />
                <img src="../web plugins/demo/images/up.jpg" data-thumb="images/up.jpg" alt="" title="This is an example of a caption" />
                <img src="../web plugins/demo/images/walle.jpg" data-thumb="images/walle.jpg" alt="" data-transition="slideInLeft" />
                <img src="../web plugins/demo/images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
            </div>
        </div>

    </div>-->
    <!--END SLIDER DRAFT-->

    <center><img id="staffpic" src="../views/site/images/staffpic.jpg" width="600px" height="400px"/></center>
    
    </br>
 
        <div class="row">
            <div class="col-xs-11">
                <h2>D'Carmelite's Profile</h2>


                <p style="font-size:16px; margin">Established in 1995 as a non-profit non stock corporation and was founded by the late Mrs Carmelita Factuar. 
                It obtained government recognition from the Department of Education in 2011. (See <a href="http://localhost/dst_sts/frontend/web/index.php?r=site%2Fabout">"About"</a> page for more info)</p>

                </br>

                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>
            <!--<div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>-->
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
