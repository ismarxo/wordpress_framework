<?php

get_header();
$category     = get_queried_object();
$category_id  = $category->term_id;
$title_status         = carbon_get_term_meta( $category_id, 'title_term_status' );
$title         = carbon_get_term_meta( $category_id, 'title_term' );
$subtitle         = carbon_get_term_meta( $category_id, 'subtitle' );
$image         = wp_get_attachment_image_url(carbon_get_term_meta( $category_id, 'image' ), 'full');
$alt =  get_post_meta(carbon_get_term_meta( $category_id, 'image' ), '_wp_attachment_image_alt', TRUE);

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
            <<?= $title_status ?> class="h1 section__title">
                <?php if($title == ''): single_cat_title(); else: echo $title; endif; ?>
            </<?= $title_status ?>>
        </div>
    </section>

    <section class="section section-category category">
        <div class="container">
            <div class="category__inner">
                <button class="category__popup" data-href="#category__popup">
                    Смотреть все категории
                </button>
            <aside class="category__sidebar" id="category__popup" >
                <?php 
                $termID = 3; 
                $taxonomyName = "category";
                $termchildren = get_term_children( $termID, $taxonomyName ); ?>




                <ul class="category__sidebar-list">
                    <?php           
                    foreach ($termchildren as $child):
                        $term = get_term_by( 'id', $child, $taxonomyName ); ?>
                    <li class="category__sidebar-item">
                        <?php if($category_id != $term->term_id): ?>
                        <a href="<?= get_term_link( $term->term_id, $term->taxonomy ); ?>"
                            class="category__sidebar-link">
                            <?= $term->name ?>
                        </a>
                        <?php else: ?>
                        <span class="category__sidebar-link category__sidebar-link--active">
                            <?= $term->name ?>
                        </span>
                        <?php endif; ?>
                    </li>
                    <?php endforeach;  ?>
                </ul>
            </aside>
            <div class="category__main">
                <?php if(category_description() != ''): ?>
                <div class="category__desc format-text">
                    <?php
                        echo category_description();
                    ?>  
                </div>
                <?php endif; ?>
                <div class="category__flow">
                    <?php  if( have_posts()): ?>

                    <?php while( have_posts() ): the_post();   ?>
                    <a href="<?php the_permalink(); ?>" class="category__item">
                        <div class="category__item-image-wrap">
                        <?php                    
                            $blur = get_the_post_thumbnail_url( get_the_ID(), 'blur');
                            $full = get_the_post_thumbnail_url( get_the_ID(), 'news');
                        ?>
                            <img src="<?= $blur ?>" data-src="<?= $full ?>" alt="<?php the_title(); ?>" class="category__item-image lazyload">
                        </div>
                        <div class="category__item-name">
                            <?php the_title(); ?>
                        </div>
                        <div class="category__item-info">
                            <div class="category__item-price">
                                <?php if(carbon_get_the_post_meta('old_price')): ?>
                                <div class="category__item-price-old">
                                    <?= carbon_get_the_post_meta('old_price'); ?>
                                </div>
                                <?php endif; ?>
                                <?php if(carbon_get_the_post_meta('price')): ?>
                                <div class="category__item-price-new">
                                    <?= carbon_get_the_post_meta('price'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="category__item-link">
                                Подробнее
                            </div>                               
                        </div>
                    </a>
                    <?php endwhile; else: ?>

                    <div class="format-text">                        
                        К сожалению, раздел находится в стадии заполнения
                    </div>


                    <?php endif; ?>

                </div>
                <?php wp_pagenavi(); ?>
            </div>
            </div>
        </div>
    </section>
    <?php if(!is_paged()) : ?>
    <section class="section section-content-caetgory ">
                    <div class="container format-text">
                        <?php echo apply_filters('the_content', carbon_get_term_meta( $category_id, 'content' )); ?>
                    </div>
    </section>
    <?php endif; ?>

    
</main>

<?php

get_footer();

?>