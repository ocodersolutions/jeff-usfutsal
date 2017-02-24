<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */


$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', esc_html__( 'Time:', 'megastar'), $event_id );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>

<div class="uk-width-1-3">
	<div class="tribe-events-meta-group-details">
		<h3 class="tribe-events-single-section-title"> <?php esc_html_e( 'Details', 'megastar') ?> </h3>
		<dl>

			<?php
			do_action( 'tribe_events_single_meta_details_section_start' );

			// All day (multiday) events
			if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
				?>

				<dt> <?php esc_html_e( 'Start:', 'megastar') ?> </dt>
				<dd>
					<abbr class="tribe-events-abbr tribe-events-start-datetime published dtstart" title="<?php printf(esc_attr__('%s', 'megastar'), $start_ts) ?>"> <?php printf(esc_html__('%s', 'megastar'),$start_time) ?> </abbr>
				</dd>

				<dt> <?php esc_html_e( 'End:', 'megastar') ?> </dt>
				<dd>
					<abbr class="tribe-events-abbr dtend" title="<?php printf(esc_attr__('%s', 'megastar'), $end_ts) ?>"> <?php printf(esc_html__('%s', 'megastar'),$end_time) ?> </abbr>
				</dd>

			<?php
			// All day (single day) events
			elseif ( tribe_event_is_all_day() ):
				?>

				<dt> <?php esc_html_e( 'Date:', 'megastar') ?> </dt>
				<dd>
					<abbr class="tribe-events-abbr tribe-events-start-datetime published dtstart" title="<?php printf(esc_attr__('%s', 'megastar'), $start_ts) ?>"> <?php printf(esc_html__('%s', 'megastar'),$start_date) ?> </abbr>
				</dd>

			<?php
			// Multiday events
			elseif ( tribe_event_is_multiday() ) :
				?>

				<dt> <?php esc_html_e( 'Start:', 'megastar') ?> </dt>
				<dd>
					<abbr class="tribe-events-abbr updated published dtstart" title="<?php printf(esc_attr__('%s', 'megastar'), $start_ts) ?>"> <?php printf(esc_html__('%s', 'megastar'),$start_datetime) ?> </abbr>
				</dd>

				<dt> <?php esc_html_e( 'End:', 'megastar') ?> </dt>
				<dd>
					<abbr class="tribe-events-abbr dtend" title="<?php printf(esc_attr__('%s', 'megastar'), $end_ts) ?>"> <?php printf(esc_html__('%s', 'megastar'), $end_datetime) ?> </abbr>
				</dd>

			<?php
			// Single day events
			else :
				?>

				<dt><em><?php esc_html_e( 'Start:', 'megastar') ?></em></dt>
				<dd>
					<abbr class="tribe-events-abbr tribe-events-start-date published dtstart" title="<?php printf(esc_attr__('%s', 'megastar'), $start_ts) ?>"> <?php echo tribe_get_start_date( null, false, $time_format ); ?> </abbr>
				</dd>
				<dt><em><?php esc_html_e( 'End:', 'megastar') ?></em></dt>
				<dd>
					<div class="tribe-events-abbr tribe-events-start-time published dtstart" title="<?php printf(esc_attr__('%s', 'megastar'), $end_ts) ?>">
						<?php echo $end_time; ?>
					</div>
				</dd>

			<?php endif ?>

			<?php
			// Event Cost
			if ( ! empty( $cost ) ) : ?>

				<dt> <?php esc_html_e( 'Cost:', 'megastar') ?> </dt>
				<dd class="tribe-events-event-cost"> <?php printf(esc_html__('%s', 'megastar'),$cost); ?> </dd>
			<?php endif ?>

			<?php
			echo tribe_get_event_categories(
				get_the_id(), array(
					'before'       => '',
					'sep'          => ', ',
					'after'        => '',
					'label'        => null, // An appropriate plural/singular label will be provided
					'label_before' => '<dt>',
					'label_after'  => '</dt>',
					'wrap_before'  => '<dd class="tribe-events-event-categories">',
					'wrap_after'   => '</dd>',
				)
			);
			?>

			<?php echo tribe_meta_event_tags( sprintf( esc_html__( '%s Tags:', 'megastar'), tribe_get_event_label_singular() ), ', ', false ) ?>

			<?php
			// Event Website
			if ( ! empty( $website ) ) : ?>

				<dt> <?php esc_html_e( 'Website:', 'megastar') ?> </dt>
				<dd class="tribe-events-event-url"> <?php echo esc_url($website); ?> </dd>
			<?php endif ?>

			<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
		</dl>
	</div>
</div>
