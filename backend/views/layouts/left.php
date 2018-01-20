<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo \common\classes\UserHelper::getFullName(Yii::$app->user->identity)?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Пользователи', 'icon' => 'user-o', 'url' => ['/user/admin/']],
                    [
                        'label' => 'Справочники',
                        'icon' => 'object-group',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Категории', 'icon' => 'dashboard', 'url' => ['/references/category'],],
                            [
                                'label' => 'Локализация',
                                'icon' => 'fa fa-map-marker',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Страны', 'icon' => 'fa fa-globe', 'url' => ['/references/country'],],
                                    ['label' => 'Регионы', 'icon' => 'fa fa-flag', 'url' => ['/references/region'],],
                                    ['label' => 'Города', 'icon' => 'fa fa-building', 'url' => ['/references/city'],],
                                ],
                            ],
                            [
                                'label' => 'Образование',
                                'icon' => 'fa fa-graduation-cap',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Школы', 'icon' => 'fa fa-book', 'url' => ['/references/school'],],
                                    ['label' => 'Университеты', 'icon' => 'fa fa-university', 'url' => ['/references/university'],],
                                ]
                            ],
                        ],
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Контент',
                        'icon' => 'object-group',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Новости', 'icon' => 'newspaper-o', 'url' => ['/news/news'],],
                            ['label' => 'Посты', 'icon' => 'share-square-o', 'url' => ['/post/post'],],
                            [
                                'label' => 'Вопрос-ответ',
                                'icon' => 'question-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Вопросы', 'icon' => 'question', 'url' => '/question/question',],
                                    ['label' => 'Ответы', 'icon' => 'exclamation', 'url' => '/answer/answer',],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
