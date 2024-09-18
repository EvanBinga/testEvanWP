<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <header>
    <div id="contact-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Связаться с нами</h2>
        <form id="contact-form">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Сообщение</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Отправить</button>
        </form>
    </div>
</div>

        <div class="header-container">
            <div class="mobile-box">
            <div class="logo-container">
                <?php 
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/default-logo.png" alt="<?php bloginfo('name'); ?>">
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="menu-container">
    <button class="burger-menu">
        <span class="burger-bar"></span>
        <span class="burger-bar"></span>
        <span class="burger-bar"></span>
    </button>
    <?php
    // Вывод основного меню
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => 'ul',
        'menu_class' => 'menu',
    ) );
    ?>
    </div>
</div>
        <div class="callback-box"> 
            <img src="<?php echo get_template_directory_uri(); ?>/images/Heart.svg" alt="Icon" class="heart-icon"> 
            <a href="tel:<?php echo get_theme_mod('header_phone'); ?>" class="phone-number">
<?php
$header_phone = get_theme_mod('header_phone', '+1234567890');
echo esc_html($header_phone);
?>          
            </div>
            <button id="callback-btn"> 

<img src="<?php echo get_template_directory_uri(); ?>/images/Phone.svg" alt="Icon" class="phone-icon"> Связаться
</button>
        </div>
    </header>
</body>
</html>
