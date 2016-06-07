<?php get_header(); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) :
    the_post(); ?>

    <div class="container-elastic">


    <div class="single-blog-post">
        <h2 class="blog-title"><?php the_title(); ?></h2>


        <span class="author-blog info">Автор: <?php the_author(); ?></span>
        <span class="date-blog info"><?php the_date(); ?></span>

        <?php if (has_post_thumbnail()) {
            the_post_thumbnail(array(1000, 650)); } ?>
        <?php the_content(); ?>

        <div class="page-nav">
            <div class="page-nav-next">
<!--               <span>Попередня</span>-->
                <?php echo next_post_link('%link') ?>
            </div>
            <div class="page-nav-back">
<!--                <span>Наступна</span>-->
                <?php echo previous_post_link('%link') ?>
            </div>
        </div>

    </div>

<?php endwhile; // End of the loop.
?>

<?php else :

    get_template_part('template-parts/content', 'none');

endif; ?>


    </div><!-- .container-elastic -->
<?php get_footer() ?>