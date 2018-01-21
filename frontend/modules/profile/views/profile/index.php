<?php
/**
 * @var $this \yii\web\View
 */

\frontend\assets\ProfileAsset::register($this);
?>

<div class="row row-wrapper-body row-tabs">
    <div class="column">
        <div class="col-3">
            <div class="lf-profile">
                <div class="ava-block center">
                    <div class="photo-ava">
                        <img class="photo-user" src="img/avatar3.jpg">
                    </div>
                    <div class="link-ava">
                        <input id="tab1" type="radio" class="tab-checked" name="tabs" value="content-tab1" checked>
                        <label for="tab1" title="Профиль"><i class="fa fa-user-o" aria-hidden="true"></i> Профиль</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab2" type="radio" class="tab-checked" name="tabs" value="content-tab2">
                        <label for="tab2" title="Записи"><i class="fa fa-files-o" aria-hidden="true"></i>
                            Записи</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab3" type="radio" class="tab-checked" name="tabs" value="content-tab3">
                        <label for="tab3" title="Закладки"><i class="fa fa-paperclip" aria-hidden="true"></i>
                            Закладки</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab4" type="radio" class="tab-checked" name="tabs" value="content-tab4">
                        <label for="tab4" title="Мои вопросы"><i class="fa fa-question-circle-o"
                                                                 aria-hidden="true"></i> Вопросы</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab5" type="radio" class="tab-checked" name="tabs" value="content-tab5">
                        <label for="tab5" title="Мои ответы"><i class="fa fa-reply-all"
                                                                aria-hidden="true"></i> Ответы</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab6" type="radio" class="tab-checked" name="tabs" value="content-tab6">
                        <label for="tab6" title="Мои комментарии"><i class="fa fa-commenting-o"
                                                                     aria-hidden="true"></i> Комментарии</label>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-tab1" class="tab-content-active">
            <div class="col-9">
                <div class="rg-profile profile-prompt">
                    <div class="prompt"></div>
                </div>
            </div>
            <div class="col-9 col-pad">
                <div class="rg-profile profile-input clearfix">
                    <div class="col-3">
                        <div class="main-block-menu">
                            <ul class="menu-main">
                                <li><a href="#main" class="main-link current">Основное</a></li>
                                <li><a href="#education" class="education-link">Образование</a></li>
                                <li><a href="#work" class="work-link">Место работы</a></li>
                                <li><a href="#skill" class="skill-link">Навыки</a></li>
                                <li><a href="#about" class="about-link">О себе</a></li>
                                <li><a href="#" class="profile-link">Статистика</a></li>
                                <li><a href="#" id="change-password-link" class="change-password">Изменить пароль</a></li>
                                <li><a href="#" class="profile-link">Изменить фото</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="category-profile cat-first" id="main">
                            <form action="#"  class="form-active" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="login"
                                           placeholder="Логин :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email"
                                           placeholder="Email :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Имя :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="surname"
                                           placeholder="Фамилия :">
                                </div>
                                <div class="chek-button">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="gender1"> Мужской
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="gender2"> Женский
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city"
                                           placeholder="Город :">
                                </div>
                                <div class="button">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
                                </div>
                                <div id="modal_form">
                                    <span id="modal_close">X</span>
                                    <h2 class="confirm-password">Смена пароля</h2>
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="old-password"
                                                   placeholder="Старый пароль :">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="new-password"
                                                   placeholder="Новый пароль :">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm-password"
                                                   placeholder="Повторите пароль :">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="modal_button" class="btn btn-primary"
                                                   value="Сохранить">
                                        </div>
                                    </form>
                                </div>
                                <div id="overlay"></div>
                            </form>
                        </div>
                        <div class="category-profile cat-first" id="education">
                            <form action="#" id="education-form" method="post">
                                <div class="education">
                                    <select id="select">
                                        <option>Высшее</option>
                                        <option>Неоконченное высшее</option>
                                        <option>Среднее специальное</option>
                                        <option>Среднее</option>
                                    </select>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="institution"
                                               placeholder="Учебное заведение :">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="faculty"
                                               placeholder="Факультет,специальность :">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="education_city"
                                               placeholder="Город :">
                                    </div>
                                </div>
                                <div class="button">
                                    <input type="button" id="del-education" class="btn btn-primary  minus" value="-">
                                    <input type="button" id="add-education" class="btn btn-primary" value="+">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                        <div class="category-profile cat-first" id="work">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="company_name"
                                           placeholder="Название компании :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="company_city"
                                           placeholder="Город :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="function"
                                           placeholder="Должность :">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="scope"
                                           placeholder="Сфера деятельности :">
                                </div>
                                <div class="button">
                                    <input type="button" class="btn btn-primary" value="+">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                        <div class="category-profile cat-first" id="skill">
                            <form action="#" method="post">
                                <div class="form-group skill">
                                    <input type="text" class="form-control skill-input" name="skill[]"
                                           placeholder="Навык :">
                                </div>
                                <div class="button">
                                    <input type="button" id="del-skill" class="btn btn-primary  minus" value="-">
                                    <input type="button" id="add-skill" class="btn btn-primary" value="+">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                        <div class="category-profile cat-first" id="about">
                            <form action="#"  method="post">
                                <div class="form-group">
                                        <textarea class="form-control" name="about_me" placeholder="О себе :"
                                                  cols="30" rows="20"></textarea>
                                </div>
                                <div class="button">
                                    <input type="button" class="btn btn-primary" value="+">
                                    <input type="button" class="btn btn-primary" value="Сохранить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-tab2" class="tab-content-hidden">
            <div class="col-9">
                <div class="rg-profile profile-prompt">
                    <div class="prompt"></div>
                </div>
            </div>
            <div class="col-9 col-pad">
                <div class="rg-profile profile-input clearfix">
                    <div class="col-3">
                        <div class="main-block-menu">
                            <ul class="menu-main">
                                <li><a href="#category_1" class="category_1">Категория 1</a></li>
                                <li><a href="#category_n" class="category_n">Категория n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="category-profile cat-second" id="category_1">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок поста</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="block-review-body block-review-body-post">
                                        <div class="body-post body-post-text">
                                            <img src="img/obmen_razumov.jpg" alt="Shekli" width="180px"
                                                 align="left">
                                            <p class="media-text text-justify">Роберт Шекли родился в Нью-Йорке.
                                                Окончил технический колледж, факультативно прослушал курс литературы
                                                у Ирвина Шоу. В 1951 г. Шекли окончил Нью-Йоркский университет и
                                                получил степень бакалавра искусств, а год спустя опубликовал свой
                                                первый рассказ. Роберт Шекли является общепризнанным мастером
                                                юмористической и сатирической фантастики. Многие российские любители
                                                фантастики в числе самых любимых классических произведений называют
                                                повести Шекли «Обмен разумов» и «Билет на планету Транай», рассказы
                                                «Страж-птица», «Призрак V» и многие другие.</p>
                                            <p class="media-text text-justify">Успех и устойчивую репутацию
                                                блестящего юмориста и сатирика принесли Шекли именно короткие
                                                рассказы, в основном, написанные в 1950-е гг. Хотя по большей части
                                                творчество Шекли-рассказчика ограничено задорным, искромётным и
                                                достаточно безобидным юмором, в показном безоблачном «веселье»
                                                отчётливо слышны тревожные ноты, особенно это касается тех
                                                произведений, где автор ставит под сомнение способность человека
                                                совладать с внутренними демонами саморазрушения. В «Абсолютном
                                                оружии» (1953) исследователи на Марсе, польстившись на местное
                                                сверхоружие (уже сработавшее на ставшей пустынной планете), забыли о
                                                том, что таковое и предназначалось, видимо, абсолютно против всех,
                                                включая нашедших его; та же идея является центральной в «Пушке,
                                                которая не бабахает» (1958). Абсолютным (в смысле —
                                                саморазрушительным) оружием может стать и простая человеческая
                                                агрессивность, которую «моралисты» пытаются канализировать, придав
                                                убийству форму легального контракта — «Ордер на убийство» (1954) —
                                                или массового спорта и досуга в будущем, как в одной из самых
                                                известных новелл Шекли «Седьмая жертва» (1953); после экранизации
                                                рассказа Шекли опубликовал романизацию сценария — «Десятая жертва»
                                                [Tenth Victim] (1966), а спустя 20 лет вернулся к теме в
                                                романах-продолжениях: «Первая жертва» [Victim Prime] (1987),
                                                «Охотник/Жертва» [Hunter/Victim] (1988). Изящный рассказ
                                                «Бесконечный Вестерн» (1976) посвящён демифологизации, в духе фильма
                                                М. Крайтона «Мир Дикого Запада», ещё одного кровавого американского
                                                развлечения.</p>
                                        </div>
                                        <div class="read_more"><a href="#">Читать далее</a></div>
                                        <div class="statistics clear">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar">
                                                    <time>13-11-2017</time>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-user">
                                                    <span>Евгений Ракушкин</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-eye">
                                                    <span>585</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-star">
                                                    <span>53</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>53</span>
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="category-profile cat-second" id="category_n">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок поста</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="block-review-body block-review-body-post">
                                        <div class="body-post body-post-text">
                                            <img src="img/obmen_razumov.jpg" alt="Shekli" width="180px"
                                                 align="left">
                                            <p class="media-text text-justify">Роберт Шекли родился в Нью-Йорке.
                                                Окончил технический колледж, факультативно прослушал курс литературы
                                                у Ирвина Шоу. В 1951 г. Шекли окончил Нью-Йоркский университет и
                                                получил степень бакалавра искусств, а год спустя опубликовал свой
                                                первый рассказ. Роберт Шекли является общепризнанным мастером
                                                юмористической и сатирической фантастики. Многие российские любители
                                                фантастики в числе самых любимых классических произведений называют
                                                повести Шекли «Обмен разумов» и «Билет на планету Транай», рассказы
                                                «Страж-птица», «Призрак V» и многие другие.</p>
                                            <p class="media-text text-justify">Успех и устойчивую репутацию
                                                блестящего юмориста и сатирика принесли Шекли именно короткие
                                                рассказы, в основном, написанные в 1950-е гг. Хотя по большей части
                                                творчество Шекли-рассказчика ограничено задорным, искромётным и
                                                достаточно безобидным юмором, в показном безоблачном «веселье»
                                                отчётливо слышны тревожные ноты, особенно это касается тех
                                                произведений, где автор ставит под сомнение способность человека
                                                совладать с внутренними демонами саморазрушения. В «Абсолютном
                                                оружии» (1953) исследователи на Марсе, польстившись на местное
                                                сверхоружие (уже сработавшее на ставшей пустынной планете), забыли о
                                                том, что таковое и предназначалось, видимо, абсолютно против всех,
                                                включая нашедших его; та же идея является центральной в «Пушке,
                                                которая не бабахает» (1958). Абсолютным (в смысле —
                                                саморазрушительным) оружием может стать и простая человеческая
                                                агрессивность, которую «моралисты» пытаются канализировать, придав
                                                убийству форму легального контракта — «Ордер на убийство» (1954) —
                                                или массового спорта и досуга в будущем, как в одной из самых
                                                известных новелл Шекли «Седьмая жертва» (1953); после экранизации
                                                рассказа Шекли опубликовал романизацию сценария — «Десятая жертва»
                                                [Tenth Victim] (1966), а спустя 20 лет вернулся к теме в
                                                романах-продолжениях: «Первая жертва» [Victim Prime] (1987),
                                                «Охотник/Жертва» [Hunter/Victim] (1988). Изящный рассказ
                                                «Бесконечный Вестерн» (1976) посвящён демифологизации, в духе фильма
                                                М. Крайтона «Мир Дикого Запада», ещё одного кровавого американского
                                                развлечения.</p>
                                        </div>
                                        <div class="read_more"><a href="#">Читать далее</a></div>
                                        <div class="statistics clear">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar">
                                                    <time>13-11-2017</time>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-user">
                                                    <span>Евгений Ракушкин</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-eye">
                                                    <span>585</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-star">
                                                    <span>53</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>53</span>
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-tab3" class="tab-content-hidden">
            <div class="col-9">
                <div class="rg-profile profile-prompt">
                    <div class="prompt"></div>
                </div>
            </div>
            <div class="col-9 col-pad">
                <div class="rg-profile profile-input clearfix">
                    <div class="col-3">
                        <div class="main-block-menu">
                            <ul class="menu-main">
                                <li><a href="#category_1_1" class="category_1_1">Категория 1</a></li>
                                <li><a href="#category_n_n" class="category_n_n">Категория n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="category-profile cat-third" id="category_1_1">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок поста</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="block-review-body block-review-body-post">
                                        <div class="body-post body-post-text">
                                            <img src="img/obmen_razumov.jpg" alt="Shekli" width="180px"
                                                 align="left">
                                            <p class="media-text text-justify">Роберт Шекли родился в Нью-Йорке.
                                                Окончил технический колледж, факультативно прослушал курс литературы
                                                у Ирвина Шоу. В 1951 г. Шекли окончил Нью-Йоркский университет и
                                                получил степень бакалавра искусств, а год спустя опубликовал свой
                                                первый рассказ. Роберт Шекли является общепризнанным мастером
                                                юмористической и сатирической фантастики. Многие российские любители
                                                фантастики в числе самых любимых классических произведений называют
                                                повести Шекли «Обмен разумов» и «Билет на планету Транай», рассказы
                                                «Страж-птица», «Призрак V» и многие другие.</p>
                                            <p class="media-text text-justify">Успех и устойчивую репутацию
                                                блестящего юмориста и сатирика принесли Шекли именно короткие
                                                рассказы, в основном, написанные в 1950-е гг. Хотя по большей части
                                                творчество Шекли-рассказчика ограничено задорным, искромётным и
                                                достаточно безобидным юмором, в показном безоблачном «веселье»
                                                отчётливо слышны тревожные ноты, особенно это касается тех
                                                произведений, где автор ставит под сомнение способность человека
                                                совладать с внутренними демонами саморазрушения. В «Абсолютном
                                                оружии» (1953) исследователи на Марсе, польстившись на местное
                                                сверхоружие (уже сработавшее на ставшей пустынной планете), забыли о
                                                том, что таковое и предназначалось, видимо, абсолютно против всех,
                                                включая нашедших его; та же идея является центральной в «Пушке,
                                                которая не бабахает» (1958). Абсолютным (в смысле —
                                                саморазрушительным) оружием может стать и простая человеческая
                                                агрессивность, которую «моралисты» пытаются канализировать, придав
                                                убийству форму легального контракта — «Ордер на убийство» (1954) —
                                                или массового спорта и досуга в будущем, как в одной из самых
                                                известных новелл Шекли «Седьмая жертва» (1953); после экранизации
                                                рассказа Шекли опубликовал романизацию сценария — «Десятая жертва»
                                                [Tenth Victim] (1966), а спустя 20 лет вернулся к теме в
                                                романах-продолжениях: «Первая жертва» [Victim Prime] (1987),
                                                «Охотник/Жертва» [Hunter/Victim] (1988). Изящный рассказ
                                                «Бесконечный Вестерн» (1976) посвящён демифологизации, в духе фильма
                                                М. Крайтона «Мир Дикого Запада», ещё одного кровавого американского
                                                развлечения.</p>
                                        </div>
                                        <div class="read_more"><a href="#">Читать далее</a></div>
                                        <div class="statistics clear">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar">
                                                    <time>13-11-2017</time>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-user">
                                                    <span>Евгений Ракушкин</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-eye">
                                                    <span>585</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-star">
                                                    <span>53</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>53</span>
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="category-profile cat-third" id="category_n_n">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок поста</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="block-review-body block-review-body-post">
                                        <div class="body-post body-post-text">
                                            <img src="img/obmen_razumov.jpg" alt="Shekli" width="180px"
                                                 align="left">
                                            <p class="media-text text-justify">Роберт Шекли родился в Нью-Йорке.
                                                Окончил технический колледж, факультативно прослушал курс литературы
                                                у Ирвина Шоу. В 1951 г. Шекли окончил Нью-Йоркский университет и
                                                получил степень бакалавра искусств, а год спустя опубликовал свой
                                                первый рассказ. Роберт Шекли является общепризнанным мастером
                                                юмористической и сатирической фантастики. Многие российские любители
                                                фантастики в числе самых любимых классических произведений называют
                                                повести Шекли «Обмен разумов» и «Билет на планету Транай», рассказы
                                                «Страж-птица», «Призрак V» и многие другие.</p>
                                            <p class="media-text text-justify">Успех и устойчивую репутацию
                                                блестящего юмориста и сатирика принесли Шекли именно короткие
                                                рассказы, в основном, написанные в 1950-е гг. Хотя по большей части
                                                творчество Шекли-рассказчика ограничено задорным, искромётным и
                                                достаточно безобидным юмором, в показном безоблачном «веселье»
                                                отчётливо слышны тревожные ноты, особенно это касается тех
                                                произведений, где автор ставит под сомнение способность человека
                                                совладать с внутренними демонами саморазрушения. В «Абсолютном
                                                оружии» (1953) исследователи на Марсе, польстившись на местное
                                                сверхоружие (уже сработавшее на ставшей пустынной планете), забыли о
                                                том, что таковое и предназначалось, видимо, абсолютно против всех,
                                                включая нашедших его; та же идея является центральной в «Пушке,
                                                которая не бабахает» (1958). Абсолютным (в смысле —
                                                саморазрушительным) оружием может стать и простая человеческая
                                                агрессивность, которую «моралисты» пытаются канализировать, придав
                                                убийству форму легального контракта — «Ордер на убийство» (1954) —
                                                или массового спорта и досуга в будущем, как в одной из самых
                                                известных новелл Шекли «Седьмая жертва» (1953); после экранизации
                                                рассказа Шекли опубликовал романизацию сценария — «Десятая жертва»
                                                [Tenth Victim] (1966), а спустя 20 лет вернулся к теме в
                                                романах-продолжениях: «Первая жертва» [Victim Prime] (1987),
                                                «Охотник/Жертва» [Hunter/Victim] (1988). Изящный рассказ
                                                «Бесконечный Вестерн» (1976) посвящён демифологизации, в духе фильма
                                                М. Крайтона «Мир Дикого Запада», ещё одного кровавого американского
                                                развлечения.</p>
                                        </div>
                                        <div class="read_more"><a href="#">Читать далее</a></div>
                                        <div class="statistics clear">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar">
                                                    <time>13-11-2017</time>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-user">
                                                    <span>Евгений Ракушкин</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-eye">
                                                    <span>585</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-star">
                                                    <span>53</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>53</span>
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-tab4" class="tab-content-hidden">
            <div class="col-9">
                <div class="rg-profile profile-prompt">
                    <div class="prompt"></div>
                </div>
            </div>
            <div class="col-9 col-pad">
                <div class="rg-profile profile-input clearfix">
                    <div class="col-3">
                        <div class="main-block-menu">
                            <ul class="menu-main">
                                <li><a href="#category_1_1_1" class="category_1_1_1">Категория 1</a></li>
                                <li><a href="#category_n_n_n" class="category_n_n_n">Категория n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="category-profile cat-fourth" id="category_1_1_1">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок вопроса</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="block-review-body block-review-body-post">
                                        <div class="body-post body-post-text">
                                            <p class="media-text text-justify">Роберт Шекли родился в Нью-Йорке.
                                                Окончил технический колледж, факультативно прослушал курс литературы
                                                у Ирвина Шоу. В 1951 г. Шекли окончил Нью-Йоркский университет и
                                                получил степень бакалавра искусств, а год спустя опубликовал свой
                                                первый рассказ. Роберт Шекли является общепризнанным мастером
                                                юмористической и сатирической фантастики. Многие российские любители
                                                фантастики в числе самых любимых классических произведений называют
                                                повести Шекли «Обмен разумов» и «Билет на планету Транай», рассказы
                                                «Страж-птица», «Призрак V» и многие другие.</p>
                                        </div>
                                        <div class="edit">
                                            <a class="btn btn-primary" href="#">Редактировать</a>
                                        </div>
                                        <div class="statistics clear">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar">
                                                    <time>13-11-2017</time>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-user">
                                                    <span>Евгений Ракушкин</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-eye">
                                                    <span>585</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-star">
                                                    <span>53</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>53</span>
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="category-profile cat-fourth" id="category_n_n_n">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок вопроса</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="block-review-body block-review-body-post">
                                        <div class="body-post body-post-text">
                                            <p class="media-text text-justify">Роберт Шекли родился в Нью-Йорке.
                                                Окончил технический колледж, факультативно прослушал курс литературы
                                                у Ирвина Шоу. В 1951 г. Шекли окончил Нью-Йоркский университет и
                                                получил степень бакалавра искусств, а год спустя опубликовал свой
                                                первый рассказ. Роберт Шекли является общепризнанным мастером
                                                юмористической и сатирической фантастики. Многие российские любители
                                                фантастики в числе самых любимых классических произведений называют
                                                повести Шекли «Обмен разумов» и «Билет на планету Транай», рассказы
                                                «Страж-птица», «Призрак V» и многие другие.</p>
                                        </div>
                                        <div class="edit">
                                            <a class="btn btn-primary" href="#">Редактировать</a>
                                        </div>
                                        <div class="statistics clear">
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-calendar">
                                                    <time>13-11-2017</time>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-user">
                                                    <span>Евгений Ракушкин</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-eye">
                                                    <span>585</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-star">
                                                    <span>53</span>
                                                </a>
                                            </div>
                                            <div class="post_statistics">
                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                <span>53</span>
                                                <a href="#" class="fa fa-thumbs-down"></a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-tab5" class="tab-content-hidden">
            <div class="col-9">
                <div class="rg-profile profile-prompt">
                    <div class="prompt"></div>
                </div>
            </div>
            <div class="col-9 col-pad">
                <div class="rg-profile profile-input clearfix">
                    <div class="col-3">
                        <div class="main-block-menu">
                            <ul class="menu-main">
                                <li><a href="#category_1_1_1_1" class="category_1_1_1_1">Категория 1</a></li>
                                <li><a href="#category_n_n_n_n" class="category_n_n_n_n">Категория n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="category-profile cat-fifth" id="category_1_1_1_1">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок вопроса</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="comments">
                                        <ul class="media-list">
                                            <!-- Комментарий (уровень 1) -->
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-thumbnail"
                                                             src="img/avatar1.jpg"
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
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Lorem ipsum dolor sit amet.
                                                        Blanditiis praesentium voluptatum deleniti atque. Autem vel
                                                        illum, qui blanditiis praesentium voluptatum deleniti atque
                                                        corrupti. Dolor repellendus cum soluta nobis. Corporis
                                                        suscipit laboriosam, nisi ut enim. Debitis aut perferendis
                                                        doloribus asperiores repellat. sint, obcaecati cupiditate
                                                        non numquam eius. Itaque earum rerum facilis. Similique sunt
                                                        in ea commodi. Dolor repellendus numquam eius modi. Quam
                                                        nihil molestiae consequatur, vel illum, qui ratione
                                                        voluptatem accusantium doloremque.
                                                    </div>
                                                    <hr>
                                                    <!-- Вложенный медиа-компонент (уровень 2) -->
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <div class="author">Мой ответ</div>
                                                                <div class="metadata">
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-calendar"></a>
                                                                        <time>13-11-2017</time>
                                                                    </div>
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-thumbs-up"></a>
                                                                        <span>53</span>
                                                                        <a href="#" class="fa fa-thumbs-down"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media-text text-justify">Dolor sit, amet,
                                                                consectetur, adipisci velit. Aperiam eaque ipsa,
                                                                quae. Amet, consectetur, adipisci velit, sed quia
                                                                consequuntur magni dolores. Ab illo inventore
                                                                veritatis et quasi architecto. Quisquam est, omnis
                                                                voluptas nulla. Obcaecati cupiditate non numquam
                                                                eius modi tempora. Corporis suscipit laboriosam,
                                                                nisi ut labore et aut reiciendis.
                                                            </div>
                                                            <div class="edit">
                                                                <a class="btn btn-primary"
                                                                   href="#">Редактировать</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <div class="author">Мой ответ</div>
                                                                <div class="metadata">
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-calendar"></a>
                                                                        <time>13-11-2017</time>
                                                                    </div>
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-thumbs-up"></a>
                                                                        <span>53</span>
                                                                        <a href="#" class="fa fa-thumbs-down"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media-text text-justify">Dolor sit, amet,
                                                                consectetur, adipisci velit. Aperiam eaque ipsa,
                                                                quae. Amet, consectetur, adipisci velit, sed quia
                                                                consequuntur magni dolores. Ab illo inventore
                                                                veritatis et quasi architecto. Quisquam est, omnis
                                                                voluptas nulla. Obcaecati cupiditate non numquam
                                                                eius modi tempora. Corporis suscipit laboriosam,
                                                                nisi ut labore et aut reiciendis.
                                                            </div>
                                                            <div class="edit">
                                                                <a class="btn btn-primary"
                                                                   href="#">Редактировать</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="category-profile cat-fifth" id="category_n_n_n_n">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок вопроса</a></h3>
                                    <ul class="crumbs inline-block">
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                            /
                                        </li>
                                        <li class="inline-block-item inline-block-breadcrumb">
                                            <a href="#" class="breadcrumb-link">Категория</a>
                                        </li>
                                    </ul>
                                    <div class="comments">
                                        <ul class="media-list">
                                            <!-- Комментарий (уровень 1) -->
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-thumbnail"
                                                             src="img/avatar1.jpg"
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
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Lorem ipsum dolor sit amet.
                                                        Blanditiis praesentium voluptatum deleniti atque. Autem vel
                                                        illum, qui blanditiis praesentium voluptatum deleniti atque
                                                        corrupti. Dolor repellendus cum soluta nobis. Corporis
                                                        suscipit laboriosam, nisi ut enim. Debitis aut perferendis
                                                        doloribus asperiores repellat. sint, obcaecati cupiditate
                                                        non numquam eius. Itaque earum rerum facilis. Similique sunt
                                                        in ea commodi. Dolor repellendus numquam eius modi. Quam
                                                        nihil molestiae consequatur, vel illum, qui ratione
                                                        voluptatem accusantium doloremque.
                                                    </div>
                                                    <hr>
                                                    <!-- Вложенный медиа-компонент (уровень 2) -->
                                                    <div class="media">

                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <div class="author">Мой ответ</div>
                                                                <div class="metadata">
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-calendar"></a>
                                                                        <time>13-11-2017</time>
                                                                    </div>
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-thumbs-up"></a>
                                                                        <span>53</span>
                                                                        <a href="#" class="fa fa-thumbs-down"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media-text text-justify">Dolor sit, amet,
                                                                consectetur, adipisci velit. Aperiam eaque ipsa,
                                                                quae. Amet, consectetur, adipisci velit, sed quia
                                                                consequuntur magni dolores. Ab illo inventore
                                                                veritatis et quasi architecto. Quisquam est, omnis
                                                                voluptas nulla. Obcaecati cupiditate non numquam
                                                                eius modi tempora. Corporis suscipit laboriosam,
                                                                nisi ut labore et aut reiciendis.
                                                            </div>
                                                            <div class="edit">
                                                                <a class="btn btn-primary"
                                                                   href="#">Редактировать</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <div class="author">Мой ответ</div>
                                                                <div class="metadata">
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-calendar"></a>
                                                                        <time>13-11-2017</time>
                                                                    </div>
                                                                    <div class="post_statistics">
                                                                        <a href="#" class="fa fa-thumbs-up"></a>
                                                                        <span>53</span>
                                                                        <a href="#" class="fa fa-thumbs-down"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media-text text-justify">Dolor sit, amet,
                                                                consectetur, adipisci velit. Aperiam eaque ipsa,
                                                                quae. Amet, consectetur, adipisci velit, sed quia
                                                                consequuntur magni dolores. Ab illo inventore
                                                                veritatis et quasi architecto. Quisquam est, omnis
                                                                voluptas nulla. Obcaecati cupiditate non numquam
                                                                eius modi tempora. Corporis suscipit laboriosam,
                                                                nisi ut labore et aut reiciendis.
                                                            </div>
                                                            <div class="edit">
                                                                <a class="btn btn-primary"
                                                                   href="#">Редактировать</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-tab6" class="tab-content-hidden">
            <div class="col-9">
                <div class="rg-profile profile-prompt">
                    <div class="prompt"></div>
                </div>
            </div>
            <div class="col-9 col-pad">
                <div class="rg-profile profile-input clearfix">
                    <div class="col-3">
                        <div class="main-block-menu">
                            <ul class="menu-main">
                                <li><a href="#category_1_1_1_1_1" class="category_1_1_1_1_1">Категория 1</a></li>
                                <li><a href="#category_n_n_n_n_n" class="category_n_n_n_n_n">Категория n</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="category-profile cat-sixth" id="category_1_1_1_1_1">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок поста</a>
                                        <div class="read_more"><a href="#">Полная статья</a></div>
                                    </h3>
                                    <div class="comments">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">Мой комментарий</div>
                                                        <div class="metadata">
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-calendar"></a>
                                                                <time>13-11-2017</time>
                                                            </div>
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Dolor sit, amet,
                                                        consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet,
                                                        consectetur, adipisci velit, sed quia consequuntur magni
                                                        dolores. Ab illo inventore veritatis et quasi architecto.
                                                        Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non
                                                        numquam eius modi tempora. Corporis suscipit laboriosam,
                                                        nisi ut labore et aut reiciendis.
                                                    </div>
                                                    <div class="edit">
                                                        <a class="btn btn-primary" href="#">Редактировать</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">Мой комментарий</div>
                                                        <div class="metadata">
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-calendar"></a>
                                                                <time>13-11-2017</time>
                                                            </div>
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Dolor sit, amet,
                                                        consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet,
                                                        consectetur, adipisci velit, sed quia consequuntur magni
                                                        dolores. Ab illo inventore veritatis et quasi architecto.
                                                        Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non
                                                        numquam eius modi tempora. Corporis suscipit laboriosam,
                                                        nisi ut labore et aut reiciendis.
                                                    </div>
                                                    <div class="edit">
                                                        <a class="btn btn-primary" href="#">Редактировать</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">Мой комментарий</div>
                                                        <div class="metadata">
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-calendar"></a>
                                                                <time>13-11-2017</time>
                                                            </div>
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Dolor sit, amet,
                                                        consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet,
                                                        consectetur, adipisci velit, sed quia consequuntur magni
                                                        dolores. Ab illo inventore veritatis et quasi architecto.
                                                        Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non
                                                        numquam eius modi tempora. Corporis suscipit laboriosam,
                                                        nisi ut labore et aut reiciendis.
                                                    </div>
                                                    <div class="edit">
                                                        <a class="btn btn-primary" href="#">Редактировать</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="category-profile cat-sixth" id="category_n_n_n_n_n">
                            <div class="body-list">
                                <article class="block-list-article block-list-item block block-review">
                                    <h3><a href="#" class="block-review-header">Заголовок поста</a>
                                        <div class="read_more"><a href="#">Полная статья</a></div>
                                    </h3>
                                    <div class="comments">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">Мой комментарий</div>
                                                        <div class="metadata">
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-calendar"></a>
                                                                <time>13-11-2017</time>
                                                            </div>
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Dolor sit, amet,
                                                        consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet,
                                                        consectetur, adipisci velit, sed quia consequuntur magni
                                                        dolores. Ab illo inventore veritatis et quasi architecto.
                                                        Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non
                                                        numquam eius modi tempora. Corporis suscipit laboriosam,
                                                        nisi ut labore et aut reiciendis.
                                                    </div>
                                                    <div class="edit">
                                                        <a class="btn btn-primary" href="#">Редактировать</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">Мой комментарий</div>
                                                        <div class="metadata">
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-calendar"></a>
                                                                <time>13-11-2017</time>
                                                            </div>
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Dolor sit, amet,
                                                        consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet,
                                                        consectetur, adipisci velit, sed quia consequuntur magni
                                                        dolores. Ab illo inventore veritatis et quasi architecto.
                                                        Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non
                                                        numquam eius modi tempora. Corporis suscipit laboriosam,
                                                        nisi ut labore et aut reiciendis.
                                                    </div>
                                                    <div class="edit">
                                                        <a class="btn btn-primary" href="#">Редактировать</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <div class="author">Мой комментарий</div>
                                                        <div class="metadata">
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-calendar"></a>
                                                                <time>13-11-2017</time>
                                                            </div>
                                                            <div class="post_statistics">
                                                                <a href="#" class="fa fa-thumbs-up"></a>
                                                                <span>53</span>
                                                                <a href="#" class="fa fa-thumbs-down"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media-text text-justify">Dolor sit, amet,
                                                        consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet,
                                                        consectetur, adipisci velit, sed quia consequuntur magni
                                                        dolores. Ab illo inventore veritatis et quasi architecto.
                                                        Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non
                                                        numquam eius modi tempora. Corporis suscipit laboriosam,
                                                        nisi ut labore et aut reiciendis.
                                                    </div>
                                                    <div class="edit">
                                                        <a class="btn btn-primary" href="#">Редактировать</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>