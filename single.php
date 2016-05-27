<?php get_header(); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) :
    the_post(); ?>

    <div class="container-elastic">


    <div class="single-content">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail(array(550, 350)); } ?>
        <?php the_content(); ?>
    </div>

<?php endwhile; // End of the loop.
?>

<?php else :

    get_template_part('template-parts/content', 'none');

endif; ?>


    </div><!-- .container-elastic -->
<?php get_footer() ?>