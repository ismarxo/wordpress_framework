<?php
//Template Name: Продукция

get_header();

$category     = get_queried_object();
$category_id  = $category->term_id;

$arResult = [
    'title' => [
        'state' => carbon_get_term_meta( $category_id, 'title_state'), 
        'text'  => carbon_get_term_meta( $category_id, 'title'),
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
                <?php if($arResult['title']['text'] == ''): the_title(); else: echo $arResult['title']['text']; endif; ?>
            </<?= $arResult['title']['state'] ?>>
            <?php if(!is_paged()) : ?>
            <div class="format-text">
                <?=  $arResult['desc'] ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $stati_children = new WP_Query(array(
                'post_type' => 'page',
                'post_parent' => get_the_ID(),
                'posts_per_page' => 6,
                'paged' => $paged,
                )
            );
        ?>
 <?php if($stati_children->have_posts()): ?>
    <div class="section section-news">
    <div class="container">
        
    <div class="news-grid">
    <?php while($stati_children->have_posts()): $stati_children->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="new">
                <span class="new__photo">
                    <?php                    
                        $blur = get_the_post_thumbnail_url(get_the_ID(), 'blur');
                        $full = get_the_post_thumbnail_url(get_the_ID(), 'news');
                         $id_thumb = get_post_thumbnail_id();
                		$alt = get_post_meta($id_thumb, '_wp_attachment_image_alt', true);
                    ?>
                    <img class="lazyload" src="<?= $blur; ?>" data-src="<?= $full; ?>" alt="<?= $alt; ?>">      
                </span>
                <div class="new__info">                    
                    <span class="new__title">
                        <?php the_title(); ?>
                    </span>
                    <?php if( carbon_get_post_meta( get_the_ID(), 'date') ): ?>
                    <date class="new__date"><?= get_the_date('d.m.Y'); ?></date>
                    <?php endif; ?>
                    <span class="new__text format-text">
                        <?= carbon_get_post_meta( get_the_ID(), 'anons'); ?>
                    </span>
                        <div class="new__link">
                            <span>Подробнее</span>
                        </div>
                </div>
            </a>
            <?php endwhile; ?>
            <?php else: ?>   
                <div class="container">
           <div class="format-text">            

               
               <div class="h2">
                   К сожалению, данная страница находится в стадии заполнения.
               </div>  
               </div>       
           </div>
      
   <?php endif;    ?>

  


    </div><?php wp_pagenavi(array('query'=> $stati_children ));  wp_reset_query(); ?></div>
    
</div>

    <?php if(!is_paged()) : ?>
    <section class="section section-content-caetgory ">
        <div class="container format-text">
            <?=  $arResult['content'] ?>
        </div>
    </section>
    <?php endif; ?>
</main>


<?php

get_footer();

?>