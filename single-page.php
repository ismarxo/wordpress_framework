<?php
//Template Name: Контентная
get_header();


$arResult = [
    'deadline' => carbon_get_the_post_meta( 'deadline'), 
    'title' => [
        'state' => carbon_get_the_post_meta( 'title_state'), 
        'text'  => carbon_get_the_post_meta( 'title'),
    ],
    'desc' => apply_filters( 'the_content', carbon_get_the_post_meta( 'desc') ),
    'content' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content') ),
];

$months = array( 1 => 'ЯНВАРЯ' , 'ФЕВРАЛЯ' , 'МАРТА' , 'АПРЕЛЯ' , 'МАЯ' , 'ИЮНЯ' , 'ИЮЛЯ' , 'АВГУСТА' , 'СЕНТЯБРЯ' , 'ОКТЯБРЯ' , 'НОЯБРЯ' , 'ДЕКАБРЯ' );


?>

<main class="main">
    <article class="post">
        <div class="container">
            <header class="post__header">
                <time class="post__header-date"><?php if( ! carbon_get_the_post_meta( 'date') ) { echo get_the_date('d').' '.$months[ get_the_date('n')].' '.get_the_date('Y'); } else { if($arResult['deadline'] != '') echo $arResult['deadline']; } ?> </time>
                <<?= $arResult['title']['state']; ?> class="title"><?php if($arResult['title']['text']): echo $arResult['title']['text']; else: the_title();  endif;  ?></<?= $arResult['title']['state']; ?>>
                <div class="format-text">
                    <?= $arResult['desc']; ?>
                </div>
            </header>
            <?= $arResult['content']; ?>
        </div>
    </article>

    <?php

    $arResult = [
        'title' => [
            'state' => carbon_get_the_post_meta( 'title_state2'), 
            'text'  => carbon_get_the_post_meta( 'title2'),
        ],
        'content' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content2') ),
    ];

    ?>


    <?php if(!is_page(3)): ?>
    <section class="subscribe  subscribe--white">
        <div class="container">
            <header class="subscribe__header">
            <<?= $arResult['title']['state']; ?> class="title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
            <div class="format-text">
                <?= $arResult['content']; ?>
            </div>
            </header>

            <?= do_shortcode('[contact-form-7 id="75" title="Подписаться" html_class="form subscribe__form"]'); ?>

            <p class="subscribe__terms">
                Нажимая на кнопку, я даю свое согласие на обработку персональных данных
                и принимаю
                <a target="_blank" href="<?= get_page_link(3); ?>">условия соглашения</a>
            </p>
        </div>
    </section>
    <?php endif; ?>
</main>


<?php

get_footer();

?>