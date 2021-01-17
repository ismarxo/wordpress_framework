<?php

$arResult = [
    'title' => [
        'state' => $args['title_state'], 
        'text'  => $args['title'],
    ],
    'content' => apply_filters( 'the_content', $args['content'] ),
    'list' => $args['links']
];

?>


<section class="blog blog--short">
    <div id="content" class="container">
        <header class="blog__header">
            <<?= $arResult['title']['state']; ?> class="title"> <?= $arResult['title']['text']; ?> </<?= $arResult['title']['state']; ?>>
            <div class="format-text">
                <?= $arResult['content']; ?> 
            </div>
        </header>
        <ul class="blog__list blog__list--short">

            <?php 

                $months = array( 1 => 'ЯНВАРЯ' , 'ФЕВРАЛЯ' , 'МАРТА' , 'АПРЕЛЯ' , 'МАЯ' , 'ИЮНЯ' , 'ИЮЛЯ' , 'АВГУСТА' , 'СЕНТЯБРЯ' , 'ОКТЯБРЯ' , 'НОЯБРЯ' , 'ДЕКАБРЯ' );
                $list = array();

                if($arResult['list']) {
                    foreach($arResult['list'] as $item) {
                        array_push($list, $item['id']);
                    }
                }                
                
                $args = array(
                    'posts_per_page' => 3,                    
                    'category__in' => 3,
                    'post__in' => $list
                );     

                $query = new WP_Query( $args ); 
                
                while( $query->have_posts() ): $query->the_post();   
                
                
                $id_thumb = get_post_thumbnail_id();
                $image_alt = get_post_meta($id_thumb, '_wp_attachment_image_alt', true);
            ?>

            <li class="blog__item">
                <a href="<?php the_permalink(); ?>" class="blog__item-link">
                    <div class="blog__item-wrap">
                        <figure class="blog__item-image">
                            <img src="#" srcset="<?= get_the_post_thumbnail_url(get_the_ID(), 'news'); ?>" alt="<?= $image_alt; ?>"  class="fit-image">
                        </figure>
                        <time class="blog__item-date"><?php if( ! carbon_get_the_post_meta( 'date') ) { echo get_the_date('d').' '.$months[ get_the_date('n')].' '.get_the_date('Y'); } ?> </time>
                        <div class="blog__item-title"> <?php the_title(); ?></div>
                        <div class="blog__item-text">
                            <?= carbon_get_the_post_meta( 'anons'); ?>
                        </div>
                    </div>
                    
                    <div class="blog__item-more">
                        Читать
                    </div>
                </a>
            </li>

            <?php endwhile; wp_reset_postdata(  ); ?>
            
        </ul>
        <div class="blog__actions">
            <a href="<?= get_category_link( 3 ); ?>" class="btn btn--outline">
                <span>Читать все статьи</span>
            </a>
        </div>
    </div>
</section>