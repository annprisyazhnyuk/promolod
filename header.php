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


<div id="content" class="site-content">

    <?php if (is_home() || is_front_page()) : ?>


        <section id="description">
            <div class="overlay">
                <?php
                $banner_image = get_theme_mod('banner_image_header', '');
                if (!empty($banner_image)) : ?>
                    <style>
                        #description {
                            background: url(<?php echo $banner_image ?>);
                            background-size: cover;
                            background-attachment: fixed;
                        }
                    </style>
                <?php endif; ?>


                <header class="site-header" id='sticker'>
                    <div class="container-elastic">
                        <h1 class="logo-header">
                            <a href="<?php echo get_site_url(); ?>"><img
                                    src="<?php echo get_theme_mod('image', ''); ?>"/></a>
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

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header',
                                'menu_id' => 'head-menu',
                                'container' => 'nav',
                                'menu' => __('Menu(1)')
                            )); ?>
                    </div>
                </header>


                <div class="container-elastic">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h2 class="page-title"> <?php the_title(); ?> </h2>
                        <div class="home-description">

                            <?php the_content(); ?>
                        </div>

                    <?php endwhile;
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif; ?>
                </div> <!-- div.container-elastic -->

            </div> <!-- .overlay -->
        </section> <!-- #description -->

        <?php
    else : ?>
        <header class="site-header" id='sticker'>
            <div class="container-elastic">
                <h1 class="logo-header">
                    <a href="<?php echo get_site_url(); ?>"><img
                            src="<?php echo get_theme_mod('image', ''); ?>"/></a>
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

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-2',
                        'menu_id' => 'head-menu',
                        'container' => 'nav',
                        'menu' => __('Menu(2)')
                    )); ?>
            </div>
        </header>

    <?php endif; ?>



