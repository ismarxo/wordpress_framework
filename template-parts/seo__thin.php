<?php

$arResult = [
    'caption' => apply_filters( 'the_content', $args['content'] )
];

?>


<article class="about-short">
       <div class="format-text clearfix">
            <?= $arResult['caption']; ?>
       </div>
</article>