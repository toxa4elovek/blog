<?php
/**
 * @var $this \yii\web\View
 * @var $post \frontend\models\Post
 */
?>


    <div class="col-9">
        <div class="body-header">
            <h1 class="namе-group"><?php echo $post->title?></h1>
        </div>
        <div class="body-list">
            <div class="crumbs">
                <ol class="breadcrumb">
                    <?php
                    $categories = $post->categories;
                    \yii\helpers\ArrayHelper::multisort($categories, 'parent_id', SORT_ASC)?>
                    <?php foreach ($categories as $category):?>
                        <li><a href="<?php echo \yii\helpers\Url::to(['/'.$category->slug])?>"><?php echo $category->name?></a></li>
                    <?php endforeach;?>
                </ol>
            </div>
            <div class="tags">
                <a href="#">Комната</a>
                <a href="#">Муфта</a>
                <a href="#">Чепуха</a>
                <a href="#">Замза</a>
            </div>
            <div class="post_content">
                <?php echo $post->text?>
            </div>
            <div class="statistics clear">
                <div class="post_statistics">
                    <a href="#" class="fa fa-calendar"></a>
                    <time><?php echo Yii::$app->formatter->asDate($post->updated_at)?></time>
                </div>
                <div class="post_statistics">
                    <a href="#" class="fa fa-user"></a>
                    <span><?php echo $post->user->username?></span>
                </div>
                <div class="post_statistics">
                    <a href="#" class="fa fa-eye"></a>
                    <span>2</span>
                </div>
                <div class="post_statistics">
                    <a href="#" class="fa fa-star"></a>
                    <span>53</span>
                </div>
                <div class="post_statistics">
                    <a href="#" class="fa fa-thumbs-up"></a>
                    <span>412</span>
                </div>
                <div class="post_statistics">
                    <a href="#" class="fa fa-thumbs-down"></a>
                    <span>20</span>
                </div>
            </div>

            <!--БЛОК КОММЕНТАРИЕВ-->

            <div class="comments">
                <h3><i class="fa fa-comments-o fa-3x" aria-hidden="true"></i> Комментарии
                    (<span>15</span>)</h3>
                <ul class="media-list">
                    <!-- Комментарий (уровень 1) -->
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail" src="img/avatar1.jpg"
                                     alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <div class="author">Дима</div>
                                <div class="metadata">
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-calendar"></a>
                                        <time>13-11-2017</time>
                                    </div>
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-thumbs-up"></a>
                                        <span>412</span>
                                    </div>
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-thumbs-down"></a>
                                        <span>20</span>
                                    </div>
                                </div>
                            </div>
                            <div class="media-text text-justify">Lorem ipsum dolor sit amet. Blanditiis praesentium voluptatum deleniti atque. Autem vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Dolor repellendus cum soluta nobis. Corporis suscipit laboriosam, nisi ut enim. Debitis aut perferendis doloribus asperiores repellat. sint, obcaecati cupiditate non numquam eius. Itaque earum rerum facilis. Similique sunt in ea commodi. Dolor repellendus numquam eius modi. Quam nihil molestiae consequatur, vel illum, qui ratione voluptatem accusantium doloremque.</div>
                            <div class="footer-comment">
                                <a class="btn btn-default" href="#">Ответить</a>
                            </div>
                            <hr>
                            <!-- Вложенный медиа-компонент (уровень 2) -->
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-thumbnail" src="img/avatar2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="author">Пётр</div>
                                        <div class="metadata">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar"></a>
                                                <time>13-11-2017</time>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>412</span>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                <span>20</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-text text-justify">Dolor sit, amet, consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet, consectetur, adipisci velit, sed quia consequuntur magni dolores. Ab illo inventore veritatis et quasi architecto. Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non numquam eius modi tempora. Corporis suscipit laboriosam, nisi ut labore et aut reiciendis.</div>
                                    <div class="footer-comment">
                                        <a class="btn btn-default" href="#">Ответить</a>
                                    </div>
                                    <hr>

                                    <!-- Вложенный медиа-компонент (уровень 3) -->
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object img-thumbnail" src="img/avatar3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <div class="author">Александр</div>
                                                <div class="metadata">
                                                    <div class="post_statistics">
                                                        <a href="#" class="fa fa-calendar"></a>
                                                        <time>13-11-2017</time>
                                                    </div>
                                                    <div class="post_statistics">
                                                        <a href="#" class="fa fa-thumbs-up"></a>
                                                        <span>412</span>
                                                    </div>
                                                    <div class="post_statistics">
                                                        <a href="#" class="fa fa-thumbs-down"></a>
                                                        <span>20</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-text text-justify">Amet, consectetur, adipisci velit, sed ut labore et dolore. Maiores alias consequatur aut perferendis doloribus asperiores. Voluptas nulla vero eos. Minima veniam, quis nostrum exercitationem ullam corporis. Atque corrupti, quos dolores eos, qui blanditiis praesentium voluptatum deleniti atque corrupti. Quibusdam et harum quidem rerum necessitatibus saepe eveniet, ut enim ipsam. Magni dolores et dolorum fuga nostrum exercitationem ullam. Eligendi optio, cumque nihil molestiae consequatur.</div>
                                            <div class="footer-comment">
                                                <a class="btn btn-default" href="#">Ответить</a>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <!-- Конец вложенного комментария (уровень 3) -->

                                </div>
                            </div>
                            <!-- Конец вложенного комментария (уровень 2) -->

                            <!-- Ещё один вложенный медиа-компонент (уровень 2) -->
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-thumbnail" src="img/avatar4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="author">Сергей</div>
                                        <div class="metadata">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar"></a>
                                                <time>13-11-2017</time>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>412</span>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                <span>20</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-text text-justify">Ex ea voluptate velit esse, quam nihil impedit, quo minus id quod. Totam rem aperiam eaque ipsa, quae ab illo. Minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Iste natus error sit voluptatem. Sunt, explicabo deleniti atque corrupti, quos dolores et expedita.</div>
                                    <div class="footer-comment">
                                        <a class="btn btn-default" href="#">Ответить</a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <!-- Конец ещё одного вложенного комментария (уровень 2) -->

                        </div>
                    </li>
                    <!-- Конец комментария (уровень 1) -->

                    <!-- Комментарий (уровень 1) -->
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail" src="img/avatar5.jpg" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <div class="author">Иван</div>
                                <div class="metadata">
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-calendar"></a>
                                        <time>13-11-2017</time>
                                    </div>
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-thumbs-up"></a>
                                        <span>412</span>
                                    </div>
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-thumbs-down"></a>
                                        <span>20</span>
                                    </div>
                                </div>
                            </div>
                            <div class="media-text text-justify">Eum iure reprehenderit, qui dolorem eum fugiat. Sint et expedita distinctio velit. Architecto beatae vitae dicta sunt, explicabo unde omnis. Qui aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto. Nemo enim ipsam voluptatem quia. Eos, qui ratione voluptatem sequi nesciunt, neque porro. A sapiente delectus, ut enim ipsam voluptatem, quia non recusandae architecto beatae.</div>
                            <div class="footer-comment">
                                <a class="btn btn-default" href="#">Ответить</a>
                            </div>
                            <hr>
                        </div>
                    </li>
                    <!-- Конец комментария (уровень 1) -->

                    <!-- Комментарий (уровень 1) -->
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail" src="img/avatar1.jpg" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <div class="author">Дима</div>
                                <div class="metadata">
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-calendar"></a>
                                        <time>13-11-2017</time>
                                    </div>
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-thumbs-up"></a>
                                        <span>412</span>
                                    </div>
                                    <div class="post_statistics">
                                        <a href="#" class="fa fa-thumbs-down"></a>
                                        <span>20</span>
                                    </div>
                                </div>
                            </div>
                            <div class="media-text text-justify">Tempore, cum soluta nobis est et quas. Quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in. Obcaecati cupiditate non recusandae impedit. Hic tenetur a sapiente delectus. Facere possimus, omnis dolor repellendus inventore veritatis et voluptates. Ipsa, quae ab illo inventore veritatis et quasi architecto beatae. In culpa, qui in culpa. Cum soluta nobis est laborum et aut perferendis doloribus. Vitae dicta sunt, explicabo perspiciatis. Amet, consectetur, adipisci velit, sed quia voluptas sit, aspernatur. Obcaecati cupiditate non provident, similique sunt in. Reiciendis voluptatibus maiores alias consequatur aut officiis debitis aut perferendis doloribus asperiores. Assumenda est, omnis dolor repellendus voluptas assumenda est omnis.</div>
                            <div class="footer-comment">
                                <a class="btn btn-default" href="#">Ответить</a>
                            </div>
                            <hr>
                        </div>
                    </li>
                    <!-- Конец комментария (уровень 1) -->

                </ul>
            </div>
            <?php if (Yii::$app->user->isGuest):?>
            <div class="not-authorized">Вы должны авторизоваться, чтобы оставлять комментарии!</div>
            <?php endif;?>

        </div>
    </div>