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


// страница Карточка запчасти/лифта

Container::make('post_meta', 'Карточка запчасти/лифта')
    ->where( 'post_type', '=', 'post' )
    ->or_where( 'post_template', '=', 'single-post.php' )
    ->add_fields(array(
        Field::make( 'select', 'title_state', 'Статус заголовка' )
            ->set_width(10)
            ->set_options( $seo_tags )
            ->set_default_value( 'h1' ),
        Field::make( 'text', 'title', 'Иной заголовок' )
            ->set_width(90), 
        Field::make( 'media_gallery', 'gallery', 'Галерея запчасти/лифта' )
            ->set_type( array( 'image' ) )
            ->set_width(60),
        Field::make('complex', 'specifications', 'Характеристики')
            ->add_fields( array(
                Field::make( 'text', 'title', 'Название' )
                    ->set_width(50),
                Field::make( 'text', 'desc', 'Значение' )
                    ->set_width(50),
            ) )
            ->set_width(40),
        Field::make( 'rich_text', 'content', 'Описание' )
            ->set_width(100),
        Field::make( 'association', 'colors', 'Какие доступные цвета исключить?' )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'colors',
                ),
            )),
        Field::make( 'association', 'floor', 'Какие цвета пола исключить?' )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'floor',
                ),
            )),
        Field::make( 'association', 'model', 'Какие типы дверей исключить?' )
            ->set_types( array(
                array(
                    'type' => 'post',
                    'post_type' => 'model',
                ),
            )),
));

// страница Карточка запчасти/лифта
Container::make('post_meta', 'Новости')
    ->where( 'post_template', '=', 'category-news.php' )
    ->add_fields(array(
        Field::make( 'select', 'title_state', 'Статус заголовка' )
            ->set_width(10)
            ->set_options( $seo_tags )
            ->set_default_value( 'h1' ),
        Field::make( 'text', 'title', 'Иной заголовок' )
            ->set_width(90), 
        Field::make( 'rich_text', 'desc', 'Описание' )
            ->set_width(65),
        Field::make( 'rich_text', 'content', 'Контент' )
            ->set_width(100),      
));







// страница Контакты
Container::make('post_meta', 'Страница контакты')
    ->where( 'post_template', '=', 'single-contacts.php' )
    ->add_fields(array(
      Field::make( 'select', 'title_state', 'Статус заголовка' )
        ->set_options( array(
            'span'  => 'span',
            'h1'    => 'h1',
            'h2'    => 'h2',
            'h3'    => 'h3',
            'h4'    => 'h4',
            'h5'    => 'h5',
            'p'     => 'p',                
        ) )
        ->set_width(10)              
        ->set_default_value( 'h1' ),
      Field::make( 'text', 'title', 'Заголовок' )
        ->set_width(90),
      Field::make( 'rich_text', 'contact__info', 'Контактная информация' )
        ->set_width(50),
      Field::make( 'complex', 'social_list', 'Социальные сети' )
          ->set_width(50)
          ->add_fields(array(
            Field::make('image', 'image', 'Картинка')
                ->set_width(50),
            Field::make('text', 'link', 'Ссылка')
                ->set_width(50),           
          )),
        Field::make('text', 'x', 'Коорд.Широта')
            ->set_width(50),
        Field::make('text', 'y', 'Коорд.Долгота')
            ->set_width(50),
        Field::make('textarea', 'contact__map', 'Информация на карте')
            ->set_width(50)
));






// страница Услуга
// Container::make('post_meta', 'Услуга')    
//     ->where( 'post_template', '=', 'page.php' )
//     ->add_fields(array(
//         Field::make( 'text', 'subtitle', 'Предзаголовок' ),
//         Field::make( 'image', 'image', 'Фоновое изображение' ),
//         Field::make( 'select', 'title_state', 'Статус заголовка' )
//             ->set_width(10)
//             ->set_options( $seo_tags )
//             ->set_default_value( 'h1' ),
//         Field::make( 'text', 'title', 'Иной заголовок' )
//             ->set_width(25),
//         Field::make( 'rich_text', 'desc', 'Описание' )
//             ->set_width(65),
//         Field::make( 'rich_text', 'content', 'Контент' )
//             ->set_width(100),        
// ));

// страница Цены
// Container::make('post_meta', 'Цены')
//     ->where( 'post_template', '=', 'single-price.php' )
//     ->add_fields(array(    
//         Field::make( 'select', 'title_state', 'Статус заголовка' )
//             ->set_width(10)
//             ->set_options( $seo_tags )
//             ->set_default_value( 'h1' ),
//         Field::make( 'text', 'title', 'Иной заголовок' )
//             ->set_width(25),
//         Field::make( 'rich_text', 'desc', 'Описание' )
//             ->set_width(65),
//         Field::make( 'rich_text', 'content', 'Контент' )
//             ->set_width(100),                         
//         Field::make( 'rich_text', 'content2', 'Описание после кнопки - Оставить заявку' )
//             ->set_width(100)
//             ->set_default_value('Мы будем присылать вам информацию по самым важным новостям, грядущим обновлениям и событиям в сфере юриспруденции для предпринимательства.'),                                
//         Field::make( 'select', 'title_state2', 'Статус заголовка' )
//             ->set_width(10)
//             ->set_options( $seo_tags )
//             ->set_default_value( 'div' ),
//         Field::make( 'text', 'title2', 'Заголовок формы' )
//             ->set_width(45)
//             ->set_default_value('Получить прайс-лист'),  
//         Field::make( 'rich_text', 'content3', 'Текст формы' )
//             ->set_width(45)
//             ->set_default_value('Укажите Ваш e-mail и мы отправим прайс-лист.'), 
// ));

// страница Статья/Акция
// Container::make('post_meta', 'Статья')    
//     ->where( 'post_type', '=', 'page' )
//     ->or_where( 'post_template', '=', 'single-page.php' )
//     ->add_fields(array(  
//         Field::make( 'text', 'deadline', 'Срок действия' ),    
//         Field::make( 'select', 'title_state', 'Статус заголовка' )
//             ->set_width(10)
//             ->set_options( $seo_tags )
//             ->set_default_value( 'h1' ),
//         Field::make( 'text', 'title', 'Иной заголовок' )
//             ->set_width(25),
//         Field::make( 'rich_text', 'desc', 'Описание' )
//             ->set_width(65),
//         Field::make( 'rich_text', 'content', 'Контент' )
//             ->set_width(100),
//         Field::make( 'select', 'title_state2', 'Статус заголовка' )
//             ->set_width(10)
//             ->set_options( $seo_tags )
//             ->set_default_value( 'div' ),
//         Field::make( 'text', 'title2', 'Подпишитесь на наши обновления' )
//             ->set_width(45)
//             ->set_default_value('Подпишитесь на наши обновления'),                   
//         Field::make( 'rich_text', 'content2', 'Описание' )
//             ->set_width(75)
//             ->set_default_value('Мы будем присылать вам информацию по самым важным новостям, грядущим обновлениям и событиям в сфере юриспруденции для предпринимательства.'),                                
// ));









// добавление анонса и параметра даты всем страницам
Container::make('post_meta', 'Анонс')

    ->where( 'post_id', '!=', get_option( 'page_on_front' ) )
    ->or_where( 'post_type', '=', 'page' )
    ->set_context( 'side' )
    ->add_fields( array(
        Field::make( 'text', 'title_card', 'Заголовок для карточки' ),
        Field::make( 'textarea', 'anons' , 'Анонс' ),
        Field::make( 'checkbox', 'date', 'Показывать дату'),
));


// добавление анонса и параметра даты всем страницам
Container::make('post_meta', 'Товар')
    ->where( 'post_type', '=', 'post' )
    ->or_where( 'post_template', '=', 'post_type' )
    ->set_context( 'side' )
    ->add_fields( array(       
        Field::make( 'text', 'price', 'Цена'),  
        Field::make( 'text', 'old_price', 'Старая цена'), 
        Field::make( 'checkbox', 'katalog', 'Спарять кнопку "Запросить каталог"?'),       
));




