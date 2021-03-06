<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header() ?>

<!--home content -->


<!--get projects-->
<section id="projects">

    <h3 class="home-section-title"><?php _e('Проекти', 'promolod') ?>
        <span>&#11042;</span></h3>
    <?php $project = new WP_Query(array('post_type' => 'projects')); ?>
    <ul class="home-projects" id="home-projects">
        <?php if ($project->have_posts()) : ?>
            <?php while ($project->have_posts()) :
                $project->the_post(); ?>

                <li class="lightbox project">
                    <a data-fancybox-type="ajax" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) :
                            the_post_thumbnail();
                        endif; ?>
                        <div class="rollover">
                            <div class="rollover-container">
                                <h2> <?php the_title(); ?> </h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>

            <button class="load-more"><?php echo __('Дивитися ще') ?></button>
            <button class="turn"><?php echo __('Згорнути') ?></button>

        <?php else :
            get_template_part('template-parts/content', 'none');
        endif; ?>
        <?php wp_reset_query(); ?>
    </ul>


</section> <!-- #projects -->

<!--get events-->
<section id="events">
    <div class="overlay">

        <?php
        $banner_image = get_theme_mod('banner_image', '');
        if (!empty($banner_image)) : ?>
            <style>
                #events {
                    background: url(<?php echo $banner_image ?>);
                    background-size: cover;
                    background-attachment: fixed;
                }
            </style>
        <?php endif; ?>

        <div class="container-elastic">

            <?php
            if ((get_theme_mod('section_title')) != false) {
                ?>
                <h3 class="home-section-title"><?php echo get_theme_mod('section_title');?>
                    <span>&#11042;</span></h3>
            <?php
            }

            ?>
            <?php $events = new WP_Query(array('post_type' => 'tribe_events')); ?>
            <ul class="home-events">
                <?php if ($events->have_posts()) : ?>
                    <?php while ($events->have_posts()) : $events->the_post(); ?>

                        <li class="home-event lightbox">
                            <a data-fancybox-type="ajax"
                               href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail();
                                endif; ?>

                                <div class="overlay">

                                    <h2> <?php /* cut title for events */
                                        $thetitle = $post->post_title;
                                        $getlength = strlen($thetitle);
                                        $thelength = 64;
                                        echo substr($thetitle, 0, $thelength);
                                        if ($getlength > $thelength) echo "...";

                                        ?></h2>

                                    <?php do_action('tribe_events_before_the_meta') ?>
                                    <div class="tribe-events-event-meta">
                                        <div class="author <?php echo esc_attr($has_venue_address); ?>">

                                            <!-- Schedule & Recurrence Details -->
                                            <div class="tribe-event-schedule-details">
                                                <?php echo tribe_events_event_schedule_details() ?>
                                            </div>

                                            <?php if ($venue_details) : ?>
                                                <!-- Venue Display Info -->
                                                <div class="tribe-events-venue-details">
                                                    <?php echo implode(', ', $venue_details); ?>
                                                </div> <!-- .tribe-events-venue-details -->
                                            <?php endif; ?>

                                        </div>
                                    </div><!-- .tribe-events-event-meta -->
                                    <?php the_excerpt(); ?>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <button class="event-load-more"><?php echo __('Дивитися ще') ?></button>
                    <button class="event-turn"><?php echo __('Згорнути') ?></button>
                    <?php
                endif;
                wp_reset_query(); ?>
            </ul>

        </div> <!-- div.container-elastic -->
    </div> <!-- .overlay -->
</section> <!-- #events -->

<!-- Start Google Map -->
<section id="google-map">
    <div class="overlay">
        <?php
        $banner_image = get_theme_mod('banner_image', '');
        if (!empty($banner_image)) : ?>
            <style>
                #google-map {
                    background: url(<?php echo $banner_image ?>);
                    background-size: cover;
                    background-attachment: fixed;
                }
            </style>
        <?php endif; ?>
        <?php dynamic_sidebar('sidebar_1'); ?>

        <!-- End Google Map -->


        <div id="about">

            <div class="container-elastic">

                <h3 class="home-section-title"><?php _e('Про нас', 'promolod') ?>
                    <span>&#11042;</span></h3>
                <?php echo do_shortcode('[insert page="about" display="content"]') ?>
                <div class="contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="317" title="Контактна форма 1"]'); ?>
                </div>
            </div> <!-- div.container-elastic -->

            <!-- End section About -->
            <?php get_footer() ?>
