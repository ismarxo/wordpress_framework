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


Container::make( 'post_meta', 'Настройки главной страницы' )
        ->where( 'post_id', '=', get_option( 'page_on_front' ) ) 
        ->or_where( 'post_template', '=', 'front-page.php' )
        ->or_where( 'post_template', '=', 'single-front.php' )
        ->add_fields( array(      
            Field::make( 'complex', 'front_page', ' ' )
                ->setup_labels( array(
                    'plural_name' => 'Секции',
                    'singular_name' => 'секцию',
                ))                
                ->add_fields('hero__banner', 'Баннер-экран', array(
                        Field::make( 'text', 'pretitle', 'Предзаголовок' )  
                            ->set_width(100)
                            ->set_default_value('Заголовок'),   
                        Field::make( 'select', 'title_state', 'Статус заголовка' )
                            ->set_width(10)
                            ->set_options( $seo_tags )
                            ->set_default_value( 'h1' ), 
                        Field::make( 'text', 'title', 'Заголовок' )  
                            ->set_width(45)
                            ->set_default_value('Заголовок'),           
                        Field::make( 'image', 'image', 'Фоновая картинка' )
                            ->set_width(45),  
                        Field::make('rich_text', 'content')
                            ->set_width(100)
                            ->set_default_value( 'Какой-то текст' ),     
                        Field::make('text', 'button_link', 'Ссылка на кнопке')
                            ->set_width(25)  
                            ->set_default_value( 'Смотреть оборудование' ),                       
                        Field::make('text', 'button_text', 'Текст на кнопке')
                            ->set_width(25)  
                            ->set_default_value( 'Смотреть оборудование' ),                       
                ))  
                ->add_fields('category__list', 'Категории товаров', array(
                    Field::make( 'association', 'links' , 'Выбрать продукцию' )
                        ->set_width(100)
                        ->set_max( 7 )
                        ->set_types(array(
                            array(
                                'type' => 'term',
                                'taxonomy' => 'category',                           
                            )
                        )),
                    Field::make('textarea', 'text', 'Текст')
                ))
                ->add_fields('pages__list', 'Услуги', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                        ->set_width(10)
                        ->set_options( $seo_tags )
                        ->set_default_value( 'h2' ),
                    Field::make( 'text', 'title', 'Заголовок' )
                        ->set_width(45)
                        ->set_default_value('Услуги'),                   
                    Field::make( 'rich_text', 'content', 'Описание' )
                        ->set_width(75)
                        ->set_default_value('Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.'),
                    Field::make( 'association', 'links' , 'Выбрать продукцию' )
                        ->set_width(100)
                        ->set_max( 20 )
                        ->set_types(array(
                            array(
                                'type'      => 'post',
                                'post_type' => 'page',                               
                            )
                        )),                                
                ))
                ->add_fields('about__media', 'О компании', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                        ->set_width(15)
                        ->set_options( $seo_tags )
                        ->set_default_value( 'h2' ),
                    Field::make( 'text', 'title', 'Заголовок' )
                        ->set_width(85)
                        ->set_default_value('О компании'),
                    Field::make('image', 'image', 'Изображение')
                        ->set_width(35),
                    Field::make( 'rich_text', 'content', 'Описание' )
                        ->set_width(65)
                        ->set_default_value('Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.'),
                    Field::make('text', 'link', 'Ссылка "Подробнее"'),
                    Field::make('complex', 'advantages', 'Преимущества')
                        ->add_fields(array(
                            Field::make('image', 'image', 'Иконка')
                                ->set_width(20),
                            Field::make('text', 'title', 'Заголовок')
                                ->set_width(40),
                            Field::make('textarea', 'text', 'Описание')
                                ->set_width(40)
                        ))
                        ->set_width(100)
                ))
                ->add_fields('works__slider', 'Наши объекты', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                        ->set_width(15)
                        ->set_options( $seo_tags )
                        ->set_default_value( 'h2' ),
                    Field::make( 'text', 'title', 'Заголовок' )
                        ->set_width(85)
                        ->set_default_value('Наши объекты'),
                    Field::make( 'rich_text', 'content', 'Описание' )
                        ->set_width(100)
                        ->set_default_value('Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.'),
                   
                    Field::make('complex', 'list', 'Выборка объекта')
                        ->add_fields(array(
                            Field::make('image', 'image', 'Фон текста')
                                ->set_width(20),
                            Field::make( 'association', 'links' , 'Выбрать продукцию' )
                                ->set_width(100)
                                ->set_max( 1 )
                                ->set_types(array(
                                    array(
                                        'type'      => 'post',
                                        'post_type' => 'page',                               
                                    )
                                )), 
                        ))
                        ->set_width(100),
                    Field::make('text', 'link', 'Ссылка')
                ))



                ->add_fields('hot_link', 'Горячее предложение', array(
                        Field::make( 'select', 'title_state', 'Статус заголовка' )
                            ->set_width(10)
                            ->set_options( $seo_tags )
                            ->set_default_value( 'div' ), 
                        Field::make( 'text', 'title', 'Заголовок' )  
                            ->set_width(45)
                            ->set_default_value('Заголовок'),           
                        Field::make( 'image', 'image', 'Фоновая картинка' )
                            ->set_width(45),
                        Field::make('rich_text', 'content')
                            ->set_width(100)
                            ->set_default_value( 'Какой-то текст' ),                            
                        Field::make('text', 'button', 'Текст на кнопке')
                            ->set_width(50)  
                            ->set_default_value( 'Подробнее' ), 
                        Field::make('text', 'link', 'Ссылка')
                            ->set_width(50)  
                            ->set_default_value( '/sale' ),                        
                ))         
                ->add_fields('page__list_current', 'Продукция', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                        ->set_width(10)
                        ->set_options( $seo_tags )
                        ->set_default_value( 'h2' ),
                    Field::make( 'text', 'title', 'Заголовок' )
                        ->set_width(45)
                        ->set_default_value('Вакансии'),                   
                    Field::make( 'rich_text', 'content', 'Описание' )
                        ->set_width(75)
                        ->set_default_value('Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.'),
                    Field::make( 'association', 'links' , 'Выбрать продукцию' )
                        ->set_width(100)
                        ->set_max( 20 )
                        ->set_types(array(
                            array(
                                'type'      => 'post',
                                'post_type' => 'page',                               
                            )
                        )),                                
                ))
                ->add_fields('advantages__list', 'Преимущества', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                            ->set_width(10)
                            ->set_options( $seo_tags )
                            ->set_default_value( 'div' ), 
                    Field::make( 'text', 'title', 'Заголовок' )  
                            ->set_width(45)
                            ->set_default_value('Заголовок'),
                    Field::make('complex', 'advantages', 'Преимущества')
                        ->add_fields(array(
                            Field::make('image', 'image', 'Иконка')
                                ->set_width(20),
                            Field::make('text', 'title', 'Заголовок')
                                ->set_width(40),
                            Field::make('textarea', 'text', 'Описание')
                                ->set_width(40)
                        ))
                        ->set_width(100)
                )) 
                ->add_fields('seo__thin', 'Отцентрованный текст', array(
                    Field::make('rich_text', 'content', 'Описание')
                        ->set_default_value('Юридическая компания ООО «РЕГИСТРУМ» основана в 2009 г. основными направлениями деятельности является регистрация, внесение изменений и ликвидация юридических лиц и индивидуальных предпринимателей, сопровождение сделок с недвижимостью. За время работы специалисты компании обрели большой практический опыт в сфере оказания данного вида услуг, что позволяет выполнять работу четко, качественно и гарантировать результат. <br> Наша компания не большая, мы не имеем наград и статусов. Мы просто любим свою работу и поэтому особо внимательно относимся к каждому клиенту и предлагаем разумные цены на квалифицированные услуги!')
                ))
                ->add_fields('team__list', 'Наши сотрудники', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                            ->set_width(10)
                            ->set_options( $seo_tags )
                            ->set_default_value( 'div' ), 
                    Field::make( 'text', 'title', 'Заголовок' )  
                            ->set_width(45)
                            ->set_default_value('Заголовок'),
                    Field::make('rich_text', 'content', 'Описание')
                            ->set_width(100),
                    Field::make('complex', 'list', 'Сотрудники')
                        ->add_fields(array(
                            Field::make('image', 'image', 'Иконка')
                                ->set_width(20),
                            Field::make('text', 'name', 'Имя')
                                ->set_width(25),
                            Field::make('text', 'position', 'Должность')
                                ->set_width(25),
                            Field::make('textarea', 'text', 'Описание')
                                ->set_width(30)
                        ))
                        ->set_width(100)
                ))
                ->add_fields('cert__list', 'Документация', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                            ->set_width(10)
                            ->set_options( $seo_tags )
                            ->set_default_value( 'div' ), 
                    Field::make( 'text', 'title', 'Заголовок' )  
                            ->set_width(45)
                            ->set_default_value('Заголовок'),
                    Field::make('rich_text', 'content', 'Описание')
                            ->set_width(100),
                    Field::make('complex', 'list', 'Документы')
                        ->add_fields(array(
                            Field::make('image', 'image', 'Иконка')
                                ->set_width(20),
                            Field::make('file', 'file', 'Файл')
                                ->set_width(20),
                            Field::make('text', 'name', 'Название')
                                ->set_width(30),
                            Field::make('textarea', 'text', 'Описание')
                                ->set_width(30)
                        ))
                        ->set_width(100)
                ))
                ->add_fields('blog__list', 'Юридический блог', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                        ->set_width(10)
                        ->set_options( $seo_tags )
                        ->set_default_value( 'h2' ),
                    Field::make( 'text', 'title', 'Заголовок' )
                        ->set_width(45)
                        ->set_default_value('Юридический блог'),                   
                    Field::make( 'rich_text', 'content', 'Описание' )
                        ->set_width(75)
                        ->set_default_value('Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.'),
                    Field::make( 'association', 'links' , 'Выбрать статьи' )
                        ->set_width(100)
                        ->set_max( 20 )
                        ->set_types(array(
                            array(
                                'type'      => 'post',
                                'post_type' => 'post',                               
                            )
                        )),                                
                ))
                ->add_fields('banner__subscribe', 'Подпишитесь на обновления', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                        ->set_width(10)
                        ->set_options( $seo_tags )
                        ->set_default_value( 'div' ),
                    Field::make( 'text', 'title', 'Заголовок' )
                        ->set_width(45)
                        ->set_default_value('Подпишитесь на наши обновления'),                   
                    Field::make( 'rich_text', 'content', 'Описание' )
                        ->set_width(75)
                        ->set_default_value('Таким образом реализация намеченных плановых заданий обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.'),                                
                ))
                ->add_fields('list__partners', 'Партнёры', array(
                    Field::make( 'select', 'title_state', 'Статус заголовка' )
                            ->set_width(10)
                            ->set_options( $seo_tags )
                            ->set_default_value( 'div' ), 
                    Field::make( 'text', 'title', 'Заголовок' )  
                            ->set_width(45)
                            ->set_default_value('Заголовок'),
                   
                    Field::make('complex', 'list', 'Партнёры')
                        ->add_fields(array(
                            Field::make('image', 'image', 'Иконка')
                        ))
                        ->set_width(100)
                ))

      ));
















        //         ->add_fields('sale__banner','Акционный баннер', array(
        //             Field::make('image', 'image', 'Фоновое изображение')
        //                 ->set_width(40),
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_width(10)              
        //                 ->set_default_value( 'span' ),
        //             Field::make('text', 'title', 'Заголовок')
        //                 ->set_width(50),
        //             Field::make('rich_text', 'content', 'Описание')
        //                 ->set_width(100)
        //         ))
        //         ->add_fields('service__list_image', 'Услуги', array(
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(10)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(45)
        //                 ->set_default_value('Услуги'),                   
        //             Field::make( 'rich_text', 'content', 'Описание' )
        //                 ->set_width(75)
        //                 ->set_default_value('С другой стороны начало повседневной работы по формированию позиции способствует подготовки и реализации существенных финансовых и административных условий'),
        //             Field::make( 'complex', 'service_list', ' ' )
        //                 ->setup_labels( array(
        //                     'plural_name' => 'Услуги',
        //                     'singular_name' => 'услуга',
        //                 ))
        //                 ->add_fields( 'service', 'Тип услуг',  array(
        //                     Field::make( 'image', 'image', 'Иконка' )
        //                         ->set_width(20),
        //                     Field::make( 'textarea', 'text', 'Тип услуг' )
        //                         ->set_width(30),
        //                     Field::make( 'association', 'links' , 'Выбрать услуги' )                   
        //                         ->set_width( 50 ) 
        //                         ->set_max( 1 )
        //                         ->set_types(array(
        //                             array(
        //                                 'type'      => 'post',
        //                                 'post_type' => 'page',
        //                             )
        //                         ))                             
        //                 )) 
        //         )) 
        //         ->add_fields('about__media', 'О Компании', array(
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(50)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(50)
        //                 ->set_default_value('О Компании'),                   
        //             Field::make( 'rich_text', 'content', 'Описание' )
        //                 ->set_width(70)
        //                 ->set_default_value('Равным образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны начало повседневной работы по формированию позиции в значительной степени обуславливает создание модели развития. Задача организации, в особенности же рамки и место обучения кадров представляет собой интересный эксперимент проверки систем массового участия. Равным образом укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны консультация с широким активом позволяет оценить значение позиций, занимаемых участниками.'),              
        //             Field::make( 'complex', 'preview', 'Фото/Видео оформление' )
        //                 ->set_width(30)
        //                 ->set_max(1)
        //                 ->setup_labels( array(
        //                     'plural_name' => 'Превью',
        //                     'singular_name' => 'превью',
        //                 ))                        
        //                 ->add_fields('image', 'Фото',  array(
        //                     Field::make('image', 'preview', 'Фото')
        //                 ))
        //                 ->add_fields('video', 'Видео',  array(
        //                     Field::make('image', 'preview', 'Фото'),                               
        //                     Field::make( 'text', 'link' , 'Ссылка на видео' )
        //                         ->set_width(100),
        //                 )),
        //             Field::make('image', 'image_add', 'Дополнительное изображение в углу')  
        //                 ->set_width(50),
        //             Field::make( 'text', 'link', 'Ссылка "Подробнее"' )
        //                 ->set_width(50) 
        //         ))
        //         ->add_fields('steps', 'Как заказать', array(
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(50)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(50)
        //                 ->set_default_value('Как заказать'),                   
        //             Field::make('complex', 'steps', 'Шаги')
        //                 ->set_width(100)
        //                 ->add_fields(array(
        //                     Field::make('image', 'image', 'Иконка')
        //                         ->set_width(33),
        //                     Field::make('text', 'name', 'Название')
        //                         ->set_width(33),                           
        //                     Field::make('textarea', 'desc', 'Описание')
        //                         ->set_width(33),
                           
        //                 ))               
        //         ))
        //         ->add_fields('works','Наши работы', array(   
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_width(20)              
        //                 ->set_default_value( 'span' ),
        //             Field::make('text', 'title', 'Заголовок')
        //                 ->set_default_value('Наши работы')
        //                 ->set_width(50),
        //             Field::make('rich_text', 'content', 'Описание')
        //                 ->set_width(100),
        //         ))


















                             
               
        //         ->add_fields('banner__wide', 'Широкий баннер с ссылкой', array(
		// 			Field::make( 'select', 'type_banner', 'Тип баннера' )                        
        //                 ->set_options( array(
        //                     'classic'  => 'classic',
        //                     'full'    => 'full',                                           
        //                 ))
        //                 ->set_default_value( 'classic' )
		// 				->set_width(100),
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(50)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ))
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(50)
        //                 ->set_default_value('Ищите работу?'),                   
        //             Field::make( 'image', 'image', 'Фоновая картинка' )
        //                 ->set_width(25),
        //             Field::make( 'rich_text', 'content', 'Описание' )
        //                 ->set_width(75)
        //                 ->set_default_value('для поступления в базу данных компании и рассмотрения вашей кандидатуры необходимо'),              
        //             Field::make( 'complex', 'button', 'Кнопка' )
        //                 ->set_width(50)
        //                 ->setup_labels( array(
        //                     'plural_name' => 'Кнопки',
        //                     'singular_name' => 'кнопку',
        //                 ))
        //                 ->add_fields('button', 'Кнопка',  array(
        //                     Field::make('text', 'text', 'Текст')
        //                         ->set_width(50)  
        //                         ->set_default_value( 'Заполнить анкету' ),                            
        //                     Field::make( 'select', 'link' , 'Действие' )
        //                         ->set_width(50)
        //                         ->set_options( array(
        //                             '#callback'  => 'Заявка',
        //                             '#addReview' => 'Отзыв',                                                  
        //                         ))
        //                         ->set_default_value( 'Заявка' ),
        //                 ))
        //                 ->add_fields('link', 'Ссылка',  array(
        //                     Field::make('text', 'text', 'Текст')
        //                         ->set_width(50)
        //                         ->set_default_value( 'Заполнить анкету' ),                                  
        //                     Field::make( 'text', 'link' , 'Ссылка' )
        //                         ->set_width(50),
        //                 )),
                                    
        //         ))
        //         ->add_fields('map__list', 'Карта с выводом партнёров', array(
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(50)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(50)
        //                 ->set_default_value('СЕО Текст'),                   
        //             Field::make( 'rich_text', 'content', 'Описание' )
        //                 ->set_width(100)
        //                 ->set_default_value('Равным образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны начало повседневной работы по формированию позиции в значительной степени обуславливает создание модели развития. Задача организации, в особенности же рамки и место обучения кадров представляет собой интересный эксперимент проверки систем массового участия. Равным образом укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны консультация с широким активом позволяет оценить значение позиций, занимаемых участниками.'),              
        //             Field::make('complex', 'list', 'Партнёры')
        //                 ->set_width(100)
        //                 ->add_fields(array(
        //                     Field::make('text', 'name', 'Название')
        //                         ->set_width(30),
        //                     Field::make('text', 'count', 'Количество партнёров')
        //                         ->set_width(30),
        //                     Field::make('text', 'map_x', 'Долгота')
        //                         ->set_width(20),
        //                     Field::make('text', 'map_y', 'Широта')
        //                         ->set_width(20),
        //                 ))               
        //         ))
        //         ->add_fields('feedback__list_current', 'Избранные отзывы', array(
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(50)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(50)
        //                 ->set_default_value('СЕО Текст'),                   
        //             Field::make( 'rich_text', 'content', 'Описание' )
        //                 ->set_width(100)
        //                 ->set_default_value('Равным образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны начало повседневной работы по формированию позиции в значительной степени обуславливает создание модели развития. Задача организации, в особенности же рамки и место обучения кадров представляет собой интересный эксперимент проверки систем массового участия. Равным образом укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны консультация с широким активом позволяет оценить значение позиций, занимаемых участниками.'),              
                                     
        //         ))                
        //         ->add_fields('seo__block', 'Контентный блок', array(
        //             Field::make( 'select', 'title_state', 'Статус заголовка' )
        //                 ->set_width(50)
        //                 ->set_options( array(
        //                     'span'  => 'span',
        //                     'h1'    => 'h1',
        //                     'h2'    => 'h2',
        //                     'h3'    => 'h3',
        //                     'h4'    => 'h4',
        //                     'h5'    => 'h5',
        //                     'p'     => 'p',                
        //                 ) )
        //                 ->set_default_value( 'h2' ),
        //             Field::make( 'text', 'title', 'Заголовок' )
        //                 ->set_width(50)
        //                 ->set_default_value('СЕО Текст'),                   
        //             Field::make( 'rich_text', 'content', 'Описание' )
        //                 ->set_width(100)
        //                 ->set_default_value('Равным образом сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны начало повседневной работы по формированию позиции в значительной степени обуславливает создание модели развития. Задача организации, в особенности же рамки и место обучения кадров представляет собой интересный эксперимент проверки систем массового участия. Равным образом укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании форм развития. С другой стороны консультация с широким активом позволяет оценить значение позиций, занимаемых участниками.'),              
                                     
        //         ))
        // ));
     