<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title> <?php echo get_bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>

<body class="<?php body_class(); ?>">
    <header class="site-header" id='sticker'>
        <div class="container-elastic">
                <h1 class="logo-header">
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_theme_mod('image', ''); ?>"/></a>
                </h1>

                <span class="lightbox">
                    <a data-fancybox-type="ajax" href="<?php the_permalink(95); ?>"
                       class="support-button"><?php _e('Підтримати', 'promolod')
                        ?></a>
                </span>

                <div class="button_container" id="toggle">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>

                <?php if (is_home() || is_front_page()) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header',
                            'menu_id' => 'head-menu',
                            'container'     => 'nav',
                            'menu' => __('Menu(1)')
                        ));
                else : wp_nav_menu(
                    array(
                        'theme_location' => 'header-2',
                        'menu_id' => 'head-menu',
                        'container'     => 'nav',
                        'menu' => __('Menu(2)')
                    ));
                endif;?>

        </div>
    </header>
    <div id="content" class="site-content">
