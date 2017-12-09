<?php

/* @var $this yii\web\View

$this->title = 'My Yii Application';*/
?><!--
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
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
            </div>
        </div>

    </div>
</div>
-->



            <!--------------------------------------------ОСНОВНОЕ СОДЕРЖИМОЕ СТРАНИЦЫ------------------------------------------>
<div class="container-fluid main">
    <div class="row">
        <div class="col-xs-12">

                <?php for ($i = 0; $i < 10; $i++):?>
                    <div class="tag col-xs-2">
                        <a href="#" class="tag-item">Тэг№<?php echo $i ?></a>
                    </div>
                <?php endfor;?>

        </div>
    </div>
</div>
    <<!----------------------КАТАЛОГ ТЕМ----------------------------->


<div class="container-fluid main">
                <div class="row">


                    <div class="col-sm-3 catalog">
                        <div class="catalog-block uppercase">
                            <h6>каталог тем</h6>
                            <div class="list-group">
                                <div class="flex">
                                    <a class="list-group-item left-text">Администрирование
                                        <span class="badge">15575</span></a>
                                </div>
                                <div class="flex">
                                    <a class="list-group-item left-text">Операционные системы
<span class="badge">14</span></a>
                                </div>
                                <div class="flex">
                                    <a class="list-group-item left-text">Операционные системы
<span class="badge">14</span></a>
                                </div>
                                <div class="flex">
                                    <a class="list-group-item left-text">Администрирование
                                    <span class="badge">15575</span></a>
                                </div>
                                <div class="flex">
                                    <a class="list-group-item left-text">Администрирование
                                        <span class="badge">15575</span></a>
                                </div>
                                <div class="flex">
                                    <a class="list-group-item left-text">Операционные системы
<span class="badge">14</span></a>
                                </div>
                                <a class=" more">Показате ещё</a>
                            </div>
                        </div>
                    </div>
                                  <!----------------------ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ----------------------------->
                    <div class="col-sm-6 right-block">
                        <h3 class="namе-group">Часто задаваемый вопрос</h3>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок вопроса</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание вопроса</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок вопроса</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание вопроса</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок вопроса</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание вопроса</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок вопроса</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание вопроса</p>
                        </a>
                    </div>
                                <!----------------------ЛИЧНЫЙ ОПЫТ----------------------------->
                    <div class="col-sm-8 right-block">
                        <h3 class="namе-group">Личный опыт</h3>
                    </div>
                    <div class="col-sm-4 right-block clear">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block clear">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                                         <!---------------------ВОПРОС ОТВЕТ----------------------------->
                    <div class="col-sm-8 right-block">
                        <h3 class="namе-group">Вопрос ответ</h3>
                    </div>
                    <div class="col-sm-4 right-block clear">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block clear">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                    <div class="col-sm-4 right-block">
                        <a class="product-latest">
                            <h6>Заголовок поста</h6>
                            <img src="<?php echo \yii\helpers\Url::to('/img/source/question.png')?>">
                            <p class="latest-price">Кратокое описание поста</p>
                        </a>
                    </div>
                </div>
        </div>
        <!-------------------------------------------ФУТЕР -------------------------------------------->


    <!--<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>-->
