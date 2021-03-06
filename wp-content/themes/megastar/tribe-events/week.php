<?php
/**
 * Week View Template
 * The wrapper template for week view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/week.php
 *
 * @package TribeEventsCalendar
 *
 * @version 4.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} 

get_template_part( 'template-parts/events/titlebar' );  
?>

<?php do_action( 'tribe_events_before_template' ) ?>
<div class="bg_img_logo">
<div class="container">
	<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

	<!-- Main Events Content -->
<?php tribe_get_template_part( 'pro/week/content' ) ?>
</div>
<?php
do_action( 'tribe_events_after_template' );?>
</div>
