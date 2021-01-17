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
    'button' => $args['button'],
    'link' => $args['link']
];

?>



<div class="sale-info">
    <div class="sale-info__box">
        <figure class="sale-info__img">
            <img src="#" srcset="<?= $arResult['background']['hero']; ?>" alt class="fit-image" />
        </figure>
        <div class="sale-info__info">
        <<?= $arResult['title']['state']; ?> class="sale-info__title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
        <div class="format-text">
            <?= $arResult['caption']; ?>
        </div>
        <div class="sale-info__actions">
            <a href="<?= $arResult['link']; ?>" class="btn btn--light btn--square">
                <span><?= $arResult['button']; ?></span>
            </a>
        </div>
        </div>
    </div>
</div>