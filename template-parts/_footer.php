<?php

$arResult = [
    'copyright' => carbon_get_theme_option( 'copyright' ),
];

?>

<footer class="footer">
    <div class="footer__copyright">        
        <?= $arResult['copyright']; ?>
    </div>
    <a href="https://mtsite.ru" rel="nofollow noreferrer noopener" target="_blank" class="footer__designed">
        <img src="<?= _assets(); ?>/img/components/footer/logo_multisite.svg" width="172" height="53"
            alt="Логотип веб-студии 'Мультисайт'" class="footer__designed-logo" />
        Сделано в веб-студии &quot;Мультисайт&quot;
        <br />Разработка и продвижение сайтов
    </a>
</footer>


<button class="top-btn js-top-btn">
    <svg width="30" height="30">
        <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#top-btn" />
    </svg>
</button>

