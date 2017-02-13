<?php get_header() ?>
<div class="container-elastic">
    <main id="main" class="site-main" role="main">
        <div class="not-found">
            <h2><?php _e('На жаль, вказаної вами сторінки ще не існує.','promolod'); ?></h2>
            <p><?php _e('Ви можете повернутися на ','promolod'); ?>
                <a class="home-page-button" href="<?php echo get_home_url(); ?>">
                <?php _e('головну сторінку.','promolod'); ?></a>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer() ?>
