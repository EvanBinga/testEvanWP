<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<main>
<?php

// Получаем путь к изображению фона для баннера
$background_image_url = get_template_directory_uri() . '/images/Vector 2.png';

// Аргументы для запроса постов с кастомного типа 'slider'
$args = array(
    'post_type' => 'slider',           // Тип поста, который мы запрашиваем
    'posts_per_page' => -1,            // Получить все записи без ограничений
    'orderby' => 'menu_order',        // Сортировка по порядку меню, который можно задать в админке
    'order' => 'ASC'                  // Порядок сортировки - от старшего к младшему
);

// Выполняем запрос по заданным аргументам
$slider_query = new WP_Query($args);
?>

<div class="banner-container">
    <div class="banner-left" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
        <?php if ($slider_query->have_posts()) : ?>
            <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                <div class="banner-slide<?php if ($slider_query->current_post == 0) echo ' active'; ?>">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <!-- Кнопка для открытия модального окна и стрелки для слайдера -->
        <div class="button-container">
            <a href="#" class="banner-btn" id="banner-btn">Связаться</a>
            <div class="arrows">
                <span id="prev-arrow">&lt;</span>
                <span id="next-arrow">&gt;</span>
            </div>
        </div>
    </div>

    <div class="banner-right">
        <?php if ($slider_query->have_posts()) : ?>
            <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <!-- Отображение миниатюрных изображений постов, если они заданы -->
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="<?php if ($slider_query->current_post == 0) echo 'active'; ?>">
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <!-- Индикаторы слайдов -->
        <div class="circle-indicators">
            <?php for ($i = 0; $i < $slider_query->post_count; $i++) : ?>
                <span class="circle<?php if ($i == 0) echo ' active'; ?>"></span>
            <?php endfor; ?>
        </div>
    </div>
</div>

<?php wp_reset_postdata(); // Сбрасываем данные поста после выполнения запроса ?>
</main>
<?php get_footer(); ?>
