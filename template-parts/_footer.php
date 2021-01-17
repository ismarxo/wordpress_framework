<?php

$arResult = [
    'logo' => [
        'link' => wp_get_attachment_image_url(carbon_get_theme_option('footer_logo'), 'full'),
        'alt' => get_post_meta(carbon_get_theme_option('footer_logo'), '_wp_attachment_image_alt', true),
    ],
    'social' => carbon_get_theme_option('footer_social'),
    'mess' => carbon_get_theme_option('footer_mess'),
    'phones' => carbon_get_theme_option('footer_phones'),
    'hours' =>  carbon_get_theme_option('footer_hours'),
    'mail' =>  carbon_get_theme_option('footer_mail'),
    'copyright_title' => carbon_get_theme_option('copyright_title'),
    'copyright' => carbon_get_theme_option('copyright'),
];

?>

<footer class="footer">
    <div class="container">
        <div class="footer__inner-top">            
            <<?php if (!is_front_page()): echo 'a href="/"'; else: echo 'span'; endif; ?> class="footer__logo">
                <img src="" alt="" class="footer__logo-img">
            </<?php if (!is_front_page()): echo 'a'; else: echo 'span'; endif; ?>>
            <div class="footer__links">
                <?php if ($arResult['social']): ?>
                <div class="footer__social">
                    <div class="footer__social-title">
                        Мы в соцсетях:
                    </div>
                    <ul class="footer__social-list">                    
                    <?php foreach ($arResult['social'] as $item): ?>
                        <li class="footer__social-item">
                            <a href="<?= $item['link'] ?>" class="footer__social-link">
                                <img src="<?= wp_get_attachment_image_url(carbon_get_theme_option($item['image']), 'full') ?>" alt="<?= get_post_meta(carbon_get_theme_option($item['image']), '_wp_attachment_image_alt', true) ?>" class="footer__social-img">
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if ($arResult['mess']): ?>
                <div class="footer__mess">
                    <div class="footer__mess-title">
                        Пишите нам:
                    </div>
                    <ul class="footer__mess-list">                    
                    <?php foreach ($arResult['mess'] as $item): ?>
                        <li class="footer__mess-item">
                            <a href="<?= $item['link'] ?>" class="footer__mess-link">
                                <img src="<?= wp_get_attachment_image_url(carbon_get_theme_option($item['image']), 'full') ?>" alt="<?= get_post_meta(carbon_get_theme_option($item['image']), '_wp_attachment_image_alt', true) ?>" class="footer__social-img">
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="footer__menu"> 
                <?php wp_nav_menu(array(
                    'theme_location'  => 'footer_menu',
                    'container'       => false,
                    'menu_class'      => 'footer__menu-list',
                    'depth'           => 1,
                    'walker'          => new walker_bem_footer_menu('footer_menu'),
                )); ?>
            </div>
            <div class="footer__contacts">
            <?php if ($arResult['phones']): ?> 
                <div class="footer__phones">
                    <?php foreach ($arResult['phones'] as $item): ?> 
                    <a href="tel:<?= preg_replace(array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone']); ?>" class="footer__phone"><?= $item['phone'] ?></a>
                    <?php endforeach; ?>
                </div>          
                <?php endif; ?>      
                <?php if ($arResult['hours']): ?>           
                    <div class="header__hours"><?= $arResult['hours'] ?></div>
                    <?php endif; ?>
                    <?php if ($arResult['mail']): ?>    
                    <a href="mailto:<?= $arResult['mail'] ?>" class="header__hours"><?= $arResult['mail'] ?></a>
                        <?php endif; ?>
                </div>
           
           
        </div>
        <div class="footer__inner-bottom">
<div class="footer__copyright">    
    <div class="footer__copyright-title">
    <?= $arResult['copyright_title']; ?>
    </div>    
        <?= $arResult['copyright']; ?>
    </div>
    <a href="https://mtsite.ru" rel="nofollow noreferrer noopener" target="_blank" class="footer__designed">
        <img src="<?= _assets(); ?>/img/components/footer/logo_multisite.svg" width="172" height="53"
            alt="Логотип веб-студии 'Мультисайт'" class="footer__designed-logo" />
        Сделано в веб-студии &quot;Мультисайт&quot;
        <br />Разработка и продвижение сайтов
    </a>
        </div>
        
    </div>



    
</footer>


<button class="top-btn js-top-btn">
    <svg width="30" height="30">
        <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#top-btn" />
    </svg>
</button>

