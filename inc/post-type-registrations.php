<?php
/*      7.1 FAQ post type registration          */
/*      7.2 Alumnus post type registration      */
/*      7.3 Social media post type registration */
/*      7.4_1 Register post type: Partners      */
/*      7.4_2 Custom category for partners (type partners) */
/*      7.5 Social media post type registration */
/* */

/* -------------------------------- 7.1 FAQ post type registration ------------------------ */
add_action('init', 'promolod_faq');
function promolod_faq()
{
    register_post_type('faq', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor'
        ),
        'labels' => array(
            'name' => __('FAQ'),
            'promolod',
            'add_new' => 'Додати ще',
            'all_items' => 'Всi питання'
        )

    ));
}

/* ---------------------------- 7.2 Alumnus post type registration ----------------------- */
add_action('init', 'promolod_project_alumnus');
function promolod_project_alumnus()
{
    register_post_type('alumnus', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ),
        'labels' => array(
            'name' => __('Випускники'),
            'promolod',
            'add_new' => 'Додати ще',
            'all_items' => 'Дивитися всi'
        )
    ));
}

/* ------------------------------ 7.3 Social media post type registration -------------------- */
add_action('init', 'promolod_social_media');
function promolod_social_media()
{
    register_post_type('media', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'custom-fields',
            'excerpt'
        ),
        'labels' => array(
            'name' => __('Згадування в ЗМІ'),
            'promolod',
            'add_new' => 'Додати ще одне',
            'all_items' => 'Всі посилання'
        )
    ));
}


/* -------------------------------------- 7.4_1 Register post type: Partners ------------------ */

add_action('init', 'promolod_partners');

function promolod_partners()
{
    register_post_type('partners', array(
        'public' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'custom-fields'),
        'labels' => array(
            'name' => __('Нашi партнери'), 'promolod',
            'add_new' => 'Додати ще',
            'all_items' => 'Всi партнери',
        ),
    ));
}

?>


<?php

/* ------------------------- 7.4_2 Custom category for partners (type partners) ---------------- */

add_action('init', 'promolod_partner_taxonomy');

function promolod_partner_taxonomy()
{

    $labels = array(

        'name' => __('Категорiя партнерiв'),
        'singular_name' => __('Партнери'),
        'search_items' => __('Знайти'),
        'all_items' => __('Всi категорiї'),
        'add_new_item' => __('Додати нову категорiю'),
        'menu_name' => __('Категорiя партнерiв'),
    );

    $args = array(
        'labels' => $labels,

    );
    register_taxonomy('type_partners', 'partners', $args);
}

/* -------------------------------- 7.5 Projects post type registration --------------------- */
add_action('init', 'promolod_project_projects');
function promolod_project_projects()
{
    register_post_type('projects', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ),
        'labels' => array(
            'name' => __('Проекти'),
            'promolod',
            'add_new' => 'Додати ще',
            'all_items' => 'Дивитися всi'
        )
    ));
}

/* -------------------------------- 7.6 REPORTS post type registration ------------------------ */
add_action('init', 'promolod_report');
function promolod_report()
{
    register_post_type('report', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor'
        ),
        'labels' => array(
            'name' => __('Звіти'),
            'promolod',
            'add_new' => 'Додати ще',
            'all_items' => 'Всi звіти'
        )

    ));
}