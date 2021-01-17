<?php

get_header();

$subtitle         = carbon_get_term_meta( 3, 'subtitle' );
$image         = wp_get_attachment_image_url(carbon_get_term_meta( 3, 'image' ), 'full');
$alt =  get_post_meta(carbon_get_term_meta( 3, 'image' ), '_wp_attachment_image_alt', TRUE);

 

?>

<main class="main">
    <section class="blog">
        <header class="hero-header">
            <div class="hero-header__author"><?= $subtitle; ?></div>
            <h1 class="title"><?php single_cat_title(); ?></h1>
            <div class="hero-header__info format-text">
                <?php
                    echo category_description();
                ?>
            </div>
            <figure role="presentation" class="hero-header__bg">
                <picture>
                    <!-- <source srcset="img/components/blog/hero/bg-992.jpg" media="(min-width: 992px)" />
                    <source srcset="img/components/blog/hero/bg-768.jpg" media="(min-width: 768px)" /> -->
                    <img src="#" srcset="<?= $image; ?>" alt class="fit-image" />
                </picture>
            </figure>
            <button data-next-target="#content" class="hero-header__next-btn js-next">
                <svg width="38" height="18">
                    <use xlink:href="<?= _assets(); ?>/img/sprite-icons.svg#arrow-down2" />
                </svg>
            </button>
        </header>
        <div id="content" class="container">
            <ul class="blog__list">

            <?php 

            $months = array( 1 => 'ЯНВАРЯ' , 'ФЕВРАЛЯ' , 'МАРТА' , 'АПРЕЛЯ' , 'МАЯ' , 'ИЮНЯ' , 'ИЮЛЯ' , 'АВГУСТА' , 'СЕНТЯБРЯ' , 'ОКТЯБРЯ' , 'НОЯБРЯ' , 'ДЕКАБРЯ' );
                

            $args = array(
                'posts_per_page' => -1,                    
                'category__in' => 3,               
            );     

            $query = new WP_Query( $args ); 

            while( $query->have_posts() ): $query->the_post();   


            $id_thumb = get_post_thumbnail_id();
            $image_alt = get_post_meta($id_thumb, '_wp_attachment_image_alt', true);
            ?>                                                                              


                <li class="blog__item">
                    <a href="<?php the_permalink(); ?>" class="blog__item-link">
                    <div class="blog__item-wrap">
                        <time class="blog__item-date"><?php if( ! carbon_get_the_post_meta( 'date') ) { echo get_the_date('d').' '.$months[ get_the_date('n')].' '.get_the_date('Y'); } ?> </time>
                        <div class="blog__item-title"> <?php the_title(); ?></div>
                        <div class="blog__item-text">
                            <?= carbon_get_the_post_meta( 'anons'); ?>
                        </div>
                    </div>
                    </a>
                </li>

            <?php endwhile; wp_reset_postdata(  ); ?>
                
            </ul>
        </div>
    </section>
    
    <?php

    $arResult = [
        'title' => [
            'state' => carbon_get_term_meta( 3, 'title_state'), 
            'text'  => carbon_get_term_meta( 3, 'title'),
        ],
        'content' => apply_filters( 'the_content', carbon_get_term_meta( 3, 'content') ),
    ];

    ?>

    <section class="subscribe  subscribe--light">
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
    <p class="blog-thanks">Спасибо за внимание!</p>
</main>

<?php

get_footer();

?>

