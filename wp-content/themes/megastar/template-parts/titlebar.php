<?php

$megastar_titlebar_show = rwmb_meta('megastar_header');

if ( $megastar_titlebar_show !== 'hide') : ?>

	<?php 
		global $post;
		$titlebar_bg_image   = '';
		$post_titlebar_style = '';
		if (is_category(3)){
			$blog_title = 'U.S. Futsal News';
		}
		
		$blog_title          = get_theme_mod('megastar_blog_title', 'U.S. Futsal News');
		$woocommerce_title   = get_theme_mod('megastar_woocommerce_title', 'Shop');
		$megastar_titlebar = get_post_meta( get_the_ID(), 'megastar_titlebar', true );
		$right_side          = (get_post_meta( get_the_ID(), 'megastar_titlebar', true ) == 'default' or empty($megastar_titlebar)) ? get_theme_mod('megastar_right_element', 'back_button') : get_post_meta( get_the_ID(), 'megastar_right_side', true );

		if (get_post_meta( get_the_ID(), 'megastar_titlebar', true) == 'default') {
			$global_header     = get_theme_mod('megastar_global_header', 'title');
			$titlebar_style    = get_theme_mod('megastar_titlebar_style', 'titlebar-light');
			$titlebar_bg_image = (get_theme_mod('megastar_titlebar_bg_image')) ? 'style="background-image: url( ' .get_theme_mod('megastar_titlebar_bg_image') . ');"' : '';
		} else {
			$global_header  = (get_post_meta( get_the_ID(), 'megastar_titlebar', true)) ? get_post_meta( get_the_ID(), 'megastar_titlebar', true) : get_theme_mod('megastar_global_header', 'title');
			$titlebar_style = (get_post_meta( get_the_ID(), 'megastar_titlebar_style', true)) ? get_post_meta( get_the_ID(), 'megastar_titlebar_style', true) : 'titlebar-dark';

			if (get_post_meta( get_the_ID(), 'megastar_titlebar_bg_image', true)) {
				$titlebar_bg_image = 'style="background-image: url( ';
				$images            = rwmb_meta( "megastar_titlebar_bg_image", "type=image_advanced&size=standard" );
				foreach ( $images as $image ) { 
					$titlebar_bg_image .= esc_url($image["url"]); 
				}

				 $titlebar_bg_image .= ' );"';
			}
		}

		if (rwmb_meta( "megastar_headerimage", "type=image_advanced&size=standard" )) {
			$post_titlebar_style = 'style="background-image: url( ';
			$images = rwmb_meta( "megastar_headerimage", "type=image_advanced&size=standard" );
			foreach ( $images as $image ) { 
			 	$post_titlebar_style .= esc_url($image["url"]); 
			}
			 $post_titlebar_style .= ' );"';
		}
	?>

	<?php if( is_object($post) && !is_archive() &&!is_search() && !is_404() && !is_author() && !is_home() && !is_page() ) { ?>

		<?php if(rwmb_meta('megastar_titlebar') != 'default' && rwmb_meta('megastar_titlebar') != '') { ?>

			<?php if (rwmb_meta('megastar_titlebar') == 'title') { ?>

				<section class="inner-header divider parallax layer-overlay <?php echo esc_attr($titlebar_style); ?>" data-bg-img="<?php echo get_theme_mod('megastar_titlebar_bg_image') ? get_theme_mod('megastar_titlebar_bg_image') : 'http://placehold.it/1920x1280' ?>" <?php // echo wp_kses_post($titlebar_bg_image); ?>>
                      <div class="container">
                        <!-- Section Content -->
                        <div class="section-content">
                          <div class="row"> 
                            <div class="col-md-12">
                              <h2 class="title text-white"><?php echo esc_html($title); ?></h2>
                              <h4 class="text-theme-colored letter-space-3 font-weight-400 text-uppercase">Only he who can see the invisible can do the impossible. </h4>
                               
                                <?php if($right_side == 'breadcrumb') : ?>
                                <?php echo megastar_breadcrumbs(); ?>
                                <?php elseif ($right_side == 'back_button') : ?>
                                        <div class="heading-back-button">
                                                <a class="back-btn" onclick="history.back()"><i class="uk-icon-arrow-left"></i> <?php esc_html_e('Back', 'megastar'); ?></a>
                                        </div>
                                <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

				<?php ///////////////////////////////////////////////////////////////////////////////////////// ?>
						
			<?php } elseif (rwmb_meta('megastar_titlebar') == 'featuredimagecenter') { ?>

						<div id="tmTitleBar1" class="tm-titlebar titlebar-image-center <?php echo esc_attr($titlebar_style); ?>" <?php echo esc_attr($post_titlebar_style); ?>>
							<div class="uk-container uk-container-center">
								<div class="uk-grid">
									<div class="uk-width-1-1 uk-text-center">
										<h1><?php echo esc_html($title); ?></h1>
										<?php if($right_side == 'breadcrumb') : ?>
											<?php echo megastar_breadcrumbs(); ?>
										<?php elseif ($right_side == 'back_button') : ?>
											<div class="heading-back-button">
												<a class="back-btn" onclick="history.back()"><i class="uk-icon-arrow-left"></i> <?php esc_html_e('Back', 'megastar'); ?></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>

				<?php ///////////////////////////////////////////////////////////////////////////////////////// ?>
						
			<?php } elseif (rwmb_meta('megastar_titlebar') == 'notitle') { ?>

				<div id="notitlebar" class="titlebar-no"></div>

			<?php } ?>

		<?php } else { ?>
				
				<?php
					// Define the Title for different Pages
					if ( is_home() ) { $title = $blog_title; }
					elseif( is_search() ) { 	
						$allsearch = new WP_Query("s=$s&showposts=-1"); 
						$count = $allsearch->post_count; 
						wp_reset_postdata();
						$title = $count . ' '; 
						$title .= esc_html__('Search results for:', 'megastar');
						$title .= ' ' . get_search_query();
					}
					elseif( class_exists('Woocommerce') && is_woocommerce() ) { $title = $woocommerce_title; }
					elseif( is_archive() ) { 
						if (is_category()) { 	$title = single_cat_title('',false); }
						elseif( is_tag() ) { 	$title = esc_html__('Posts Tagged:', 'megastar') . ' ' . single_tag_title('',false); }
						elseif (is_day()) { 	$title = esc_html__('Archive for', 'megastar') . ' ' . get_the_time('F jS, Y'); }
						elseif (is_month()) { 	$title = esc_html__('Archive for', 'megastar') . ' ' . get_the_time('F Y'); }
						elseif (is_year()) { 	$title = esc_html__('Archive for', 'megastar') . ' ' . get_the_time('Y'); }
						elseif (is_author()) { 	$title = esc_html__('Author Archive for', 'megastar') . ' ' . get_the_author(); }
						elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { $title = esc_html__('Blog Archives', 'megastar'); }
						else{
							$title = single_term_title( "", false );
							if ( $title == '' ) { // Fix for templates that are archives
								$post_id = $post->ID;
								$title = get_the_title($post_id);
							} 
						}
					}
					elseif( is_404() ) { $title = esc_html__('Oops, this Page could not be found.', 'megastar'); }
					elseif( get_post_type() == 'post' ) { $title = $blog_title; }
					else { $title = get_the_title(); }
				?>
			
				<?php if($global_header == 'title') { ?>
					 <section class="inner-header divider parallax layer-overlay overlay-dark-5 <?php echo esc_attr($titlebar_style); ?>" data-bg-img="<?php echo get_theme_mod('megastar_titlebar_bg_image') ? get_theme_mod('megastar_titlebar_bg_image') : 'http://placehold.it/1920x1280' ?>" <?php // echo wp_kses_post($titlebar_bg_image); ?>>
                      <div class="container">
                        <!-- Section Content -->
                        <div class="section-content">
                          <div class="row"> 
                            <div class="col-md-12">
                              <h2 class="title text-white"><?php echo esc_html($title); ?></h2>
                              <h4 class="text-theme-colored letter-space-3 font-weight-400 text-uppercase">Only he who can see the invisible can do the impossible. </h4>
                               
                                <?php if($right_side == 'breadcrumb') : ?>
                                <?php echo megastar_breadcrumbs(); ?>
                                <?php elseif ($right_side == 'back_button') : ?>
                                        <div class="heading-back-button">
                                                <a class="back-btn" onclick="history.back()"><i class="uk-icon-arrow-left"></i> <?php esc_html_e('Back', 'megastar'); ?></a>
                                        </div>
                                <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
				<?php } elseif($global_header == 'featuredimagecenter') { ?>
					 
                                        <section class="inner-header divider"  <?php echo wp_kses_post($titlebar_bg_image); ?>>
                                            <div class="container pt-50 pb-50">
                                                <!-- Section Content -->
                                                <div class="section-content col-sm-8 col-lg-offset-2 bg-dark-transparent-light">
                                                    <div class="row"> 
                                                        <div class="col-md-12">
                                                            <h2 class="m-0 text-center text-uppercase font-60 text-white line-height-0 pt-40 pb-40 letter-space-1  <?php echo esc_attr($titlebar_style); ?>"><?php echo esc_html($title); ?></h2>
                                                            <?php if($right_side == 'breadcrumb') : ?>
                                                                    <?php echo megastar_breadcrumbs(); ?>
                                                            <?php elseif ($right_side == 'back_button') : ?>
                                                                    <div class="heading-back-button">
                                                                            <a class="back-btn" onclick="history.back()"><i class="uk-icon-arrow-left"></i> <?php esc_html_e('Back', 'megastar'); ?></a>
                                                                    </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
				<?php } elseif($global_header == 'notitle') { ?>
					<div id="notitlebar" class="titlebar-no"></div>
				<?php } ?>

		<?php } // End Else ?>

	<?php } else { // If no post page ?>

		<?php
			// Define the Title for different Pages
			if ( is_home() ) { $title = $blog_title; }
			elseif( is_search() ) { 	
				$allsearch = new WP_Query("s=$s&showposts=-1"); 
				$count = $allsearch->post_count; 
				wp_reset_postdata();
				$title = $count . ' '; 
				$title .= esc_html__('Search results for:', 'megastar');
				$title .= ' ' . get_search_query();
			}
			elseif( class_exists('Woocommerce') && is_woocommerce() ) { $title = $woocommerce_title; }
			elseif( is_archive() ) { 
				if (is_category()) { 	$title = single_cat_title('',false); }
				elseif( is_tag() ) { 	$title = esc_html__('Posts Tagged:', 'megastar') . ' ' . single_tag_title('',false); }
				elseif (is_day()) { 	$title = esc_html__('Archive for', 'megastar') . ' ' . get_the_time('F jS, Y'); }
				elseif (is_month()) { 	$title = esc_html__('Archive for', 'megastar') . ' ' . get_the_time('F Y'); }
				elseif (is_year()) { 	$title = esc_html__('Archive for', 'megastar') . ' ' . get_the_time('Y'); }
				elseif (is_author()) { 	$title = esc_html__('Author Archive for', 'megastar') . ' ' . get_the_author(); }
				elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { $title = esc_html__('Blog Archives', 'megastar'); }
				else{
					$title = single_term_title( "", false );
					if ( $title == '' ) { // Fix for templates that are archives
						$post_id = $post->ID;
						$title = get_the_title($post_id);
					} 
				}
			}
			elseif( is_404() ) { $title = esc_html__('Oops, this Page could not be found.', 'megastar'); }
			elseif( get_post_type() == 'post' ) { $title = $blog_title; }
			else { $title = get_the_title(); }
		?>
		
		<?php if($global_header == 'title') { ?>
                                         <!-- Section: inner-header -->
            <div class="inner-header divider <?php echo esc_attr($titlebar_style); ?>" data-bg-img="<?php echo get_theme_mod('megastar_titlebar_bg_image') ? get_theme_mod('megastar_titlebar_bg_image') : 'http://placehold.it/1920x1280' ?>" <?php // echo wp_kses_post($titlebar_bg_image); ?>>
              <div class="container">
                <!-- Section Content -->
                <div class="section-content">
                  <div class="row"> 
                    <div class="col-sm-8 col-lg-offset-2 bg-dark-transparent-light">
                      <h2 class="m-0 text-center text-uppercase font-60 text-white line-height-0 pt-40 pb-40 letter-space-1"><?php echo esc_html($title); ?></h2>
                      
                        <?php if($right_side == 'breadcrumb') : ?>
                        <?php echo megastar_breadcrumbs(); ?>
                        <?php elseif ($right_side == 'back_button') : ?>
                            <div class="heading-back-button pb-10">
                                    
                                <a onclick="history.back()" class="btn btn-default btn-transparent btn-sm "><i class="fa fa-arrow-circle-left"></i><?php esc_html_e(' Back', 'megastar'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			 
		<?php } elseif($global_header == 'featuredimagecenter') { ?>
			<div class="inner-header divider <?php echo esc_attr($titlebar_style); ?>" data-bg-img="<?php echo get_theme_mod('megastar_titlebar_bg_image') ? get_theme_mod('megastar_titlebar_bg_image') : 'http://placehold.it/1920x1280' ?>" <?php // echo wp_kses_post($titlebar_bg_image); ?>>
              <div class="container">
                <!-- Section Content -->
                <div class="section-content">
                  <div class="row"> 
                    <div class="col-sm-8 col-lg-offset-2 bg-dark-transparent-light">
                      <h2 class="m-0 text-center text-uppercase font-60 text-white line-height-0 pt-40 pb-40 letter-space-1"><?php echo esc_html($title); ?></h2>
                      
                        <?php if($right_side == 'breadcrumb') : ?>
                        <?php echo megastar_breadcrumbs(); ?>
                        <?php elseif ($right_side == 'back_button') : ?>
                            <div class="heading-back-button pb-10">
                                    
                                <a onclick="history.back()" class="btn btn-default btn-transparent btn-sm "><i class="fa fa-arrow-circle-left"></i><?php esc_html_e(' Back', 'megastar'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		<?php } elseif($global_header == 'notitle') { ?>
			<div id="notitlebar" class="titlebar-no"></div>
		<?php } ?>

	<?php } // End Else ?>

<?php endif;