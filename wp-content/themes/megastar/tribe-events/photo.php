<?php
/**
 * Photo View Template
 * The wrapper template for photo view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/photo.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} 
get_template_part( 'template-parts/events/titlebar' );  
?>

<?php do_action( 'tribe_events_before_template' ); ?>
<div class="bg_img_logo">
<div class="container">
<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

<!-- Main Events Content -->
<?php tribe_get_template_part( 'pro/photo/content' ) ?>
</div>
<?php
do_action( 'tribe_events_after_template' );
?>
</div>
