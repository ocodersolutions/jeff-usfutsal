<?php
/**
 * Single Event Meta Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta.php
 *
 * @package TribeEventsCalendar
 */

do_action( 'tribe_events_single_meta_before' );

// Check for skeleton mode (no outer wrappers per section)
$not_skeleton = ! apply_filters( 'tribe_events_single_event_the_meta_skeleton', false, get_the_ID() );

// Do we want to group venue meta separately?
$set_venue_apart = apply_filters( 'tribe_events_single_event_the_meta_group_venue', false, get_the_ID() );
?>

<?php if ( $not_skeleton ) : ?>
	<div class="tribe-events-single-section primary tribe-clearfix "><div class="uk-grid">
<?php endif; ?>
<div class="col-sm-6">
	<div class="row">
<?php
 do_action( 'tribe_events_single_event_after_the_content' );
do_action( 'tribe_events_single_event_meta_primary_section_start' );

// Always include the main event details in this first section
tribe_get_template_part( 'modules/meta/details' );

// If we have no map to embed and no need to keep the venue separate...
if ( ! $set_venue_apart && ! tribe_embed_google_map() ) {
	tribe_get_template_part( 'modules/meta/venue' );
} elseif ( ! $set_venue_apart && ! tribe_has_organizer() && tribe_embed_google_map() ) {
	// If we have no organizer, no need to separate the venue but we have a map to embed...
	tribe_get_template_part( 'modules/meta/venue' );
	?>
	<div class="tribe-events-back text-left text-uppercaes">
		<a class="btn btn-dark btn-theme-colored btn-flat btn-sm " href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( esc_html__( 'VIEW MORE EVENTS', 'megastar'), $events_label_plural ); ?></a>
	</div>
	<?php
	echo '</div></div>';
	echo '<div class="col-sm-6">';
	tribe_get_template_part( 'modules/meta/map' );
	echo '</div>';
} else {
	// If the venue meta has not already been displayed then it will be printed separately by default
	$set_venue_apart = true;
}

// Include organizer meta if appropriate
if ( tribe_has_organizer() ) {
	tribe_get_template_part( 'modules/meta/organizer' );
}

if ($set_venue_apart) {
tribe_get_template_part( 'modules/meta/venue' );
	
}
do_action( 'tribe_events_single_event_meta_primary_section_end' );
?>

<?php if ( $not_skeleton ) : ?>
	</div></div>
<?php endif; ?>


<?php if ( $set_venue_apart ) : ?>
	<?php if ( $not_skeleton ) : ?>
		<div class="tribe-events-single-section tribe-events-event-meta secondary tribe-clearfix"><div class="uk-grid">
	<?php endif; ?>

	<?php
	do_action( 'tribe_events_single_event_meta_secondary_section_start' );

	tribe_get_template_part( 'modules/meta/map' );

	do_action( 'tribe_events_single_event_meta_secondary_section_end' );
	?>
	<?php
	if ( $not_skeleton ) : ?>
		</div></div>
	<?php endif; ?>
<?php
endif;
do_action( 'tribe_events_single_meta_after' );
