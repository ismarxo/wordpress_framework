<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Настройки сайта')
    ->add_tab('Шапка сайта', array(
        Field::make('image', 'header_logo', 'Логотип')
            ->set_width(50),
        Field::make('complex', 'header_phones', 'Телефоны')
            ->add_fields(array(
                Field::make('text', 'phone', 'Телефон')
            )),
        Field::make('text', 'header_hours', 'Время работы'),
        Field::make('text', 'header_button', 'Текст кнопки')       
    ))
    ->add_tab('Подвал сайта', array(
        Field::make('image', 'footer_logo', 'Логотип')
            ->set_width(100),
        Field::make('complex', 'footer_social', 'Соц.сети')
            ->add_fields( array(
                Field::make('image', 'image', 'Иконка')
                    ->set_width(50),
                Field::make('text', 'link', 'Ссылка')
                    ->set_width(50),
            )),
        Field::make('complex', 'footer_mess', 'Мессенджеры')
            ->add_fields( array(
                Field::make('image', 'image', 'Иконка')
                    ->set_width(50),
                Field::make('text', 'link', 'Ссылка')
                    ->set_width(50),
            )),
        Field::make('complex', 'footer_phones', 'Телефоны')
            ->add_fields(array(
                Field::make('text', 'phone', 'Телефон')
            )),
        Field::make('text', 'footer_hours', 'Время работы'), 
        Field::make('text', 'footer_mail', 'Почта'), 
        Field::make('textarea', 'copyright_title', 'Копирайт - заголовок'),
        Field::make('textarea', 'copyright', 'Копирайт')
    ));



