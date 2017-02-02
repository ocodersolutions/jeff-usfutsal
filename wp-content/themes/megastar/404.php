<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package megastar
 */

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found uk-text-center">


				<div class="uk-vertical-align-middle uk-container-center uk-margin-large-bottom uk-margin-large-top">

					<img src="<?php echo get_template_directory_uri() . '/images/404.svg'; ?>" alt="<?php esc_html_e("Page Not Found", "megastar"); ?>">

					<p class="uk-margin-large-top"><?php 
						$err_history_link = '<a href="javascript:history.go(-1)">'.esc_html__("Go back", "megastar").'</a>';
						$err_home_link = '<a href="'.home_url('/').'">'.get_bloginfo('name').'</a>';

						printf(esc_html__("The Page you are looking for doesn't exist or an other error occurred. %s or head over to %s %s homepage to choose a new direction.", "megastar"), $err_history_link , '<br class="uk-hidden-small">' , $err_home_link ); ?></p>

				</div>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
