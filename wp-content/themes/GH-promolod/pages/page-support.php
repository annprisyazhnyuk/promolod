<?php if (have_posts()) : ?>

<?php while (have_posts()) :
the_post(); ?>

<div class="container-elastic">

    <div class="support-page">
        <h2 class="post-title"><?php the_title(); ?></h2>

        <div class="type-support">
                <?php the_content(); ?>
        </div>
    </div>

    <?php endwhile; // End of the loop.
    ?>

    <?php endif; ?>


</div><!-- div.container-elastic -->
