<?php

/* -------------------------------------------------------------------------- */
/*	Переподключаем стандартный jQuery в footer
/* -------------------------------------------------------------------------- */


add_action( 'wp_enqueue_scripts', function() {
   wp_deregister_script( 'jquery' );
} );


/* -------------------------------------------------------------------------- */
/*	Подключаем CSS и JS mt-фреймворка
/* -------------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'enqueue_vendor_js_and_css' );

function enqueue_vendor_js_and_css() {
    //CSS
    wp_enqueue_style( 'normalize_css', get_stylesheet_directory_uri() . '/assets/libs/normalize.css', false , get_stylesheet_directory_uri() . '/assets/libs/normalize.css'  );
    wp_enqueue_style( 'slick_css', get_stylesheet_directory_uri() . '/assets/libs/slick/slick.css', false , get_stylesheet_directory_uri() . '/assets/libs/slick/slick.css'  );
    wp_enqueue_style( 'fancybox_css', get_stylesheet_directory_uri() . '/assets/libs/fancybox/fancybox.css', false , get_stylesheet_directory_uri() . '/assets/libs/fancybox/fancybox.css'  );

    //JavaScript
   wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/libs/jquery.js', array(  ), get_stylesheet_directory_uri() . '/assets/libs/jquery.js' , true );
   wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/libs/slick/slick.js', array(  ), get_stylesheet_directory_uri() . '/assets/libs/slick/slick.js' , true );
   wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/assets/libs/fancybox.js', array(  ), get_stylesheet_directory_uri() . '/assets/libs/fancybox.js' , true );

}


/* -------------------------------------------------------------------------- */
/*	Подключаем CSS и JS конкретного проекта
/* -------------------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'enqueue_theme_js_and_css' );

function enqueue_theme_js_and_css() {
    //CSS
    wp_enqueue_style( 'style_css', get_stylesheet_directory_uri() . '/assets/css/main.css', false , get_stylesheet_directory_uri() . '/assets/css/main.css' );

    //JavaScript
    wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/assets/js/main.js', false , get_stylesheet_directory_uri() . '/assets/js/main.js' , true );
}