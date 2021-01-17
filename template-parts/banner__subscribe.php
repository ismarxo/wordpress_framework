<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'content' => apply_filters( 'the_content', $args['content'] ),
];

?>

<section class="subscribe">
    <div class="container">
        <header class="subscribe__header">
        <<?= $arResult['title']['state']; ?> class="title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
        <div class="format-text">
            <?= $arResult['content']; ?>
        </div>
        </header>

        <?= do_shortcode('[contact-form-7 id="75" title="Подписаться" html_class="form subscribe__form"]'); ?>
        <p class="subscribe__terms">
            Нажимая на кнопку, я даю свое согласие на обработку персональных данных
            и принимаю
            <a href="<?= get_page_link(3); ?>">условия соглашения</a>
        </p>
    </div>
</section>