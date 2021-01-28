<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] ),
    'link'  => $args['link'],
    'list' => $args['list']
];

?>

<section class="section-works works">
    <div class="container">
        <div class="section__inner works__inner">
            <<?= $arResult['title']['state']; ?> class="h2 section__title works__title">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
            <div class="format-text section__desc works__desc">
                <?= $arResult['caption']; ?>
            </div>
        </div>
    </div>
    <div class="works__flows">
        <div class="works__side-flow-wrap">
            <div class="works__side-flow">
                <?php foreach($arResult['list'] as $item): ?>

                    <?php 
                             
                             $blur = wp_get_attachment_image_url($item['image'], 'blur');
                             $hero = wp_get_attachment_image_url($item['image'], 'hero');
                        ?>

                <div class="works__side-item lazyload" style="background-image: url(<?= $blur; ?>);"  data-src="<?= $hero ?>">
                    <div class="works__side-item-info">
                        <div class="works__side-item-title">
                           <?= get_the_title($item['links'][0]['id']) ?>
                        </div>
                        <div class="works__side-item-date">
                            <?= get_the_date( 'j.n.Y' ,$item['links'][0]['id']); ?>
                        </div>
                        <div class="works__side-item-desc">
                           <?= carbon_get_post_meta($item['links'][0]['id'], 'anons'); ?>
                        </div>
                        <a href="<?= get_the_permalink($item['links'][0]['id']); ?>" class="works__side-item-link">
                            <span>
                                Подробнее
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8"
                                fill="none">
                                <path
                                    d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z"
                                    fill="#009A9F"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="works__main-flow-wrap">
            <div class="works__main-flow">
                <?php foreach($arResult['list'] as $item): ?>
                <div class="works__main-item">
                    <div class="works__main-item-photo">
                        <?php 
                              $alt = get_post_meta(get_post_thumbnail_id($item['image_titul']), '_wp_attachment_image_alt', TRUE); 
                             $blur = wp_get_attachment_image_url($item['image_titul'], 'blur');
                             $hero = wp_get_attachment_image_url($item['image_titul'], 'hero');
                        ?>
                        <img src="<?= $blur; ?>" data-src="<?= $hero ?>" alt="<?= $alt ?>" class="works__main-item-photo-img lazyload">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <a href="<?= $arResult['link'] ?>" class="works__link">
        <span>
            Смотреть все объекты
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
            <path
                d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z"
                fill="#009A9F"></path>
        </svg>
    </a>
</section>