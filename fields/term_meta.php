<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


$seo_tags = array(
  'span'  => 'span',
  'h1'    => 'h1',
  'h2'    => 'h2',
  'h3'    => 'h3',
  'h4'    => 'h4',
  'h5'    => 'h5',
  'p'     => 'p',                
);

$category     = get_queried_object();

// $category_id  = $category->term_taxonomy_id;

Container::make( 'term_meta', 'Категории' )
    ->where( 'term_taxonomy', '=', 'category' )
  
    ->add_fields( array(
        Field::make( 'image', 'preview', 'Миниатюра' )
            ->set_width(100),

        Field::make( 'select', 'title_term_status', 'Статус заголовка' )
            ->set_width(10)
            ->set_options( $seo_tags )
            ->set_default_value( 'h1' ),
        Field::make( 'text', 'title_term', 'Свой заголовок' )
            ->set_width(90),          
        Field::make( 'association', 'colors', 'Доступные цвета' )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'colors',
                ),
            )),
        Field::make( 'association', 'floor', 'Цвет пола' )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'floor',
                ),
            )),
        Field::make( 'association', 'model', 'Типы дверей' )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'model',
                ),
            )),                        
        Field::make( 'rich_text', 'content', 'Описание' )                              
));


// Container::make( 'term_meta', 'Категории' )
//     ->where( 'term_ancestor', '=', 17 )
//     ->add_fields( array(
//         Field::make( 'select', 'title_term_status', 'Статус1 заголовка' )
//             ->set_width(10)
//             ->set_options( $seo_tags )
//             ->set_default_value( 'h1' ),
//         Field::make( 'text', 'title_term', 'Свой заголовок' )
//             ->set_width(90),

        
//         Field::make( 'association', 'colors', 'Доступные цвета' )
//             ->set_types( array(
//                 array(
//                     'type' => 'post',
//                     'post_type' => 'colors',
//                 ),
//             )),
//         Field::make( 'association', 'floor', 'Цвет пола' )
//             ->set_types( array(
//                 array(
//                     'type' => 'post',
//                     'post_type' => 'floor',
//                 ),
//             )),
//         Field::make( 'association', 'model', 'Типы дверей' )
//             ->set_types( array(
//                 array(
//                     'type' => 'post',
//                     'post_type' => 'model',
//                 ),
//             )),                        
//         Field::make( 'rich_text', 'content', 'Описание' )                              
//     ));