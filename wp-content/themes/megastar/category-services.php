<?php 

get_header();

// Layout
// $megastar_layout = (is_active_sidebar('blog-widgets')) ? 'sidebar-right' : 'default';


// if($megastar_layout == 'sidebar-right'){
// 	$mainlayout = 'col-md-9 blog-pull-right';
// 	$sidebarlayout = 'col-sm-12 col-md-3';
// } 
// else{
// 	$mainlayout = 'col-md-10 col-md-offset-1';
// 	$sidebarlayout = '';
// }

?>

<!-- <section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row ">
	        <?php if($megastar_layout == 'sidebar-left'){ ?>
	        <div class="col-sm-12 col-md-3">
	        	<div class="sidebar sidebar-left mt-sm-30">
				<?php get_sidebar(); ?>
				</div>
			</div>
	        <?php } ?>
			
			<div class="<?php echo esc_attr($mainlayout); ?>">
	            <div class="blog-posts">
	              	<div class="col-md-12">
                		<div class="row list-dashed">
	                	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'template-parts/post-format/entry', get_post_format() )?>
							
						<?php endwhile; endif; ?>
						
						
						</div>
            		</div>
            		<?php get_template_part( 'template-parts/pagination' ); ?>
                </div>
            </div>
	              

			<?php if( $megastar_layout == 'sidebar-right'){ ?>
			<div class="col-sm-12 col-md-3">
				<div class="sidebar sidebar-right mt-sm-30">
				<?php get_sidebar(); ?>
				</div>
			</div>
			<?php } ?>
        </div>
    </div>
</section>
 -->
 <section id="services" data-bg-img="images/pattern/pattern8.png">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-sm-6 col-md-4">

              <div class="class-item box-hover-effect effect1 mb-sm-30">

                <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="http://placehold.it/450x361" alt="..."></a> </div>

                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>

                  <h3 class="text-uppercase letter-space-1 mt-10">Riding on <span class="text-theme-colored">Trainer</span></h3>

                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, alias eos dolores unde aliquid quidem soluta ducimus quod numquam veniam obcaecati ratione, tempora quibusdam </p>

                  <p>aperiam voluptates id, in consectetur amet quas voluptatem, accusantium? In dignissimos eveniet voluptatem accusamus explicabo sapiente, similique minus? Dolor, vel minima.</p>

                  <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>

                </div>

              </div>

            </div>

            <div class="col-sm-6 col-md-4">

              <div class="class-item box-hover-effect effect1 mb-sm-30">

                <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="http://placehold.it/450x361" alt="..."></a> </div>

                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>

                  <h3 class="text-uppercase letter-space-1 mt-10">Start your <span class="text-theme-colored">training</span></h3>

                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, alias eos dolores unde aliquid quidem soluta ducimus quod numquam veniam obcaecati ratione, tempora quibusdam </p>

                  <p>aperiam voluptates id, in consectetur amet quas voluptatem, accusantium? In dignissimos eveniet voluptatem accusamus explicabo sapiente, similique minus? Dolor, vel minima.</p>

                  <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>

                </div>

              </div>

            </div>

            <div class="col-sm-6 col-md-4">

              <div class="class-item box-hover-effect effect1 mb-sm-30">

                <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="http://placehold.it/450x361" alt="..."></a> </div>

                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>

                  <h3 class="text-uppercase letter-space-1 mt-10">competitive <span class="text-theme-colored">swimming</span></h3>

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, alias eos dolores unde aliquid quidem soluta ducimus quod numquam veniam obcaecati ratione, tempora quibusdam </p>

                  <p>aperiam voluptates id, in consectetur amet quas voluptatem, accusantium? In dignissimos eveniet voluptatem accusamus explicabo sapiente, similique minus? Dolor, vel minima.</p>

                  <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>

                </div>

              </div>

            </div>
          </div>
          <div class="row mt-30">
            <div class="col-sm-6 col-md-4">
              <div class="class-item box-hover-effect effect1 mb-sm-30">
                <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="http://placehold.it/450x361" alt="..."></a> </div>
                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>
                  <h4 class="text-uppercase letter-space-1">Riding on <span class="text-theme-colored">Trainer</span></h4>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, alias eos dolores unde aliquid quidem soluta ducimus quod numquam veniam obcaecati ratione, tempora quibusdam </p>
                  <p>aperiam voluptates id, in consectetur amet quas voluptatem, accusantium? In dignissimos eveniet voluptatem accusamus explicabo sapiente, similique minus? Dolor, vel minima.</p>
                  <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="class-item box-hover-effect effect1 mb-sm-30">
                <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="http://placehold.it/450x361" alt="..."></a> </div>
                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>
                  <h4 class="text-uppercase letter-space-1">Start your <span class="text-theme-colored">training</span></h4>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, alias eos dolores unde aliquid quidem soluta ducimus quod numquam veniam obcaecati ratione, tempora quibusdam </p>
                  <p>aperiam voluptates id, in consectetur amet quas voluptatem, accusantium? In dignissimos eveniet voluptatem accusamus explicabo sapiente, similique minus? Dolor, vel minima.</p>
                  <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="class-item box-hover-effect effect1 mb-sm-30">
                <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="http://placehold.it/450x361" alt="..."></a> </div>
                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>
                  <h4 class="text-uppercase letter-space-1">competitive <span class="text-theme-colored">swimming</span></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, alias eos dolores unde aliquid quidem soluta ducimus quod numquam veniam obcaecati ratione, tempora quibusdam </p>
                  <p>aperiam voluptates id, in consectetur amet quas voluptatem, accusantium? In dignissimos eveniet voluptatem accusamus explicabo sapiente, similique minus? Dolor, vel minima.</p>
                  <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php dynamic_sidebar('carousel_archievement'); ?>
    <!-- Section: Cources -->
    <section id="courses">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-sm-6 col-md-4 mb-30">
              <div class="card effect__hover">
                <div class="card__front bg-theme-colored">
                  <div class="card__text">
                    <div class="icon-box mb-0 mt-0 p-0"> <img class="img-responsive img-fullwidth" src="http://placehold.it/450x250" alt="">
                      <h3 class="icon-box-title text-uppercase text-white letter-space-2">Cycling</h3>
                    </div>
                  </div>
                </div>
                <div class="card__back bg-black">
                  <div class="card__text">
                    <div class="display-table-parent p-30">
                      <div class="display-table">
                        <div class="display-table-cell">
                          <h4 class="text-uppercase text-white">Cycling</h4>
                          <div class="text-gray-lightgray">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam laborum deserunt debitis fuga aliquid dolor ullam sed.</p>
                          </div>
                          <a href="#" class="btn btn-sm btn-flat btn-theme-colored mt-10"> Read More </a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-30">
              <div class="card effect__hover">
                <div class="card__front bg-theme-colored">
                  <div class="card__text">
                    <div class="icon-box mb-0 mt-0 p-0"> <img class="img-responsive img-fullwidth" src="http://placehold.it/450x250" alt="">
                      <h3 class="icon-box-title text-uppercase text-white letter-space-2">mount hunter</h3>
                    </div>
                  </div>
                </div>
                <div class="card__back bg-black">
                  <div class="card__text">
                    <div class="display-table-parent p-30">
                      <div class="display-table">
                        <div class="display-table-cell">
                          <h4 class="text-uppercase text-white">mount hunter</h4>
                          <div class="text-gray-lightgray">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam laborum deserunt debitis fuga aliquid dolor ullam sed.</p>
                          </div>
                          <a href="#" class="btn btn-sm btn-flat btn-theme-colored"> Read More </a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 mb-30">
              <div class="card effect__hover">
                <div class="card__front bg-theme-colored">
                  <div class="card__text">
                    <div class="icon-box mb-0 mt-0 p-0"> <img class="img-responsive img-fullwidth" src="http://placehold.it/450x250" alt="">
                      <h3 class="icon-box-title text-uppercase text-white letter-space-2">swimming</h3>
                    </div>
                  </div>
                </div>
                <div class="card__back bg-black">
                  <div class="card__text">
                    <div class="display-table-parent p-30">
                      <div class="display-table">
                        <div class="display-table-cell">
                          <h4 class="text-uppercase text-white">swimming</h4>
                          <div class="text-gray-lightgray">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam laborum deserunt debitis fuga aliquid dolor ullam sed.</p>
                          </div>
                          <a href="#" class="btn btn-sm btn-flat btn-theme-colored mt-10"> Read More </a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
