<?php

get_header(); ?>


    <div class="container-elastic">


        <?php $settings = array(
            'taxonomy' => 'type_partners',
            'orderby' => 'ID',
        );
        $cats = get_categories($settings);
        foreach ($cats as $cat) {

            echo "<h3 class='type-partners'>" . $cat->cat_name . "</h3>"; ?>


            <?php
            $args = array(
                'post_type' => 'partners',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_partners',
                        'field'    => 'id',
                        'terms'    => $cat->term_id,
                    ),
                )

            );

            $partner = new WP_Query( $args );


            if ($partner->have_posts()) : ?>
                <ul class="partners">
                    <?php while ( $partner->have_posts() ) {
                        $partner->the_post(); ?>

                        <li class="project-alumnus">

                            <a href="<?php echo get_post_meta(get_the_ID(), 'link_partners', TRUE); ?>"
                               target="_blank" class="mass-media-title">

                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail(array(215, 200));
                                endif; ?>

                            </a>

                        </li>


                        <?php ;
                    }
                    wp_reset_postdata();
                    ?>

                </ul>
            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>

            <?php
        } ?>


    </div><!-- .container-elastic -->
<?php get_footer(); ?>