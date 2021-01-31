<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'phone_list' => $args['phone_list'],
    'hours' => $args['hours'],
    'address' => $args['address'],
    'coord' => [
        'x' => $args['x'],
        'y' => $args['y']
    ],
    'map__info' => $args['map__info']
];

?>












<section class="section section-contact-map contact-map">
    <div class="container">
        <div class="section__inner contact-map__inner">
            <div class="contact-map__side">
                <<?= $arResult['title']['state']; ?> class="contact-map__title">
                    <?= $arResult['title']['text']; ?>
                </<?= $arResult['title']['state']; ?>>
                <div class="contact-map__group">
                    <div class="contact-map__name">
                        Телефон:
                    </div>
                    <div class="contact-map__phone-list">
                        <?php
                      
                        
                        foreach($arResult['phone_list'] as $item): ?>

                        <a href="tel:<?= preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone'] ); ?>" class="contact-map__phone">
                            <?= $item['phone'] ?>
                        </a>

                        <?php endforeach; ?>
                       
                    </div>
                    <button class="contact-map__callback" data-href="#callback">Заказать звонок</button>
                </div>
                <?php if($arResult['hours']): ?>
                <div class="contact-map__group">
                    <div class="contact-map__name">
                        Режим работы:
                    </div>
                    <div class="contact-map__text">
                        <?= $arResult['hours'] ?>
                    </div>
                </div>
                    <?php endif; ?>
                    <?php if($arResult['address']): ?>
                <div class="contact-map__group">
                    <div class="contact-map__name">
                        Адрес:
                    </div>
                    <div class="contact-map__text">
                        <?= $arResult['address'] ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="map" id="map"></div>

    <script>
    setTimeout(function() {
        var elem = document.createElement('script');
        elem.type = 'text/javascript';
        elem.src =
            'https://api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&onload=getYaMap';
        document.getElementsByTagName('body')[0].appendChild(elem);
    }, 3500);

   

    function getYaMap() {
        let x = +<?= $arResult['coord']['x']; ?>;
    let y = +<?= $arResult['coord']['y']; ?>;

        ymaps.ready(init);
        var myMap,
            myPlacemark;
        var html = '<div class="map-popup"><?= $arResult['map__info'] ?></div>';

        function init() {
            var shir = x;
            var dolg = y;



            if ($(window).innerWidth() < 1241 && $(window).innerWidth() > 576) {
                myMap = new ymaps.Map("map", {
                    center: [shir , dolg - 0.01 ],
                    zoom: 15,
                    controls: ['zoomControl', 'geolocationControl']
                });
            } else {
                myMap = new ymaps.Map("map", {
                    center: [shir, dolg],
                    zoom: 15,
                    controls: ['zoomControl', 'geolocationControl']
                });
            }


            myPlacemark = new ymaps.Placemark([shir, dolg], {
                balloonContent: html
            }, {
                iconLayout: 'default#image',
                iconImageHref: '<?= _assets(); ?>/img/pin.svg',
                iconImageSize: [60, 68],
                iconImageOffset: [-30, -68],
                hideIconOnBalloonOpen: true
            });
            myMap.geoObjects.add(myPlacemark);
            myMap.options.set({
                balloonPanelMaxMapArea: '0'
            });
            myMap.behaviors.disable('scrollZoom');
            if ($(window).innerWidth() < 1024) {
                myMap.behaviors.disable('drag');

                myMap.behaviors.center([1, 1]);
            };
        }
    }
    </script>
</section>