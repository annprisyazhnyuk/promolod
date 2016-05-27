<?php
/** This is navigation. You can jump to section with ctrl+f */
/**  1. Navs registration */
/**      1.1 Register header menu */
/**      1.2 Register sidebar  */
/**  2. Styles and scripts registration  */
/**      2.1 Main style.css  */
/**      2.2 Font Awesome  */
/**      2.3 Google Fonts */
/**      2.4 jQuery  */
/**      2.5 Accordion  */
/**      2.6 Fancybox */
/**  3. customize excerpt */
/**  4. Post thumbnail support */
/**  5. Theme customizer declaration */
/**  6. Social icons function */
/**  7. Post type registration  */
/** */


/** 1. Navs registration */
/** 1.1 Register header menu */
register_nav_menus(array(
    'header' => esc_html__('Header-menu', 'promolod'),
    'header-2' => esc_html__('Header-2-menu', 'promolod')
));

/**  1.2 Register sidebar*/
add_action('widgets_init', 'promolod_widgets_init');
function promolod_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'promolod'),
        'id' => 'sidebar',
        'description' => 'Sidebar 1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}

/**  2. Styles and scripts registration  */
function promolod_scripts()
{
    /* 2.1 Main style.css  */
    wp_enqueue_style('promolod-style', get_stylesheet_uri());
    /* 2.2 Font Awesome  */
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

    /* 2.3 Google Fonts */
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,700');
    wp_enqueue_style('Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,300italic,300');

    /* 2.4 jQuery  */
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    wp_enqueue_script('jquery');
    /* 2.5 Accordion  */
	wp_enqueue_script('promolod-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(),
        '20151215', true);
    wp_enqueue_script('promolod-accordion', get_template_directory_uri() . '/js/script.js', array(), '20151215', true);

    /* 2.6 Fancybox */
    wp_enqueue_script('promolod-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array(),
        '20151215', true);

    /* Style Fancybox */
    wp_enqueue_style('promolod-fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css');
    wp_enqueue_style('promolod-fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.buttons.css');
    wp_enqueue_style('promolod-fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.thumbs.css');

}

add_action('wp_enqueue_scripts', 'promolod_scripts');


/** 3. customize excerpt */
function promolod_excerpt_length()
{
    return 25;
}

add_filter('excerpt_length', 'promolod_excerpt_length');
add_filter('excerpt_more', function ($more) {
    return '';
});


/**  4. Post thumbnail support */
add_theme_support('post-thumbnails');

function promolod_setup()
{

    /*Enable support for Post Formats. */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
    ));
}





/**
 * Customizer additions.
   5. Theme customizer declaration
 * 6. Social icons function */
require get_template_directory() . '/inc/customizer.php';


/** * 7. Post type registration  */
require get_template_directory() . '/inc/post-type-registrations.php';


add_filter( 'page_template', function ( $template )
{
    $page = get_queried_object();

    $alternative_template = locate_template( "pages/page-{$page->post_name}.php" );
    if (  $alternative_template )
        return $template = $alternative_template;
    return $template;
});
?>




