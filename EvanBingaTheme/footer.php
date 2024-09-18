<footer>
<div class="logo-footer">
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

<?php
            // Вывод основного меню
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => 'ul',
                'menu_class' => 'menu',
            ) );
            ?>

<ul id="menu-social-menu" class="menu">
    <li class="menu-item">
        <a href="https://t.me/yourchannel" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Social-icon.png" alt="Telegram">
        </a>
    </li>
    <li class="menu-item">
        <a href="https://vk.com/yourprofile" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Social-icon-1.png" alt="VK">
        </a>
    </li>
    <li class="menu-item">
        <a href="https://ok.ru/yourprofile" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Social-icon-2.png" alt="Odноклассники">
        </a>
    </li>
    <li class="menu-item">
        <a href="https://www.youtube.com/channel/yourchannel" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Social-icon-3.png" alt="YouTube">
        </a>
    </li>
    <li class="menu-item">
        <a href="https://wa.me/yourphonenumber" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Social-icon-4.png" alt="WhatsApp">
        </a>
    </li>
</ul>

            </div>


    </footer>
    <?php wp_footer(); ?>
</body>
</html>
