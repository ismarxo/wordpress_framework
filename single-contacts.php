<?php

//Template Name: Контакты

get_header();


$arResult = [
    'title' => [
        'state' => carbon_get_the_post_meta( 'title_state'), 
        'text'  => carbon_get_the_post_meta( 'title'),
    ],
    'contact__info' =>  apply_filters('the_content', carbon_get_the_post_meta( 'contact__info')),
    'social_list' =>  carbon_get_the_post_meta( 'social_list'),
    'coord' => [
        'x' => carbon_get_the_post_meta( 'x'),
        'y' => carbon_get_the_post_meta( 'y'),
    ],
    'textmap' => carbon_get_the_post_meta( 'contact__map'),
]




?>



<main class="main">
    <section class="contacts">
        <div class="container position-relative">
            <div class="contacts__box">
                <<?= $arResult['title']['state']; ?> class="title"><?php if($arResult['title']['text']): echo $arResult['title']['text']; else: the_title();  endif;  ?></<?= $arResult['title']['state']; ?>>
                <div class="contacts__block format-text">
                   <?= $arResult['contact__info']; ?>
                </div>
                <?php if($arResult['social_list']): ?>
                <div class="socials">
                    <ul class="socials__list">
                        <?php foreach($arResult['social_list'] as $item): ?>
                        <li class="socials__item">
                            <a href="<?= $item['link']; ?>" target="_blank" class="socials__link">
                                <img src="<?= wp_get_attachment_image_url($item['image']); ?>" alt="alt" width="20" height="20">
                            </a>
                        </li>
                       <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="map" data-center="<?= $arResult['coord']['x']; ?>,<?= $arResult['coord']['y']; ?>" data-zoom="15" class="contacts__map"></div>
    </section>
</main>

<script>


var a = document.getElementById("map"),
        s = null;
    a && (s = new IntersectionObserver((function (t) {
        t.forEach((function (t) {
            var e;
            t.isIntersecting && ((e = document.createElement("script")).type = "text/javascript", e.src = "https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=mapInit", document.getElementsByTagName("head")[0].appendChild(e), s.unobserve(t.target))
        }))
    }), {})).observe(a), window.mapInit = function () {
        var t = a.getAttribute("data-zoom") || 16,
            e = a.getAttribute("data-center").split(","),
            r = new ymaps.Map("map", {
                zoom: t,
                center: e,
                controls: ["fullscreenControl", "typeSelector", "rulerControl"]
            });
        r.controls.add("zoomControl", {
            position: {
                bottom: "100px",
                right: "10px"
            }
        });
        var n = new ymaps.Placemark(e, {
            hintContent: "<?= $arResult['textmap']; ?>"
        }, {
            preset: "islands#redDotIcon"
        });
        r.behaviors.disable("scrollZoom"), r.geoObjects.add(n), n.hint.open()
    };

</script>





<?php get_footer(); ?>