<?php
//Template Name: Главная страница
get_header();

$arParams = carbon_get_the_post_meta( 'front_page' );
?>

<main class="main">
    
    <?php
       foreach($arParams as $arItem):

           get_template_part('template-parts/'.$arItem['_type'], NULL, $arItem);

       endforeach;
    ?>
     
</main>





<?php

get_footer();

?>