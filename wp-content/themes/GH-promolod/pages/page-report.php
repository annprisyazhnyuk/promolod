<?php /** Template Name: Report */ ?>

<?php get_header() ?>

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

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h2 class="page-title blog-description"> <?php the_title(); ?> </h2>
            <?php        the_content();        ?>

        <?php endwhile; endif; ?>
        <?php

        $args = array('posts_per_page' => 10, 'post_type' => 'report');
        $report = new WP_Query($args);
        if ($report->have_posts()) : while ($report->have_posts()) : $report->the_post(); ?>


            <article class="blog-post">
                <a class="blog-title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                <span class="author-blog info">Автор: <?php the_author(); ?></span>
                <span class="date-blog info"><?php the_date(); ?></span>

                <?php if (has_post_thumbnail()) : ?>
                    <a class="blog-thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(620, 400)); ?></a>
                <?php endif; ?>

                <?php the_excerpt(); ?> <a class="read-more" href="<?php echo get_permalink(); ?>">Читати далі</a>
            </article>


        <?php endwhile; ?>


        <?php  else :
            get_template_part('template-parts/content', 'none');
        endif; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer() ?>
