<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();
?>

<div class="uk-width-1-3">
	<div class="tribe-events-meta-group-venue">
		<h3 class="tribe-events-single-section-title"> <?php printf(esc_html__('%s', 'megastar'), tribe_get_venue_label_singular()) ?> </h3>
		<dl>
			<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

			<dd class="tribe-venue"> <?php echo tribe_get_venue() ?> </dd>

			<?php if ( tribe_address_exists() ) : ?>
				<dd class="tribe-venue-location">
					<address class="tribe-events-address">
						<?php echo tribe_get_full_address(); ?>

						<?php if ( tribe_show_google_map_link() ) : ?>
							<?php echo tribe_get_map_link_html(); ?>
						<?php endif; ?>
					</address>
				</dd>
			<?php endif; ?>

			<?php if ( ! empty( $phone ) ): ?>
				<dt class="mb-10"><?php esc_html_e( 'Phone:', 'megastar') ?><span class="font-weight-300">&nbsp;<?php echo esc_attr($phone);?></span></dt>
				
			<?php endif ?>

			<?php if ( ! empty( $website ) ): ?>
				<dt> <?php esc_html_e( 'Website:', 'megastar') ?> </dt>
				<dd class="url"> <?php echo esc_url($website) ?> </dd>
			<?php endif ?>

			<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
		</dl>
	</div>
</div>
