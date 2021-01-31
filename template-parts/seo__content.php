<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'caption' => apply_filters( 'the_content', $args['content'] )
];

?>

<section class="section section-seo seo">
    <div class="container">
        <div class="section__inner seo__inner">
            <?php if($arResult['title']['text']){ ?>
            <<?= $arResult['title']['state']; ?> class="section__title seo__title">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
            <?php } ?>
            <div class="section__desc format-text seo__desc">
                <?= $arResult['caption']; ?>
            </div>
        </div>
    </div>
</section>


