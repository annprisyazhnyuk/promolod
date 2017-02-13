<?php
/* 5. Theme customizer declaration  */
/*      5.1 Social icons customizer */
/*      5.2 Footer data customizer  */
/*      5.3 header logo customizer  */
/*   Social icons function          */

function my_customizer_social_media_array()
{
    $social_sites = array(
        'twitter',
        'facebook',
        'google-plus',
        'flickr',
        'pinterest',
        'youtube',
        'tumblr',
        'dribbble',
        'rss',
        'linkedin',
        'instagram',
        'email',
        'vk'
    );
    return $social_sites;
}

add_action('customize_register', 'my_add_social_sites_customizer');
function my_add_social_sites_customizer($wp_customize)
{
    /* ------------------------------ 5.1 Social icons customizer -------------------------- */
    $wp_customize->add_section('my_social_settings', array(
        'title' => __('Social Media Icons', 'promolod'),
        'priority' => 35
    ));
    $social_sites = my_customizer_social_media_array();
    $priority = 5;
    foreach ($social_sites as $social_site) {
        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'promolod'),
            'section' => 'my_social_settings',
            'type' => 'text',
            'priority' => $priority
        ));
        $priority = $priority + 5;
    }

    /* ------------------------------------- 5.2 Footer data customizer ------------------------ */
    $wp_customize->add_section('promolod_footer_data', array(
        'title' => __('Footer data', 'promolod'),
        'priority' => 120
    ));
    $wp_customize->add_setting('mail', array(
        'default' => 'mail@host.com',
        'transport' => 'refresh'
    ));
    $wp_customize->add_setting('address', array(
        'default' => 'Street City 123',
        'transport' => 'refresh'
    ));
    $wp_customize->add_setting('address-map', array(
        'default' => '',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'mail-input', array(
        'label' => __('Email', 'promolod'),
        'section' => 'promolod_footer_data',
        'settings' => 'mail',
        'priority' => 1
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'address-input', array(
        'label' => __('Address', 'promolod'),
        'section' => 'promolod_footer_data',
        'settings' => 'address',
        'priority' => 1
    )));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'address-map', array(
        'label' => __('Google maps link', 'promolod'),
        'section' => 'promolod_footer_data',
        'settings' => 'address-map',
        'priority' => 1
    )));
    /* ------------------------------------- 5.3 header logo customizer -------------------- */
    $wp_customize->add_section('promolod_logo_img', array(
        'title' => __('Logo image', 'promolod'),
        'priority' => 120
    ));
    $wp_customize->add_setting('image', array(
        'default' => 'none',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
        'label' => __('Logo image', 'promolod'),
        'section' => 'promolod_logo_img',
        'settings' => 'image',
        'priority' => 1
    )));
	
	/*-----------------------------------  background IMG customizer ---------------------------------------------*/
        $wp_customize->add_section('promolod_banner_img', array(
            'title' => __('BACKGROUND IMG', 'promolod'),
            'priority' => 120
        ));
        $wp_customize->add_setting('banner_image', array(
            'default' => 'none',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'promolod_banner_img_control', array(
            'label' => __('IMG for background', 'promolod'),
            'section' => 'promolod_banner_img',
            'settings' => 'banner_image',
            'priority' => 1
        )));


    /*-----------------------------------  header IMG customizer ---------------------------------------------*/
    $wp_customize->add_section('promolod_banner_img_header', array(
        'title' => __('HEADER IMG', 'promolod'),
        'priority' => 120
    ));
    $wp_customize->add_setting('banner_image_header', array(
        'default' => 'none',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'promolod_header_img_control', array(
        'label' => __('IMG for header banner', 'promolod'),
        'section' => 'promolod_banner_img_header',
        'settings' => 'banner_image_header',
        'priority' => 1
    )));

    /*-----------------------------------  Title on Home page customizer ---------------------------------------------*/
    $wp_customize->add_section('promolod_title', array(
        'title' => __('TITLE section Events on Home page', 'promolod'),
        'priority' => 120
    ));
    $wp_customize->add_setting('section_title', array(
        'default' => 'none',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'promolod_title_control', array(
        'label' => __("Введіть назву секції 'Події'", 'promolod'),
        'section' => 'promolod_title',
        'settings' => 'section_title',
        'priority' => 1
    )));
}

/* -------------------------------------------- Social icons function ---------------------- */
function my_social_media_icons()
{
    $social_sites = my_customizer_social_media_array();
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }
    if (!empty($active_sites)) {
        echo "<ul class='social-media-icons'>";
        foreach ($active_sites as $active_site) {
            $class = 'fa fa-' . $active_site;
            if ($active_site == 'email') {
                ?>
                <li>
                    <a class="email" target="_blank"
                       href="mailto:<?php
                       echo antispambot(is_email(get_theme_mod($active_site)));
                       ?>">
                        <i class="fa fa-envelope" title="<?php
                        _e('email icon', 'promolod');
                        ?>"></i>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a class="<?php
                    echo $active_site;
                    ?>" target="_blank"
                       href="<?php
                       echo esc_url(get_theme_mod($active_site));
                       ?>">
                        <i class="<?php
                        echo esc_attr($class);
                        ?>"
                           title="<?php
                           printf(__('%s icon', 'promolod'), $active_site);
                           ?>"></i>
                    </a>
                </li>
                <?php
            }
        }
        echo "</ul>";
    }
}

?>
