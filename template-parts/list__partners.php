<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'list' => $args['list']
];

?>










<section class="partners">
    <div class="container">
        <<?= $arResult['title']['state']; ?> class="partners__title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
        <div class="partners__box">
            <div data-swiper-options="partners" class="partners__box2 js-swiper">
                <ul class="partners__list swiper-wrapper">
                    <?php foreach($arResult['list'] as $item): ?>
                    <li class="partners__item swiper-slide">
                        <img src="#" srcset="<?= wp_get_attachment_image_url($item['image'], 'news'); ?>" alt="<?= get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE); ?>" />
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <button class="partners__prev-btn">
                <svg width="20" height="20">
                    <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#arrow-left" />
                </svg>
            </button>
            <button class="partners__next-btn">
                <svg width="20" height="20">
                    <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#arrow-right" />
                </svg>
            </button>
        </div>
    </div>
</section>