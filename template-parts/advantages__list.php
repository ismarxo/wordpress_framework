<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'advantages_list' => $args['advantages']
];

?>

<section class="advantages">
    <div class="container">
        <header class="advantages__header">
            <<?= $arResult['title']['state']; ?> class="title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
        </header>
        <ul class="advantages__list">
            <?php foreach($arResult['advantages_list'] as $item): ?>

                <li class="advantages__item">
                    <figure class="advantages__item-icon">
                        <img width="100" height="100" srcset="<?= wp_get_attachment_image_url($item['image'], 'full'); ?>" alt="<?= get_post_meta($item['image'], '_wp_attachment_image_alt', TRUE); ?>">
                    </figure>
                    <div class="advantages__item-title"><?= $item['title']; ?></div>
                    <div>
                        <?= $item['text']; ?>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</section>
