<?php

function add_custom_post_type()
{
    register_post_type(
        'colors',
        array(
            'labels' => array(
            'name' => 'Доступные цвета',
            'singular_name' => 'Доступный цвет'
        ),
        'public' => true,
        'supports' => array( 'title', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'colors'),
        )
    );

    register_post_type(
        'floor',
        array(
            'labels' => array(
            'name' => 'Цвета пола',
            'singular_name' => 'Цвет пола'
        ),
        'public' => true,
        'supports' => array( 'title', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'floor'),
        )
    );

    register_post_type(
        'model',
        array(
            'labels' => array(
            'name' => 'Типы дверей',
            'singular_name' => 'Тип дверей'
        ),
        'public' => true,
        'supports' => array( 'title', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'model'),
        )
    );


}
add_action('init', 'add_custom_post_type');
