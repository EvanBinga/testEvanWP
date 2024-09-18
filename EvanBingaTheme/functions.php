<?php
// Подключение стилей и скриптов
function theme_enqueue_scripts() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/script.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

// Настройки темы
function theme_setup() {
    add_theme_support( 'custom-logo' );

    register_nav_menus( array(
        'primary' => 'Основное меню',
        'footer'  => 'Меню в футере', // Дополнительная область меню

    ) );
}
add_action( 'after_setup_theme', 'theme_setup' );

// Подключение шрифтов Google
function enqueue_custom_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_fonts' );

// Поддержка миниатюр и тега заголовка
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

// Регистрация типа записи "Слайдер"
function create_slider_post_type() {
    register_post_type('slider',
        array(
            'labels' => array(
                'name' => __('Slides'),
                'singular_name' => __('Slide')
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-images-alt2', // Иконка для меню
        )
    );
}
add_action('init', 'create_slider_post_type');

function mytheme_customize_register($wp_customize) {
    // Добавление секции
    $wp_customize->add_section('mytheme_contact_section', array(
        'title'    => __('Контактная информация', 'mytheme'),
        'priority' => 30,
    ));

    // Добавление настройки
    $wp_customize->add_setting('header_phone', array(
        'default'           => '+1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Добавление контроллера
    $wp_customize->add_control('header_phone', array(
        'label'    => __('Телефон', 'mytheme'),
        'section'  => 'mytheme_contact_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'mytheme_customize_register');


?>
