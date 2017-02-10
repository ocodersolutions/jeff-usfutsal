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
 <section id="services" data-bg-img="images/pattern/pattern8.png">
      <div class="container">
        <div class="section-content">
          <div class="row">
          <?php $argument = array(
          	'category' => 'services',
          	'posts_per_page' => 6, 
          	'orderby' => 'date', 
          	'order' => 'DESC'
          );
          $sv_post = query_posts( $argument);
          ?>
          	<?php if ($sv_post): foreach ($sv_post as $post) :  setup_postdata($post);
          	?>
            <div class="col-sm-6 col-md-4">

              <div class="class-item box-hover-effect effect1 mb-sm-30">

                <div class="thumb"> <a href="<?php the_permalink();?>"><img class="img-fullwidth mb-20" src="<?php echo the_post_thumbnail_url();?>" alt="..."></a> </div>

                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>

                  <h3 class="text-uppercase letter-space-1 mt-10"><?php echo str_replace(get_the_title(),'',substr(get_the_title(),0, strrpos(get_the_title(), ' ')));?> <span class="text-theme-colored"><?php echo substr(get_the_title(), strrpos(get_the_title(), ' ') + 1);?></span></h3>

                   <p><?php echo custom_excerpt_lt(get_the_content( ),350);?></p>

                  <p><a href="<?php the_permalink();?>" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>

                </div>

              </div>

            </div>

            
            <?php  endforeach;endif; ?>
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
