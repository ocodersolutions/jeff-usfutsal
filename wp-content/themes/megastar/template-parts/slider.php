<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package megastar
 */


$megastar_show_rev_slider = get_post_meta( get_the_ID(), 'megastar_show_rev_slider', true );
$megastar_rev_slider = get_post_meta( get_the_ID(), 'megastar_rev_slider', true );

if(shortcode_exists("rev_slider") && ($megastar_show_rev_slider == 'yes')) : ?>

<div class="slider-wrapper" id="tmSlider">
	<div class="uk-container-center">
		<section class="tm-slider uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
			<div class="uk-width-1-1">
				<?php echo(do_shortcode('[rev_slider '.$megastar_rev_slider.']')); ?>
				
			</div>
		</section>
	</div>
</div>

<?php endif; ?>
