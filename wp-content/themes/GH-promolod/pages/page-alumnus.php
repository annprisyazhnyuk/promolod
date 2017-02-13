<?php
get_header(); ?>
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
while (have_posts()) :
    the_post(); ?>

    <div class="container-elastic alumnus">

        <h2 class="page-title" id="title-alumnus"> <?php the_title(); ?> </h2>
        <div class="alumnus-description">
            <?php the_content(); ?>
        </div>


        <main id="main" class="site-main" role="main">
            <?php $project = new WP_Query(array('post_type' => 'alumnus', 'posts_per_page' => 6)); ?>

            <?php if ($project->have_posts()) : ?>

                <?php echo do_shortcode('[ajax_load_more post_type="alumnus" button_label="Більше публікацій" button_loading_label="Завантаження постів"   posts_per_page="6" ]') ?>


            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>

            <?php wp_reset_query(); ?>

            <?php endwhile; // End of the loop.
            ?>

        </main><!-- #main -->

        <?php get_sidebar(); ?>

    </div><!-- .container-elastic -->
<?php get_footer() ?>