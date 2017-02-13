<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 */

?>
<div id="fb-root"></div>
<script>(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<section class="no-results not-found">
	<div class="container-elastic">
		<main id="main" class="site-main" role="main">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Тут зовсiм пусто. Готовi щось додати? <a href="%1$s">Натисни сюди</a>.',
					'promolod' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) )
				); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Нажаль, нiчого не знайдено. Спробуйте щось iнше.', 'promolod' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( "Здається ми не можемо знайти того, що ви шукаєте. Можливо, Вам допоможе 'пошук'",
					"promolod" ); ?></p>
			<?php
				get_search_form();

		endif; ?>
			</main> <!-- #main -->

	</div><!-- div.container-elastic -->
</section><!-- div.no-results -->
