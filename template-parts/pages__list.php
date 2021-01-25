<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] ),
    'links' => $args['links'],
];

?>

<div class="section section-services services">
    <div class="container">
        <div class="section__inner services__inner">
            <<?= $arResult['title']['state']; ?> class="h2 section__title services__title">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
            <div class="section__desc format-text">
                <?= $arResult['caption']; ?>
            </div>
            <ul class="services__flow">
                <?php foreach ($arResult['links'] as $item): ?>
                    <li class="services__item">
                        <a href="<?= get_the_permalink($item['id']) ?>" class="services__link">
                            <div class="services__item-back">
                                <?php
                                    $blur = get_the_post_thumbnail_url($item['id'], 'blur');
                                    $image = get_the_post_thumbnail_url($item['id'], 'news');
                                    $alt = get_post_meta(get_post_thumbnail_id($item['id']), '_wp_attachment_image_alt', TRUE); 
                                ?>

                                <img src="<?= $blur ?>" data-src="<?= $image ?>" alt="<?= $alt ?>" class="services__item-img lazyload">
                            </div>
                            <div class="services__item-name">
                                <?= get_the_title($item['id']); ?>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>