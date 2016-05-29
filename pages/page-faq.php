
<?php
get_header(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="container-elastic">
        <main id="main" class="site-main" role="main">
            <h2 class="page-title"> <?php the_title(); ?> </h2>
            <div class="page-description">
                <?php        the_content();        ?>
            </div>
            <?php
            while (have_posts()) : the_post(); ?>
                <?php $question = new WP_Query(array('post_type' => 'faq', 'posts_per_page' => -1)); ?>
                <?php if ($question->have_posts()) : ?>
                    <div class="accordion">
                        <ul class="question">
                            <?php while ($question->have_posts()) : $question->the_post(); ?>
                                <li>
                                    <h2 class="question-title"> <?php the_title(); ?> </h2>
                                    <div class="answer"> <?php the_content(); ?> </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>  <!-- .according -->
                <?php else :
                    get_template_part('template-parts/content', 'none');
                endif; ?>
                <?php wp_reset_query(); ?>
                <?php
            endwhile; // End of the loop.
            ?>
        </main><!-- #main -->
        <?php get_sidebar(); ?>
    </div><!-- .container-elastic -->
<?php
get_footer();
