<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
get_template_part( 'template-parts/events/titlebar' );  
do_action( 'tribe_events_before_template' );
?>
<div class="bg_img_logo">
<div class="container">
<?php
    // Tribe Bar
tribe_get_template_part( 'modules/bar' );

// Main Events Content
tribe_get_template_part( 'month/content' );
?>
</div>
    <?php
do_action( 'tribe_events_after_template' ); ?>
</div>