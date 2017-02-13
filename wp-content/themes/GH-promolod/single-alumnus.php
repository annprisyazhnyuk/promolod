
<?php
while (have_posts()) :
    the_post(); ?>


    <div class="single-post">
        <h2 class="post-title"><?php the_title(); ?></h2>

        <?php if (has_post_thumbnail()) {
            the_post_thumbnail(array(350, 350));
        } ?>

        <?php the_content(); ?>
    </div>


<?php endwhile; // End of the loop.
?>
