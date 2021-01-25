<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] ),
    'link'  => $args['link'],
    'image' => [
        'blur' => wp_get_attachment_image_url($args['image'], 'blur'),
        'image' => wp_get_attachment_image_url($args['image'], 'full'),
        'alt' => get_post_meta($args['image'], '_wp_attachment_image_alt', TRUE)
    ],
    'list' => $args['advantages']
];

?>

<div class="section section-about about">
    <div class="container">
        <div class="section__inner about__inner">
            <<?= $arResult['title']['state']; ?> class="h2 section__title about__title">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
            <div class="section__desc about__desc">
                <?php if($arResult['image']['blur']): ?>
                <div class="about__photo">
                    <img src="<?= $arResult['image']['blur'] ?>" data-src="<?= $arResult['image']['image'] ?>" alt="<?= $arResult['image']['alt'] ?>" class="about__photo-img lazyload">
                </div>
                <?php endif; ?>
                <div class="format-text about__text">
                    <?= $arResult['caption']; ?>
                    <br>

                    <a href="<?= $arResult['link'] ?>" class="about__text-link">
                        <span> Подробнее</span> <svg xmlns="http://www.w3.org/2000/svg" width="13"
                            height="8" viewBox="0 0 13 8" fill="none">
                            <path
                                d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z"
                                fill="#009A9F"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <?php if($arResult['list']): ?>
            <ul class="about__flow">
                <?php foreach($arResult['list'] as $item): ?>
                <li class="about__item">
                    <div class="about__item-icon">
                        <img src="<?= wp_get_attachment_image_url($item['image'], 'full'); ?>" alt="<?= get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE); ?>" class="about__item-icon-img">
                    </div>
                    <div class="about__item-info">
                        <div class="about__item-name">
                            <?= $item['title']; ?>
                        </div>
                        <div class="about__item-desc">
                            <?= $item['text']; ?>
                        </div>
                    </div>
                </li> 
                <?php endforeach; ?>             
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
