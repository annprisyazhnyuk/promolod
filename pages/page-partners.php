<?php

get_header();
?>
<?php
while (have_posts()):
the_post();
?>

<div class="container-elastic">
    <div class="page-description">
        <?php the_content(); ?>
    </div>
    <?php $partner = new WP_Query(array('post_type' => 'partners')); ?>

    <?php if ($partner->have_posts()) : ?>


        <?php $settings = array(
            'taxonomy' => 'type_partners',
        );
        $cats = get_categories($settings);
        foreach ($cats as $cat) {
            echo "<h3 class='type-partners'>" . $cat->cat_name . "</h3>";
            $catid = $cat->cat_ID;


            $args = array(
                'post_type' => 'partners',
                'posts_per_page' => 10,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_partners',
                        'field' => 'id',
                        'terms' => $catid
                    )
                )
            );
            $query = new WP_Query($args); ?>

            <ul class="partners">

                <?php while ($partner->have_posts()) : $partner->the_post();
                    $category = get_the_terms($post->ID, $settings); ?>


                    <?php
                    if ($category[0]->term_id == $cat->cat_ID): ?>

                        <li class="project-alumnus">

                            <a href="<?php echo get_post_meta(get_the_ID(), 'link_partners', TRUE); ?>"
                               target="_blank" class="mass-media-title">

                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail(array(215, 200));
                                endif; ?>

                            </a>

                        </li>

                    <?php endif; ?>

                <?php endwhile; ?>
            </ul>

        <?php } ?>

    <?php else:
        get_template_part('template-parts/content', 'none');
    endif; ?>

    <?php wp_reset_query(); ?>


    <?php endwhile; // End of the loop.
    ?>


</div><!-- .container-elastic -->
<?php get_footer(); ?>