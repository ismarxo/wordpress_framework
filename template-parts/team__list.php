
<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'content' => apply_filters( 'the_content', $args['content'] ),
    'list' => $args['list']
];

?>





<section class="team">
    <header class="team__header">
        <div class="team__header-container">
            <<?= $arResult['title']['state']; ?> class="title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
            <div class="format-text">
                <?= $arResult['content']; ?>
            </div>
        </div>
    </header>
    <div class="container">
        <ul class="team__list">
            <?php foreach($arResult['list'] as $item): ?>
            <li class="team__item">
                <figure class="team__item-img">
                    <img src="#" srcset="<?= wp_get_attachment_image_url($item['image'], 'news'); ?>" alt="<?= get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE); ?>" class="fit-image" />
                </figure>
                <div class="team__item-body">
                    <div class="team__item-name"><?= $item['name']; ?></div>
                    <div class="team__item-position"><?= $item['position']; ?></div>
                    <div class="team__item-text">
                        <?= $item['text']; ?>
                    </div>
                </div>
            </li> 
            <?php endforeach; ?>
        </ul>
    </div>
</section>