</div> <!-- #content -->

<footer class="site-footer">
    <div class="container-elastic">
        <ul class="contact-info">
            <li>
                <a href="mailto:<?php echo get_theme_mod('mail', ''); ?>"><span
                        class="fa fa-envelope-o"> </span> <?php echo get_theme_mod('mail', ''); ?></a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_theme_mod('address-map', ''); ?>"><span
                        class="fa fa-map-marker"> </span> <?php echo get_theme_mod('address', ''); ?></a>
            </li>
        </ul> <!-- ul.contact-info -->

        <?php my_social_media_icons(); ?> <!-- ul.social-media-icons -->

    </div> <!-- div.container-elastic -->
</footer>
</div> <!-- .overlay -->


</section> <!-- #about -->
</div> <!-- div.container -->

<?php wp_footer(); ?>


</body>
</html>
