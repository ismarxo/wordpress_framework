<?php
//Template Name: Услуга
get_header();


$arResult = [
    'subtitle'  => carbon_get_the_post_meta( 'subtitle'),
    'title' => [
        'state' => carbon_get_the_post_meta( 'title_state'), 
        'text'  => carbon_get_the_post_meta( 'title'),
    ],
    'image' => [
        'link' => wp_get_attachment_image_url(carbon_get_the_post_meta( 'image' ), 'full'),
        'alt' => get_post_meta(carbon_get_the_post_meta( 'image' ), '_wp_attachment_image_alt', TRUE)
    ],
    'desc' => apply_filters( 'the_content', carbon_get_the_post_meta( 'desc') ),
    'content' => apply_filters( 'the_content', carbon_get_the_post_meta( 'content') ),
];


?>
<main class="main">
    <article class="article service">
    <header class="hero-header">
        <div class="hero-header__author"><?= $arResult['subtitle']; ?></div>
        <<?= $arResult['title']['state']; ?> class="title"><?php if($arResult['title']['text']): echo $arResult['title']['text']; else: the_title();  endif;  ?></<?= $arResult['title']['state']; ?>>
        <div class="format-text">
            <?= $arResult['desc']; ?>
        </div>
        <figure role="presentation" class="hero-header__bg">
        <picture>            
            <img src="#" srcset="<?= $arResult['image']['link']; ?>" alt="<?= $arResult['image']['alt']; ?>" class="fit-image" />
        </picture>
        </figure>
        <button data-next-target="#content" class="hero-header__next-btn js-next">
        <svg width="38" height="18">
            <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#arrow-down2" />
        </svg>
        </button>
    </header>
    <div id="content" class="container">
        <?= $arResult['content']; ?>
        <div class="service__actions">
        <a href="/form/" class="btn btn--outline">
            <span>Оставить заявку</span>
        </a>
        </div>
    </div>
    </article>
</main>



<?php

get_footer();

?>