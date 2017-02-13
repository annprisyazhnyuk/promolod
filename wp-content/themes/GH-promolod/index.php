<?php get_header() ?>
<div class="container-elastic">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="page-description">
                <h2 class="page-title"> <?php the_title(); ?> </h2>
                <?php        the_content();        ?>
            </div>
        <?php endwhile;
        else :
            get_template_part('template-parts/content', 'none');
        endif; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer() ?>
