<?php
/**
 * Map View Content
 * The content template for the map view of events. This template is also used for
 * the response that is returned on map view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/map/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list tribe-events-map">

	<!-- List Title -->
	<?php do_action( 'tribe_events_before_the_title' ); ?>
	<h2 class="tribe-events-page-title title text-uppercase"> Upcoming <span class="text-black"> Futsal<sup>&reg;</sup> Events</span></h2>
	<?php //do_action( 'tribe_events_after_the_title' ); ?>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	
	<!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ); ?>

	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>
		<div id="tribe-geo-results" class="tribe-events-loop">
			<?php tribe_get_template_part( 'pro/map/loop' ) ?>
		</div> <!-- #tribe-geo-results -->
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>

	<!-- List Footer -->
	<?php do_action( 'tribe_events_before_footer' ); ?>
	<div id="tribe-events-footer">

		<!-- Footer Navigation -->
		<?php do_action( 'tribe_events_before_footer_nav' ); ?>
		<?php //tribe_get_template_part( 'pro/map/nav', 'footer' ); ?>
		<?php do_action( 'tribe_events_after_footer_nav' ); ?>

	</div>
	<!-- #tribe-events-footer -->
	<?php //do_action( 'tribe_events_after_footer' ) ?>

</div><!-- #tribe-events-content -->
