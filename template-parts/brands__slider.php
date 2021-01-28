<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'brand__list' => $args['brand__list']
]

?>


<section class="section section-partners partners">
    <div class="container">
        <div class="section__inner partners__inner">
            <<?= $arResult['title']['state']; ?> class="h2 section__title partners__title">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
            <div class="partners__flow">
                <?php foreach($arResult['brand__list'] as $item): ?>

                    <?php 
                             
                    $blur = wp_get_attachment_image_url($item['image'], 'blur');
                    $news = wp_get_attachment_image_url($item['image'], 'news');
                    $alt = get_post_meta(get_post_thumbnail_id($item['image']), '_wp_attachment_image_alt', TRUE); 
                    ?>

                <div class="partners__item">
                    <div class="partners__item-inner">
                        <img src="<?= $blur ?>" data-src="<?= $news ?>" alt="<?= $alt ?>" class="partners__item-img lazyload">
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>