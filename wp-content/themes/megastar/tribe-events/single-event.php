<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

// Layout
$sidebar = (is_active_sidebar('event-calender')) ? get_theme_mod('megastar_blog_layout', 'sidebar-right') : '';

if($sidebar == 'sidebar-left'){
	$mainlayout = 'uk-width-medium-7-10 uk-push-3-10';
	$sidebarlayout = 'uk-row-first uk-width-medium-3-10 uk-pull-7-10';
}
elseif($sidebar == 'sidebar-right'){
	$mainlayout = 'uk-row-first uk-width-medium-7-10';
	$sidebarlayout = 'uk-width-medium-3-10';
} 
else{
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} ?>

<div id="page-wrap" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="" >
	<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
		<main class="tm-content">

			<div id="tribe-events-content" class="tribe-events-single">

				<p class="tribe-events-back">
					<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'megastar'), $events_label_plural ); ?></a>
				</p>

				<!-- Notices -->
				<?php tribe_the_notices() ?>

				<?php $tribe_cost = ( tribe_get_cost() ) ? '<span class="tribe-events-cost">'.tribe_get_cost( null, true ).'</span>' : ''; ?>

				<?php the_title( '<h1 class="tribe-events-single-event-title">', $tribe_cost . '</h1>' ); ?>

				<div class="tribe-events-schedule tribe-clearfix">
					<?php echo tribe_events_event_schedule_details( $event_id, '', '' ); ?>
				</div>

				<!-- Event header -->
				<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
					<!-- Navigation -->
					<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'megastar'), $events_label_singular ); ?></h3>
					<ul class="tribe-events-sub-nav">
						<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
						<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
					</ul>
					<!-- .tribe-events-sub-nav -->
				</div>
				<!-- #tribe-events-header -->

				<?php while ( have_posts() ) :  the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Event featured image, but exclude link -->
						<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

						<!-- Event content -->
						<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
						<div class="tribe-events-single-event-description tribe-events-content">
							<?php the_content(); ?>
						</div>
						<!-- .tribe-events-single-event-description -->
						<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

						<!-- Event meta -->
						<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
						<?php tribe_get_template_part( 'modules/meta' ); ?>
						<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
					</div> <!-- #post-x -->
					<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
				<?php endwhile; ?>

				<!-- Event footer -->
				<div id="tribe-events-footer">
					<!-- Navigation -->
					<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'megastar'), $events_label_singular ); ?></h3>
					<ul class="tribe-events-sub-nav">
						<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
						<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
					</ul>
					<!-- .tribe-events-sub-nav -->
				</div>
				<!-- #tribe-events-footer -->

			</div><!-- #tribe-events-content -->
		</main>
	</div>

	<?php if(($sidebar == 'sidebar-left' or $sidebar == 'sidebar-right') and is_singular() and tribe_is_event()){ ?>
		<aside id="tm-sidebar" class="tm-sidebar <?php echo esc_attr($sidebar); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php dynamic_sidebar('event-calender'); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div>