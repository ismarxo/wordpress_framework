<?php

$arResult = [
    'background' => [
            'blur'  => wp_get_attachment_image_url($args['image'], 'blur'), 
            'hero'  => wp_get_attachment_image_url($args['image'], 'hero')
    ],
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] ),
    'button' => $args['button']
];


?>


<section class="hero">
    <div class="container">
        <<?= $arResult['title']['state']; ?> class="hero__title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
        <div class="format-text">
           <?= $arResult['caption']; ?>
        </div>
        <div class="hero__actions">
        <a href="#" class="btn btn--light">
            <span><?= $arResult['button']; ?></span>
        </a>
        </div>
    </div>
    <figure role="presentation" class="hero__bg hero__bg--dark">
        <picture>
            <source srcset="<?= $arResult['background']['hero']; ?>" media="(min-width: 992px)" />
            <source srcset="<?= $arResult['background']['hero']; ?>" media="(min-width: 768px)" />
            <img src="<?= $arResult['background']['hero']; ?>" srcset="<?= $arResult['background']['hero']; ?>" alt class="fit-image" />
        </picture>
    </figure>
</section>