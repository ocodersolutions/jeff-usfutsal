<div class="portfolio-wide">

	<?php if( get_post_meta( get_the_ID(), 'megastar_embed', true ) == "" ){ ?>

		<div class="portfolio-noslider">
			<?php $images = rwmb_meta( 'megastar_screenshot', 'type=image_advanced&size=standard' );
				foreach ( $images as $image ) {
					echo "<div class='noslide'><img src='".esc_url($image['url'])."' width='".esc_attr($image['width'])."' height='".esc_attr($image['height'])."' alt='".esc_attr($image['alt'])."' /></div>";
				} 
			?>
		</div>
			    
	<?php } else { ?>
			    
	    <div id="portfolio-embed">
		   <?php if (get_post_meta( get_the_ID(), 'megastar_source', true ) == 'videourl') {
		    	$embed_code = esc_url(get_post_meta( get_the_ID(), 'megastar_embed', true ));
		    	echo wp_oembed_get($embed_code); // No need to escape here
		    }  
		    else {  
		        echo wp_kses(get_post_meta( get_the_ID(), 'megastar_embed', true ), megastar_expand_allowed_tags()); 
		    } ?>
	    </div>
	    
	<?php } ?>
		
	<div class="portfolio-detail-title">
		<h3><?php the_title(); ?></h3>
	</div>

	<div class="uk-grid">
		<div class="portfolio-detail-description <?php if( get_post_meta( get_the_ID(), 'megastar_portfolio_details', true ) == 1 ) { echo 'uk-width-large-2-3'; } else { echo 'uk-width-large-1-1'; } ?>">
			<div class="portfolio-detail-description-text"><?php the_content(); ?></div>
		</div>
		
		<?php if( get_post_meta( get_the_ID(), 'megastar_portfolio_details', true ) == 1 ) { ?>
			<div class="portfolio-detail-attributes uk-width-large-1-3">
				<ul data-uk-sticky="{boundary: true, top: 15}">
					<?php if( get_post_meta( get_the_ID(), 'megastar_portfolio_client', true ) != "") { ?>
					<li class="clearfix"><strong><?php esc_html_e('Client', 'megastar'); ?></strong> <span><?php echo esc_html(get_post_meta( get_the_ID(), 'megastar_portfolio_client', true )); ?></span></li>
					<?php } ?>	
					<li class="clearfix"><strong><?php esc_html_e('Date', 'megastar'); ?></strong> <span><?php the_date() ?></span></li>
					<li class="clearfix"><strong><?php esc_html_e('Tags', 'megastar'); ?></strong> <span><?php $taxonomy = strip_tags( get_the_term_list($post->ID, 'portfolio_filter', '', ', ', '') ); echo esc_html($taxonomy); ?></span></li>
					<?php if( get_post_meta( get_the_ID(), 'megastar_portfolio_link', true ) != "") { ?>
					<li class="clearfix"><strong><?php esc_html_e('URL', 'megastar'); ?></strong> <span><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'megastar_portfolio_link', true )); ?>" target="_blank"><?php esc_html_e('View Project', 'megastar'); ?></a></span></li>
					<?php } ?>	
				</ul>
			</div>
		<?php } ?>		
	</div>
	
</div> <!-- End of portfolio-wide -->