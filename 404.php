<?php

get_header();

?>

<main class="main">
    <div class="e404">
        <div class="e404__box">
            <h2 class="title">Ошибка 404</h2>
            <p>Кто-то потерялся: или вы, или мы</p>
            <a href="/" class="btn btn--light btn--big">
                <span>Вернуться на главную</span>
            </a>
        </div>
        <figure role="presentation" class="e404__bg">
            <picture>
                <source srcset="<?= _assets(); ?>/img/components/free-consultation/bg-992.jpg" media="(min-width: 992px)" />
                <source srcset="<?= _assets(); ?>/img/components/free-consultation/bg-768.jpg" media="(min-width: 768px)" />
                <img src="#" srcset="<?= _assets(); ?>/img/components/free-consultation/bg.jpg" alt class="fit-image" />
            </picture>
        </figure>
    </div>
</main>


<?php

get_footer();

?>