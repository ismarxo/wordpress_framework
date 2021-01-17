<?php

$arResult = [
    'slides' => $args['slides']
];

?>



<div class="hero">
    <div class="hero-block">
        <?php foreach($arResult['slides'] as $item): ?>
        <div class="hero-slide">
            <div class="container">
                <div class="hero__info">
                    <div class="hero__title"><?= $item['title_bold']; ?></div>
                    <div class="hero__subtitle"><?=  $item['title']; ?></div>
                    <a class="btn btn--dark hero__btn" data-href="<?= $item['btn_link']; ?>"><?= $item['btn_text']; ?></a>
                </div>
            </div>
            <div class="container hero-image__container">
                <div class="hero-image lazyload" style="background-image: url(<?= wp_get_attachment_image_url($item['image'], 'blur'); ?>);" data-src="<?= wp_get_attachment_image_url($item['image'], 'banner'); ?>"></div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <div class="container">
        <div class="hero__slider-arrows">
            <button class="hero__back"><img src="<?= _assets(); ?>/img/arrow-left.svg" alt="Alt" class="svg"></button>
            <span class="hero__count"><strong>1</strong>/<small>4</small></span>
            <button class="hero__next"><img src="<?= _assets(); ?>/img/arrow-right.svg" alt="Alt" class="svg"></button>
        </div>
    </div>

    <a href="#" class="hero__link" target="_blank"><img src="<?= _assets(); ?>/img/foroom.jpg" alt="Alt"></a>
</div>