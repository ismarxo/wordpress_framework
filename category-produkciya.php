<?php
//Template Name: Оборудование

get_header();

$category     = get_queried_object();
$category_id  = $category->term_id;


$arResult = [
    'title' => [
        'state' => carbon_get_term_meta( $category_id, 'title_term_status'), 
        'text'  => carbon_get_term_meta( $category_id, 'title_term'),
    ],
    'desc' => category_description(),
    'content' => apply_filters( 'the_content', carbon_get_term_meta( $category_id, 'content') ),
];
?>


<main class="main">
    <div class="breadcrumbs">
        <div class="container">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<div class="breadcrumbs__list">','</div>' );
                }
            ?>
        </div>
    </div>
    <section class="section section-title">
        <div class="container">        
            <<?= $arResult['title']['state'] ?> class="h1 section__title">
                <?php if($arResult['title']['text'] == ''): single_cat_title(); else: echo $arResult['title']['text']; endif; ?>
            </<?= $arResult['title']['state'] ?>>
            <?php if(!is_paged()) : ?>
            <div class="format-text">
                <?php
                    echo category_description();
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    




</main>
<?php

get_footer();

?>


