<?php
/*
* Override Event views list
*/
$mini_cal_event_atts = tribe_events_get_widget_event_atts();

$post_date = tribe_events_get_widget_event_post_date();
$post_id   = get_the_ID();
$link = get_permalink();
$organizer_ids = tribe_get_organizer_ids();
$multiple_organizers = count( $organizer_ids ) > 1;
$address = tribe_get_address();
$city = tribe_get_city();
?>

	<?php if (
			tribe( 'tec.featured_events' )->is_featured( $post_id )
			&& get_post_thumbnail_id( $post_id )
		) { ?>
	<div class="box-hover-effect effect1 mb-15">
      	<div class="thumb"><a href="<?php echo $link; ?>"><?php the_post_thumbnail( $thumbnail_size , array('class' =>'img-fullwidth mb-0')); ?></a>
      	</div>
        <h5 class="text-uppercase letter-space-1 mb-0"><a href="<?php echo $link; ?>"><?php the_title();?></a></h5>
        <ul>

          <li class="text-gray-silver font-12"><?php if(tribe_get_start_date()){?><i class="fa fa-clock-o"></i>  <?php echo 'at '.tribe_get_start_date($post, false, $format = 'g:i A');}?> <?php if(tribe_get_end_date()) { echo ' - '.tribe_get_end_date($post, false, $format = 'g:i A');}?> <?php  if ( isset( $address ) && $address ) { ?><i class="fa fa-map-marker ml-10"></i> <?php echo $address; }?><?php  if ( isset( $city ) && $city ) {echo '&#32;'.$city; }?></li>
        </ul>
    </div>
    <?php }?>

