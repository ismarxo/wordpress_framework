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



<section class="section section__breadcrumbs">
            <div class="container">Section</div>
        </section>
        <section class="section section__card">
            <div class="container">Section</div>
        </section>
        <section class="section section__category">
            <div class="container">Section</div>
        </section>
        <section class="section section__services">
            <div class="container">Section</div>
        </section>
        <section class="section section__about">
            <div class="container">Section</div>
        </section>
        <section class="section section__works">
            <div class="container">Section</div>
        </section>
        <section class="section section__brands">
            <div class="container">Section</div>
        </section>
        <section class="section section__content">
            <div class="container">Section</div>
        </section>
        <section class="section section__map">
            <div class="container">Section</div>
        </section>

<?php

get_footer();

?>