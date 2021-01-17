<?php 

//Template Name: Карточка запчасти/лифта

get_header();


$arResult = [
    'title' => [
        'state' => carbon_get_the_post_meta( 'title_state'), 
        'text'  => carbon_get_the_post_meta( 'title'),
    ],
    'gallery' => carbon_get_the_post_meta( 'gallery'),
    'specifications' => carbon_get_the_post_meta( 'specifications'),
    'content' =>  apply_filters('the_content', carbon_get_the_post_meta( 'content')),
    'colors' => carbon_get_the_post_meta( 'colors'),
    'floor' => carbon_get_the_post_meta( 'floor'),
    'model' => carbon_get_the_post_meta( 'model'),
    'price' => carbon_get_the_post_meta( 'price'),
    'old_price' => carbon_get_the_post_meta( 'old_price'),
    'katalog' => carbon_get_the_post_meta( 'katalog'),
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
            <h1 class="h1 section__title">
                <?php if($arResult['title']['text']): echo $arResult['title']['text']; else: the_title();  endif;  ?>
            </h1>
        </div>
    </section>

    <section class="section section-product product">
        <div class="container"> 
            <div class="product__inner">
                <?php if($arResult['gallery']): ?>
                <div class="product__gallery">
                    <div class="product__gallery-max-wrap">
                        <div class="product__gallery-max">
                            <?php $n = 0; foreach($arResult['gallery'] as $item): 
                            
                                $blur = wp_get_attachment_image_url( $item, 'blur');
                                $news = wp_get_attachment_image_url( $item, 'news');
                                $full = wp_get_attachment_image_url( $item, 'full');
                                $alt  = get_post_meta($item, '_wp_attachment_image_alt', TRUE);
                            ?>                       
                                <div class="product__gallery-max-item">
                                    <a href="<?= $full; ?>">
                                        <img class="lazyload" src="<?= $blur; ?>" data-src="<?= $news; ?>" alt="<?= $alt; ?>">
                                    </a>
                                </div> 
                            <?php $n++; endforeach; ?>                   
                        </div>                
                    </div>
                    <?php if($n > 1): ?>
                    <div class="product__gallery-min-subwrap">
                        <div class="product__gallery-min-wrap">
                            <div class="product__gallery-min">
                                <?php $n = 0; foreach($arResult['gallery'] as $item):                             
                                    $blur = wp_get_attachment_image_url( $item, 'blur');
                                    $news = wp_get_attachment_image_url( $item, 'news');
                                    $alt  = get_post_meta($item, '_wp_attachment_image_alt', TRUE);
                                ?> 
                                <div class="product__gallery-min-item">
                                    <img class="lazyload" src="<?= $blur; ?>" data-src="<?= $news; ?>" alt="<?= $alt; ?>">
                                </div> 
                                <?php endforeach; ?>                     
                            </div> 
                            <div class="product__gallery-buttons">
                                <svg class="product__gallery-buttons-prev" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12.5" cy="12.5" r="12.5" fill="#009A9F"/>
                                    <path d="M8.39788 13.225C7.86737 12.7906 7.86737 12.0863 8.39788 11.6518L13.681 7.3258C14.2115 6.8914 15.0716 6.8914 15.6021 7.3258C16.1326 7.7602 16.1326 8.46451 15.6021 8.89891L10.319 13.225C9.7885 13.6594 8.92838 13.6594 8.39788 13.225Z" fill="#FDFDFD"/>
                                    <path d="M15.6021 17.6742C16.1326 17.2398 16.1326 16.5355 15.6021 16.1011L10.319 11.775C9.7885 11.3406 8.92838 11.3406 8.39788 11.775C7.86737 12.2094 7.86737 12.9137 8.39788 13.3482L13.681 17.6742C14.2115 18.1086 15.0716 18.1086 15.6021 17.6742Z" fill="#FDFDFD"/>
                                </svg>
                                <svg class="product__gallery-buttons-next" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle r="12.5" transform="matrix(-1 0 0 1 12.5 12.5)" fill="#009A9F"/>
                                    <path d="M16.6021 13.225C17.1326 12.7906 17.1326 12.0863 16.6021 11.6518L11.319 7.3258C10.7885 6.8914 9.92839 6.8914 9.39788 7.3258C8.86737 7.7602 8.86737 8.46451 9.39788 8.89891L14.681 13.225C15.2115 13.6594 16.0716 13.6594 16.6021 13.225Z" fill="white"/>
                                    <path d="M9.39788 17.6742C8.86737 17.2398 8.86737 16.5355 9.39788 16.1011L14.681 11.775C15.2115 11.3406 16.0716 11.3406 16.6021 11.775C17.1326 12.2094 17.1326 12.9137 16.6021 13.3482L11.319 17.6742C10.7885 18.1086 9.92839 18.1086 9.39788 17.6742Z" fill="white"/>
                                </svg>
                            </div>     
                        </div>
                    </div> 
                    <?php endif; ?>               
                </div>
                <?php endif; ?>
                <div class="product__info">
                    <h1 class="h1 product__title">
                        <?php if($arResult['title']['text']): echo $arResult['title']['text']; else: the_title();  endif;  ?>            
                    </h1>
                    <div class="product__bottom">
                        <div class="product__actions">
                            <div class="product__price">
                                <?php if($arResult['old_price']): ?>
                                <div class="product__price-old">
                                    Старая цена: <del><?= $arResult['old_price']; ?></del>
                                </div>
                                <?php endif; ?>
                                <?php if($arResult['price']): ?>
                                <div class="product__price-new">
                                    Цена: <?= $arResult['price']; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <button data-href="#callback" class="product__request">
                                Оставить заявку
                            </button>
                            <?php if(!$arResult['katalog']): ?>
                            <button data-href="#callback_catalog" class="product__katalog">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.49999 0H13.1206L18.75 5.60752V18.75C18.75 19.4406 18.19 20 17.5 20H2.49999C1.80997 20 1.25 19.4406 1.25 18.75V1.24999C1.25 0.559387 1.81003 0 2.49999 0Z" fill="#E2574C"/>
                                    <path d="M18.7319 5.62495H14.375C13.685 5.62495 13.125 5.06498 13.125 4.37496V0.0124512L18.7319 5.62495Z" fill="#B53629"/>
                                    <path d="M14.0613 9.47695C14.2707 9.47695 14.3732 9.29445 14.3732 9.11758C14.3732 8.93444 14.2663 8.75757 14.0613 8.75757H12.8688C12.6357 8.75757 12.5057 8.95067 12.5057 9.16382V12.0944C12.5057 12.3557 12.6545 12.5007 12.8557 12.5007C13.0557 12.5007 13.2051 12.3557 13.2051 12.0944V11.2901H13.9264C14.1501 11.2901 14.262 11.1069 14.262 10.9251C14.262 10.747 14.1501 10.57 13.9264 10.57H13.2051V9.47695H14.0613ZM10.0307 8.75757H9.1582C8.92132 8.75757 8.75318 8.92008 8.75318 9.1613V12.0969C8.75318 12.3963 8.99504 12.4901 9.16816 12.4901H10.0838C11.1675 12.4901 11.8832 11.777 11.8832 10.6763C11.8826 9.51258 11.2089 8.75757 10.0307 8.75757ZM10.0726 11.7664H9.54072V9.48134H10.0201C10.7458 9.48134 11.0613 9.96824 11.0613 10.6401C11.0613 11.2689 10.7513 11.7664 10.0726 11.7664ZM6.87636 8.75757H6.01199C5.7676 8.75757 5.63135 8.91879 5.63135 9.16382V12.0944C5.63135 12.3557 5.78759 12.5007 5.99757 12.5007C6.20755 12.5007 6.36379 12.3557 6.36379 12.0944V11.2388H6.90565C7.57439 11.2388 8.12628 10.765 8.12628 10.0032C8.12634 9.25759 7.59386 8.75757 6.87636 8.75757ZM6.862 10.5514H6.36385V9.44571H6.862C7.1695 9.44571 7.36512 9.6857 7.36512 9.99883C7.36448 10.3114 7.1695 10.5514 6.862 10.5514Z" fill="white"/>
                                </svg>
                                Запросить каталог
                            </button>
                            <?php endif; ?>
                        </div>
                        <?php if($arResult['specifications']): ?>
                        <div class="product__specifications specifications">
                            <div class="specifications__title">Характеристики:</div>
                            <ul class="specifications__list">
                                <?php foreach($arResult['specifications'] as $item): ?>
                                    <li class="specifications__item">
                                        <div class="specifications__key"><?= $item['title'] ?></div>
                                        <div class="specifications__dotted">. . . . . . . . . . . . . . . . . . . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </div>
                                        <div class="specifications__value"><?= $item['desc'] ?></div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if($arResult['content'] != ''): ?>
    <div class="section section-product-desc product-desc">
        <div class="container"> 
            <div class="section__title product-desc__title">
                Описание:
            </div>
            <div class="section section__desc format-text">
                <?= $arResult['content'] ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php 

   $term = get_the_category();
   $term_id = $term[0]->term_id;


   $term_colors = carbon_get_term_meta( $term_id, 'colors' );

   if($arResult['colors']):
    $post_un_colors = $arResult['colors'];
    
    $n = 0; foreach($term_colors as $term_color): 
                foreach($post_un_colors as $post_un_color): 
                    if($term_color == $post_un_color):
                        unset($term_colors[$n]);                
                    endif;
                endforeach;
    $n++;  endforeach;
    endif;

   $term_floors = carbon_get_term_meta( $term_id, 'floor' );
   if($arResult['floor']):
        $post_un_floors = $arResult['floor'];
        
        $n = 0; foreach($term_floors as $term_floor): 
                    foreach($post_un_floors as $post_un_floor): 
                        if($term_floor == $post_un_floor):
                            unset($term_floors[$n]);                
                        endif;
                    endforeach;
        $n++;  endforeach;
   endif;

   $term_models = carbon_get_term_meta( $term_id, 'model' );
   if($arResult['model']):
        $post_un_models = $arResult['model'];
        
        $n = 0; foreach($term_models as $term_model): 
                    foreach($post_un_models as $post_un_model): 
                        if($term_model == $post_un_model):
                            unset($term_models[$n]);                
                        endif;
                    endforeach;
        $n++;  endforeach;
   endif;
   
   
   ?>

    <?php if($term_colors): ?>
    <div class="section section-product-subitems product-subitems">
        <div class="container"> 
            <div class="section__title product-subitems__title">
                Доступные цвета:
            </div>
            <div class="product-subitems__wrap">
                <ul class="product-subitems__list product-subitems__list-color">
                    <?php foreach($term_colors as $item): 
                        $blur = get_the_post_thumbnail_url( $item['id'], 'blur');
                        $full = get_the_post_thumbnail_url( $item['id'], 'news');

                        ?>
                        <li class="product-subitems__item">
                            <img class="lazyload" data-src="<?= $full; ?>" src="<?= $blur; ?>" alt="alt">
                            <span><?= get_the_title($item['id']); ?></span>
                        </li>    
                    <?php endforeach; ?>                     
                </ul>
                <div class="product-subitems__buttons">
                        <svg class="product-subitems__buttons-color-prev" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12.5" cy="12.5" r="12.5" fill="#009A9F"/>
                            <path d="M8.39788 13.225C7.86737 12.7906 7.86737 12.0863 8.39788 11.6518L13.681 7.3258C14.2115 6.8914 15.0716 6.8914 15.6021 7.3258C16.1326 7.7602 16.1326 8.46451 15.6021 8.89891L10.319 13.225C9.7885 13.6594 8.92838 13.6594 8.39788 13.225Z" fill="#FDFDFD"/>
                            <path d="M15.6021 17.6742C16.1326 17.2398 16.1326 16.5355 15.6021 16.1011L10.319 11.775C9.7885 11.3406 8.92838 11.3406 8.39788 11.775C7.86737 12.2094 7.86737 12.9137 8.39788 13.3482L13.681 17.6742C14.2115 18.1086 15.0716 18.1086 15.6021 17.6742Z" fill="#FDFDFD"/>
                        </svg>
                        <svg class="product-subitems__buttons-color-next" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle r="12.5" transform="matrix(-1 0 0 1 12.5 12.5)" fill="#009A9F"/>
                            <path d="M16.6021 13.225C17.1326 12.7906 17.1326 12.0863 16.6021 11.6518L11.319 7.3258C10.7885 6.8914 9.92839 6.8914 9.39788 7.3258C8.86737 7.7602 8.86737 8.46451 9.39788 8.89891L14.681 13.225C15.2115 13.6594 16.0716 13.6594 16.6021 13.225Z" fill="white"/>
                            <path d="M9.39788 17.6742C8.86737 17.2398 8.86737 16.5355 9.39788 16.1011L14.681 11.775C15.2115 11.3406 16.0716 11.3406 16.6021 11.775C17.1326 12.2094 17.1326 12.9137 16.6021 13.3482L11.319 17.6742C10.7885 18.1086 9.92839 18.1086 9.39788 17.6742Z" fill="white"/>
                        </svg>
                    </div>
                 
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($term_floors): ?>
    <div class="section section-product-subitems product-subitems">
        <div class="container"> 
            <div class="section__title product-subitems__title">
                Цвет пола:
            </div>
            <div class="product-subitems__wrap">
                <ul class="product-subitems__list product-subitems__list-floor">
                    <?php foreach($term_floors as $item): 
                        $blur = get_the_post_thumbnail_url( $item['id'], 'blur');
                        $full = get_the_post_thumbnail_url( $item['id'], 'news');

                        ?>
                        <li class="product-subitems__item">
                            <img class="lazyload" data-src="<?= $full; ?>" src="<?= $blur; ?>" alt="alt">
                            <span><?= get_the_title($item['id']); ?></span>
                        </li>
                    <?php endforeach; ?>                    
                </ul>
                <div class="product-subitems__buttons">
                        <svg class="product-subitems__buttons-floor-prev" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12.5" cy="12.5" r="12.5" fill="#009A9F"/>
                            <path d="M8.39788 13.225C7.86737 12.7906 7.86737 12.0863 8.39788 11.6518L13.681 7.3258C14.2115 6.8914 15.0716 6.8914 15.6021 7.3258C16.1326 7.7602 16.1326 8.46451 15.6021 8.89891L10.319 13.225C9.7885 13.6594 8.92838 13.6594 8.39788 13.225Z" fill="#FDFDFD"/>
                            <path d="M15.6021 17.6742C16.1326 17.2398 16.1326 16.5355 15.6021 16.1011L10.319 11.775C9.7885 11.3406 8.92838 11.3406 8.39788 11.775C7.86737 12.2094 7.86737 12.9137 8.39788 13.3482L13.681 17.6742C14.2115 18.1086 15.0716 18.1086 15.6021 17.6742Z" fill="#FDFDFD"/>
                        </svg>
                        <svg class="product-subitems__buttons-floor-next" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle r="12.5" transform="matrix(-1 0 0 1 12.5 12.5)" fill="#009A9F"/>
                            <path d="M16.6021 13.225C17.1326 12.7906 17.1326 12.0863 16.6021 11.6518L11.319 7.3258C10.7885 6.8914 9.92839 6.8914 9.39788 7.3258C8.86737 7.7602 8.86737 8.46451 9.39788 8.89891L14.681 13.225C15.2115 13.6594 16.0716 13.6594 16.6021 13.225Z" fill="white"/>
                            <path d="M9.39788 17.6742C8.86737 17.2398 8.86737 16.5355 9.39788 16.1011L14.681 11.775C15.2115 11.3406 16.0716 11.3406 16.6021 11.775C17.1326 12.2094 17.1326 12.9137 16.6021 13.3482L11.319 17.6742C10.7885 18.1086 9.92839 18.1086 9.39788 17.6742Z" fill="white"/>
                        </svg>
                    </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($term_models): ?>
    <div class="section section-product-subitems product-subitems">
        <div class="container"> 
            <div class="section__title product-subitems__title">
                Типы дверей:
            </div>
            <div class="product-subitems__wrap">
                <ul class="product-subitems__list  product-subitems__list-model">
                <?php foreach($term_models as $item): 
                        $blur = get_the_post_thumbnail_url( $item['id'], 'blur');
                        $full = get_the_post_thumbnail_url( $item['id'], 'news');

                        ?>
                        <li class="product-subitems__item-big">
                            <img class="lazyload" data-src="<?= $full; ?>" src="<?= $blur; ?>" alt="alt">
                            <span><?= get_the_title($item['id']); ?></span>
                        </li>
                    <?php endforeach; ?>                      
                </ul>
                <div class="product-subitems__buttons">
                        <svg class="product-subitems__buttons-model-prev" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12.5" cy="12.5" r="12.5" fill="#009A9F"/>
                            <path d="M8.39788 13.225C7.86737 12.7906 7.86737 12.0863 8.39788 11.6518L13.681 7.3258C14.2115 6.8914 15.0716 6.8914 15.6021 7.3258C16.1326 7.7602 16.1326 8.46451 15.6021 8.89891L10.319 13.225C9.7885 13.6594 8.92838 13.6594 8.39788 13.225Z" fill="#FDFDFD"/>
                            <path d="M15.6021 17.6742C16.1326 17.2398 16.1326 16.5355 15.6021 16.1011L10.319 11.775C9.7885 11.3406 8.92838 11.3406 8.39788 11.775C7.86737 12.2094 7.86737 12.9137 8.39788 13.3482L13.681 17.6742C14.2115 18.1086 15.0716 18.1086 15.6021 17.6742Z" fill="#FDFDFD"/>
                        </svg>
                        <svg class="product-subitems__buttons-model-next" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle r="12.5" transform="matrix(-1 0 0 1 12.5 12.5)" fill="#009A9F"/>
                            <path d="M16.6021 13.225C17.1326 12.7906 17.1326 12.0863 16.6021 11.6518L11.319 7.3258C10.7885 6.8914 9.92839 6.8914 9.39788 7.3258C8.86737 7.7602 8.86737 8.46451 9.39788 8.89891L14.681 13.225C15.2115 13.6594 16.0716 13.6594 16.6021 13.225Z" fill="white"/>
                            <path d="M9.39788 17.6742C8.86737 17.2398 8.86737 16.5355 9.39788 16.1011L14.681 11.775C15.2115 11.3406 16.0716 11.3406 16.6021 11.775C17.1326 12.2094 17.1326 12.9137 16.6021 13.3482L11.319 17.6742C10.7885 18.1086 9.92839 18.1086 9.39788 17.6742Z" fill="white"/>
                        </svg>
                    </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</main>






<?php

get_footer(); 

?>