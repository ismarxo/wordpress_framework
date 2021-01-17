<?php
//Template Name:О компании
get_header();


// $arResult = [
//     'title' => [
//         'state' => carbon_get_the_post_meta( 'title_state'), 
//         'text'  => carbon_get_the_post_meta( 'title'),
//     ],
//     'desc' => apply_filters( 'the_content', carbon_get_the_post_meta( 'desc') ),
//     'content' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content') ),
// ];

// $months = array( 1 => 'ЯНВАРЯ' , 'ФЕВРАЛЯ' , 'МАРТА' , 'АПРЕЛЯ' , 'МАЯ' , 'ИЮНЯ' , 'ИЮЛЯ' , 'АВГУСТА' , 'СЕНТЯБРЯ' , 'ОКТЯБРЯ' , 'НОЯБРЯ' , 'ДЕКАБРЯ' );


?>


<main class="main">
    <div class="about">
        <article class="about__info">
            <div class="container">
                <div class="about__info-box">
                    <header class="about__info-header">
                        <h1 class="title">ABOUT TEST</h1>
                        <p>Оказание услуг юридическим лицам и индивидуальным предпринимателям</p>
                    </header>
                    <p>
                        Юридическая компания ООО «РЕГИСТРУМ» основана в 2009 г.
                        <br />Основными направлениями деятельности является регистрация, внесение
                        изменений и ликвидация юридических лиц и индивидуальных
                        предпринимателей, сопровождение сделок с недвижимостью. За время
                        работы специалисты компании обрели большой практический опыт в сфере
                        оказания данного вида услуг, что позволяет выполнять работу четко,
                        качественно и гарантировать результат.
                    </p>
                    <p>
                        Наша компания не большая, мы не имеем наград и статусов. Мы просто
                        любим свою работу и поэтому особо внимательно относимся к каждому
                        клиенту и предлагаем разумные цены на квалифицированные услуги!
                    </p>
                    <p>Обращайтесь к нам — с нами легко!</p>
                </div>
            </div>
        </article>

        <section class="team">
            <header class="team__header">
                <div class="team__header-container">
                    <h2 class="title">Наши специалисты TEST</h2>
                    <p>
                        Мы любим свою работу, особенно внимательно относимся к каждому клиенту
                        и всегда предлагаем разумные цены!
                    </p>
                </div>
            </header>
            <div class="team__hero">
                <figure class="team__hero-img">
                    <picture>
                        <source srcset="<?= _assets(); ?>/img/components/team/hero/director-992.jpg" media="(min-width: 992px)" />
                        <source srcset="<?= _assets(); ?>/img/components/team/hero/director-768.jpg" media="(min-width: 768px)" />
                        <img src="#" srcset="<?= _assets(); ?>/img/components/team/hero/director.jpg" alt="Имя Фамилия - директор" />
                    </picture>
                </figure>
                <div class="container">
                    <div class="team__hero-info">
                        <div class="team__hero-name">TEST</div>
                        <div class="team__hero-position">Директор</div>
                        <p>
                            Стаж работы юристом 15 лет.
                            <br />Образование: Московский государственный университет им.
                            Ломоносова.
                            <br />Сертификаты: перечень. wefwefw wef we fw ef wef we fw ef wef wef
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <ul class="team__list">
                    <li class="team__item">
                        <figure class="team__item-img">
                            <img src="#" srcset="<?= _assets(); ?>/img/components/team/1.jpg" alt class="fit-image" />
                        </figure>
                        <div class="team__item-body">
                            <div class="team__item-name">Имя eeeeeФамилия</div>
                            <div class="team__item-position">Должность TEST</div>
                            <p>
                                Стаж работы юристом 15 лет. Образование: Московский государственный университет им.
                                Ломоносова.
                                Сертификаты: перечень.
                            </p>
                        </div>
                    </li>
                    <li class="team__item">
                        <figure class="team__item-img">
                            <img src="#" srcset="<?= _assets(); ?>/img/components/team/hero/director-768.jpg" alt class="fit-image" />
                        </figure>
                        <div class="team__item-body">
                            <div class="team__item-name">Имя Фамилия</div>
                            <div class="team__item-position">Должность</div>
                            <p>
                                Стаж работы юристом 15 лет. Образование: Московский государственный университет им.
                                Ломоносова.
                                Сертификаты: перечень.
                            </p>
                        </div>
                    </li>
                    <li class="team__item">
                        <figure class="team__item-img">
                            <img src="#" srcset="<?= _assets(); ?>/img/components/team/3.jpg" alt class="fit-image" />
                        </figure>
                        <div class="team__item-body">
                            <div class="team__item-name">Имя Фамилия</div>
                            <div class="team__item-position">Должность</div>
                            <p>Стаж работы юристом 5 лет. Образование: БФУ им. И. Канта. Сертификаты: перечень.</p>
                        </div>
                    </li>
                    <li class="team__item">
                        <figure class="team__item-img">
                            <img src="#" srcset="<?= _assets(); ?>/img/components/team/4.jpg" alt class="fit-image" />
                        </figure>
                        <div class="team__item-body">
                            <div class="team__item-name">Имя Фамилия</div>
                            <div class="team__item-position">Должность</div>
                            <p>Стаж работы юристом 5 лет. Образование: БФУ им. И. Канта. Сертификаты: перечень.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="advantages">
            <div class="container">
                <header class="advantages__header">
                    <h2 class="title">Почему стоит выбрать именно нас:</h2>
                    <p>
                        Наши специалисты проконсультируют Вас и предложат решение вопросов по
                        регистрации, внесению изменений и ликвидации юридических лиц и
                        индивидуальных предпринимателей.
                    </p>
                </header>
                <ul class="advantages__list">
                    <li class="advantages__item">
                        <figure class="advantages__item-icon">
                            <svg width="100" height="100">
                                <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#folder" />
                            </svg>
                        </figure>
                        <div class="advantages__item-title">Логика</div>
                        <p>
                            Индивидуальный подход.
                            <br />Разумное решение.
                        </p>
                    </li>
                    <li class="advantages__item">
                        <figure class="advantages__item-icon">
                            <svg width="100" height="100">
                                <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#passport" />
                            </svg>
                        </figure>
                        <div class="advantages__item-title">Документ</div>
                        <p>
                            Подготовка пакета
                            <br />документов.
                        </p>
                    </li>
                    <li class="advantages__item">
                        <figure class="advantages__item-icon">
                            <svg width="100" height="100">
                                <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#contract" />
                            </svg>
                        </figure>
                        <div class="advantages__item-title">Порядок</div>
                        <p>
                            Своевременность. Контроль
                            <br />за ходом регистрации.
                        </p>
                    </li>
                    <li class="advantages__item">
                        <figure class="advantages__item-icon">
                            <svg width="100" height="100">
                                <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#data" />
                            </svg>
                        </figure>
                        <div class="advantages__item-title">Результат</div>
                        <p>
                            Оформление результата
                            <br />и передача заказчику.
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <div class="free-consultation">
            <div class="free-consultation__title">
                Запишитесь на бесплатную
                <br />консультацию.
            </div>
            <a href="/form/" class="btn btn--light">
                <span>Оставить заявку</span>
            </a>
            <figure role="presentation" class="free-consultation__bg">
                <picture>
                    <source srcset="<?= _assets(); ?>/img/components/free-consultation/bg-992.jpg" media="(min-width: 992px)" />
                    <source srcset="<?= _assets(); ?>/img/components/free-consultation/bg-768.jpg" media="(min-width: 768px)" />
                    <img src="#" srcset="<?= _assets(); ?>/img/components/free-consultation/bg.jpg" alt class="fit-image" />
                </picture>
            </figure>
        </div>
    </div>
</main>

<?php

get_footer();

