<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] ),
    'post_list' => $args['links']
];

?>



<section class="services" id="services">
<header class="services__header">
    <<?= $arResult['title']['state']; ?> class="title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
    <div class="format-text">
    <?= $arResult['caption']; ?>
    </div>
</header>
<ul class="services__list">
<?php foreach($arResult['post_list'] as $id): $id = $id['id']; ?>

    <li class="services__item">
        <a href="<?= get_permalink( $id ); ?>" class="service-link">
            <div class="service-link__title">
                <?php echo (carbon_get_post_meta($id, 'title_card') == '' ? get_the_title($id) : carbon_get_post_meta($id, 'title_card'));  ?>
            </div>
            <div class="service-link__price"><?= carbon_get_post_meta($id, 'price'); ?></div>
            <div class="service-link__info"><?= carbon_get_post_meta($id, 'anons'); ?></div>
            <div class="btn btn--light">
            <span><?= carbon_get_post_meta($id, 'button_card'); ?></span>
            </div>
            <img  src="#" srcset="<?= get_the_post_thumbnail_url( $id, 'product'); ?>" alt class="fit-image service-link__bg lazyload" />
        </a>
    </li>

    <?php endforeach; ?> 
</ul>
</section>
