<?php
//Template Name: Цены
get_header();


$arResult = [
    'title' => [
        'state' => carbon_get_the_post_meta( 'title_state'), 
        'text'  => carbon_get_the_post_meta( 'title'),
    ],
    'desc' => apply_filters( 'the_content', carbon_get_the_post_meta( 'desc') ),
    'content' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content') ),
    'content2' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content2') ),
    'title2' => [
        'state' => carbon_get_the_post_meta( 'title_state2'), 
        'text'  => carbon_get_the_post_meta( 'title2'),
    ],
    'content3' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content3') ),
];

?>


<main class="main">
    <section class="price">
        <div class="container">
            <header class="price__header">
                <<?= $arResult['title']['state']; ?> class="title"><?php if($arResult['title']['text']): echo $arResult['title']['text']; else: the_title();  endif;  ?></<?= $arResult['title']['state']; ?>>
                <div class="format-text">
                    <?= $arResult['desc']; ?>
                </div>
            </header>
            <div class="table-box price__table format-text">
               <?= $arResult['content']; ?>
            </div>
            <div class="price__actions">
                <a href="/form/" class="btn btn--outline">
                    <span>Оставить заявку</span>
                </a>
            </div>
            <div class="price__info">
                <?= $arResult['content2']; ?>
            </div>
        </div>
    </section>

    <section class="subscribe-price">
        <div class="container">
            <header class="subscribe-price__header">
                <<?= $arResult['title2']['state']; ?> class="title"><?= $arResult['title2']['text']; ?></<?= $arResult['title2']['state']; ?>>
                <div class="format-text">
                    <?= $arResult['content3']; ?>
                </div>                 
            </header>
            <?= do_shortcode('[contact-form-7 id="90" title="Получить прайс-лист" html_class="form subscribe-price__form"]'); ?>


            <p class="subscribe__terms">
                Нажимая на кнопку, я даю свое согласие на обработку персональных данных
                и принимаю
                <a target="_blank" href="/politika-konfidenczialnosti/">условия соглашения</a>
            </p>
        </div>
    </section>
</main>

<?php

get_footer(); 

?>