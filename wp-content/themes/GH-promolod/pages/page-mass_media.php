<?php
get_header();
?>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

<?php
while (have_posts()):
    the_post();
    ?>
    <div class="container-elastic">
        <main id="main" class="site-main" role="main">
            <h2 class="page-title"> <?php the_title(); ?> </h2>
            <div class="page-description">
                <?php the_content(); ?>
            </div>

            <?php
            $media = new WP_Query(array(
                'post_type' => 'media',
                'posts_per_page' => 6
            ));
            ?>

            <?php
            if ($media->have_posts()):
                ?>

                <ul class="mass-media">

                    <?php
                    $currentdate = ''; ?>

                    <?php
                    while ($media->have_posts()):
                    $media->the_post(); ?>

                    <?php if ($currentdate != get_the_date('F Y')) {
                    $currentdate = get_the_date('F Y');
                    ?>
                    <li class="month-mass-media">
                        <h3 class="title-publication-mass-media">
                            <?php echo $currentdate; ?>
                        </h3>
                        <?php } ?>


                        <div class="date-publication-mass-media">
                    <span class="media-date">
                        <span class="date-day"><?php
                            echo get_the_date('j');
                            ?>
                        </span>
                        <span class="date-month"><?php
                            echo get_the_date('F');
                            ?>
                        </span>
                    </span>
                            <div class="content-mass-media">
                                <?php
                                if (has_post_thumbnail()) :
                                    the_post_thumbnail(array(330, 230));
                                endif;


                                $meta_value = get_post_meta(get_the_ID(), 'address', true);
                                if (!empty($meta_value)) { ?>

                                    <a href="<?php echo $meta_value; ?>"
                                       target="_blank" class="mass-media-title">
                                        <?php the_title(); ?>
                                    </a>
                                <?php } else { ?>

                                    <h3> <?php the_title(); ?></h3>

                                <?php } ?>


                                <?php if (!empty($meta_value)) { ?>

                                    <a href="<?php echo $meta_value; ?>"
                                       target="_blank" class="mass-media-title">
                                        <?php the_excerpt(); ?>
                                    </a>
                                <?php } else { ?>

                                    <h3> <?php the_excerpt(); ?></h3>

                                <?php } ?>
                                

                            </div>
                        </div>

                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>

                    </li>
                </ul>

                <?php
            else:
                get_template_part('template-parts/content', 'none');
            endif; ?>

            <?php
            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->

        <?php
        get_sidebar();
        ?>

    </div><!-- .container-elastic -->
<?php
get_footer();
?>