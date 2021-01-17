<?php
/*
Theme Name: Multisite Framework
Text Domain: mt_framework
Version: 0.1
Requires at least: 5.5.1
Requires PHP: 7.1
Description: Our starter pack for create themes
Author: ismarxovich@gmail.com
Author URI: https://postmeta.com/

*/

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------

	0. 	Подключаем ресурсы
	1. 	Убираем в Yoast Seo разметку поиска
	2.  Переподключаем стандартный jQuery в footer
    3.  Подключаем CSS и JS mt-фреймворка
	4. 	Подключаем CSS и JS конкретного проекта
	5. 	Menu Modal
	6. 	Search Modal
	7. 	Page Templates
		a. 	Template: Cover Template
		c. 	Template: Full Width
	8.  Post: Archive
	9.  Post: Single
	10. Blocks
	11. Entry Content
	12. Comments
	13. Site Pagination
	14. Error 404
	15. Widgets
	16. Site Footer
    17. Media Queries
    

    правило: между функционалом - 4 перевода строки.
----------------------------------------------------------------------------- */





/* -------------------------------------------------------------------------- */
/*	0. Подключаем ресурсы PHP
/* -------------------------------------------------------------------------- */

require get_template_directory() . '/tgm/plugin-installer.php';

include('include/post_types.php');

include('include/carbon_fields.php');

include('include/walker_bem_menu.php');

include('include/framework_lib.php');

include('include/assets.php');

include('include/thumbnails.php');








/* -------------------------------------------------------------------------- */
/*	. Убираем в Yoast Seo разметку поиска
/* -------------------------------------------------------------------------- */

add_filter( 'disable_wpseo_json_ld_search', '__return_true' );





/* -------------------------------------------------------------------------- */
/*	. Выключить добавление изображений в XML Sitemap
/* -------------------------------------------------------------------------- */

add_filter( 'wpseo_xml_sitemap_img', '__return_false' );




/* -------------------------------------------------------------------------- */
/*	. Устраняем баг с несуществующей пагинацией страниц
/* -------------------------------------------------------------------------- */

add_filter( 'pre_handle_404', function( $false, $wp_query ) {
    if ( is_singular() && get_query_var( 'page' ) ) {
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();

        return 'stop';
    }
    return $false;
} , 10, 2 );


// Добавляем поддержку миниатюр постов
add_theme_support( 'post-thumbnails' );

//Включение возможности перезаписи title
add_theme_support( 'title-tag' );




// Разрешение SVG формата
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


include 'include/menu.php';



// Перенаправление на основную запись
function template_redirect_attachment() {
    global $post;

    if ( is_attachment() ) {
        wp_redirect( get_permalink( $post->post_parent ), 301 );
    }
}

add_action( 'template_redirect', 'template_redirect_attachment' );


// Disable Gutenberg
if ( version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' ) ) {
    // WP > 5 beta
    add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );

}


//Скрываем визуальный редактор в админке
add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
}


// remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
// remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
// remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
// remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
// remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
// remove_action( 'rest_api_init', 'wp_oembed_register_route' );
// remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
// remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );



// remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// remove_action( 'wp_print_styles', 'print_emoji_styles' );

// remove_action( 'wp_head', 'wp_resource_hints', 2 );

// remove_action( 'wp_head', 'wp_shortlink_wp_head' );
// remove_action( 'template_redirect', 'wp_shortlink_header', 11 );


// remove_action( 'wp_head', 'wlwmanifest_link' );
// remove_action( 'wp_head', 'rsd_link' );
// remove_action( 'wp_head', 'wp_generator' );
// //Удаляет ссылку из формы комментариев
// add_filter( 'cancel_comment_reply_link', '__return_false' );

// //удаление заголовков, связанных с REST API start
// remove_action('wp_head', 'rest_output_link_wp_head', 10);
// remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
// remove_action('wp_head', 'wp_oembed_add_host_js');
// remove_action('template_redirect', 'rest_output_link_header', 11, 0);







//html5 галерея wp
//   add_theme_support( 'html5', array( 'gallery' ) );

//    //отключение inline стилей для галерей start
//  add_filter('use_default_gallery_style', '__return_false');


//add Site settings tab to wp admin bar
//add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );
//function toolbar_link_to_mypage( $wp_admin_bar ) {
//    $frontpage_id = get_option( 'page_on_front' );
//    $args = array(
//        'id'    =>  $frontpage_id,
//        'title' => 'Настройка главной страницы',
//        'href'  => '/wp-admin/post.php?post='.$frontpage_id.'&action=edit',
//        'meta'  => array( 'class' => 'my-toolbar-page' )
//    );
//    $wp_admin_bar->add_node( $args );
//}




//избавляемся от category в url
function post_is_in_descendant_category( $cats, $_post = null ) {
    foreach ( (array) $cats as $cat ) {
        // get_term_children() accepts integer ID only
        $descendants = get_term_children( (int) $cat, 'category' );
        if ( $descendants && in_category( $descendants, $_post ) ) {
            return true;
        }
    }
    return false;
}



// content btn shortcode register
function popupbtn_add_mce_button() {
    // проверяем права пользователя - может ли он редактировать посты и страницы
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        return; // если не может, то и кнопка ему не понадобится, в этом случае выходим из функции
    }
    // проверяем, включен ли визуальный редактор у пользователя в настройках (если нет, то и кнопку подключать незачем)
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'popupbtn_add_tinymce_script' );
        add_filter( 'mce_buttons', 'popupbtn_register_mce_button' );
    }
}



// В этом функции указываем ссылку на JavaScript-файл кнопки
function popupbtn_add_tinymce_script( $plugin_array ) {
    $plugin_array['popupbtn_mce_button'] = get_stylesheet_directory_uri() . '/js/popup_btn_mce.js'; // popupbtn_mce_button - идентификатор кнопки

    return $plugin_array;
}

// Регистрируем кнопку в редакторе
function popupbtn_register_mce_button( $buttons ) {
    array_push( $buttons, 'popupbtn_mce_button' ); // popupbtn_mce_button - идентификатор кнопки

    return $buttons;
}

//убираем мусор из скриптов
add_action( 'template_redirect', function () {
    ob_start( function ( $buffer ) {
        $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
        $buffer = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );

        return $buffer;
    } );
} );


//убираем атрибут размера из полей cf7
add_filter( 'wpcf7_form_elements', 'remove_attr_size' );
function remove_attr_size( $content ) {
    $content = preg_replace( '/ size=".*?"/i', ' ', $content );

    return $content;
}

//ошибка микроразметки
function artabr_opengraph_fix_yandex($lang) {
    $lang_prefix = 'prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article#  profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#"';
    $lang_fix = preg_replace('!prefix="(.*?)"!si', $lang_prefix, $lang);
    return $lang_fix;
}
add_filter( 'language_attributes', 'artabr_opengraph_fix_yandex',20,1);














