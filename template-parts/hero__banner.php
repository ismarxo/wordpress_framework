<?php

$arResult = [
    'background' => [
            'blur'  => wp_get_attachment_image_url($args['image'], 'blur'), 
            'hero'  => wp_get_attachment_image_url($args['image'], 'hero')
    ],
    'pretitle'  => $args['pretitle'],
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] ),
    'button' => [
        'link' => $args['button_link'],
        'text' => $args['button_text'],
    ]
];

?>


<section class="section section-hero hero" style="background-image: url(<?= $arResult['background']['hero']; ?>);">
    <div class="container">
        <div class="hero__inner">
            <div class="hero__info">
                <div class="hero__subtitle">
                    <?= $arResult['pretitle']; ?>
                </div>
                <<?= $arResult['title']['state']; ?> class="h1 hero__title">
                    <?= $arResult['title']['text']; ?>
                </<?= $arResult['title']['state']; ?>>
                <div class="hero__desc format-text format-text--invert">
                    <?= $arResult['caption']; ?>
                </div>
                <a href="<?= $arResult['button']['link']; ?>" class="hero__link">
                    <?= $arResult['button']['text']; ?>
                </a>
            </div>
        </div>
    </div>
</section>