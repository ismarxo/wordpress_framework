<?php 

$arResult = [
    'logo' => [
        'link' => wp_get_attachment_image_url(carbon_get_theme_option( 'header_logo' ), 'full'),
        'alt' => get_post_meta(carbon_get_theme_option( 'header_logo' ), '_wp_attachment_image_alt', TRUE),
    ],
    'phones' => carbon_get_theme_option( 'header_phones' ),
    'hours' =>  carbon_get_theme_option( 'header_hours' ),
    'button' =>  carbon_get_theme_option( 'header_button' ),
];

?>


<header class="header">
    <div class="container">
        <div class="header__inner">
            <<?php if(!is_front_page()): echo 'a href="/"'; else: echo 'span'; endif; ?> class="header__logo">
                <img src="<?= $arResult['logo']['link'] ?>" alt="<?= $arResult['logo']['alt'] ?>" class="header__logo-img">
            </<?php if(!is_front_page()): echo 'a'; else: echo 'span'; endif; ?>>
            <nav class="header__menu">
                <?php wp_nav_menu( array(
                    'theme_location'  => 'header_menu',
                    'container'       => false,
                    'menu_class'      => 'header__menu-list',
                    'depth'           => 5,
                    'walker'          => new walker_bem_head_menu_top('header__menu'),
                ) ); ?>
            </nav>
            <div class="header__contacts">
                <?php foreach ($arResult['phones'] as $item): ?> 
                <a href="tel:<?= preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone'] ); ?>" class="header__phone"><?= $item['phone'] ?></a>
                <?php endforeach; ?>
                <div class="header__hours"><?= $arResult['hours'] ?></div>
            </div>
            <div class="header__buttons">
                <button class="header__request" data-href="#callback">
                    <?= $arResult['button'] ?>
                </button>
                <button class="header__burger">
                    <span class="header__burger-line"></span>
                    <span class="header__burger-line"></span>
                </button>
            </div>
        </div>
    </div>
</header>


