<?php 
/* Template Name: Homepage Template */
 ?>

<?php get_header(); ?>

<div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="fullwidth-carousel">
        <div class="carousel-item bg-img-cover" data-bg-img="<?php echo get_template_directory_uri(); ?>/images/bg/bg.jpg">
          <div class="display-table">
            <div class="display-table-cell">
              <div class="container pt-200 pb-200">
                <div class="row">
                  <div class="col-md-6 col-md-offset-6 text-center">
                    <div class="home-banner bg-dark-transparent-light p-40 pt-70 pb-70">
                      <h2 class="m-0 text-uppercaes font-60 text-white line-height-0 pt-40 pb-40 letter-space-1">2017</h2>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-6 line-height-0 pt-30 pb-30">U.S. FUTSAL</h3>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-6 line-height-0 pt-30 pb-30">REGIONAL</h3>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-9 line-height-0 pt-30 pb-30">CHAMPIONSHIP</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item bg-img-cover" data-bg-img="<?php echo get_template_directory_uri(); ?>/images/bg/bg.jpg">
          <div class="display-table">
            <div class="display-table-cell">
              <div class="container pt-200 pb-200">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="home-banner bg-dark-transparent-light p-40 pt-70 pb-70">
                      <h2 class="m-0 text-uppercaes font-60 text-white line-height-0 pt-40 pb-40 letter-space-1">2017</h2>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-6 line-height-0 pt-30 pb-30">U.S. FUTSAL</h3>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-6 line-height-0 pt-30 pb-30">REGIONAL</h3>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-9 line-height-0 pt-30 pb-30">CHAMPIONSHIP</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item bg-img-cover" data-bg-img="<?php echo get_template_directory_uri(); ?>/images/bg/bg.jpg">
          <div class="display-table">
            <div class="display-table-cell">
              <div class="container pt-200 pb-200">
                <div class="row">
                  <div class="col-md-6 col-md-offset-6 text-center">
                    <div class="home-banner bg-dark-transparent-light p-40 pt-70 pb-70">
                      <h2 class="m-0 text-uppercaes font-60 text-white line-height-0 pt-40 pb-40 letter-space-1">2017</h2>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-6 line-height-0 pt-30 pb-30">U.S. FUTSAL</h3>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-6 line-height-0 pt-30 pb-30">REGIONAL</h3>
                      <h3 class="text-uppercaes m-0 font-40 text-white letter-space-9 line-height-0 pt-30 pb-30">CHAMPIONSHIP</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Section: About -->
    <section id="about">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <?php dynamic_sidebar('block-tittle-1'); ?>
          </div>
        </div>

       
        <div class="section-content">
          <div class="row mt-50">
            <?php 
              $args = array(
                'posts_per_page'      => 2,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
                'category_name'            => 'News'
                );
              query_posts( $args );
              while ( have_posts() ) : the_post();?>
                  <div class="col-sm-4">
                    <div class="box-hover-effect effect1 mb-sm-30">
                      <?php if(has_post_thumbnail()){?>
                        <div class="thumb"> <a href="#"><img class="img-fullwidth mb-20" src="<?php echo get_the_post_thumbnail_url();?>" alt="..."></a> 
                      </div>
                      <?php }?>
                      
                      <div class="caption"><h3 class="text-uppercase letter-space-1 font-20 mt-0 mb-0"><?php $catName = get_the_category();

                      foreach ($catName as $cat){
                        echo $cat->name;
                        }?></h3>
                        <h3 class="font-16 letter-space-1 mt-0 text-theme-colored"><?php the_title();?></h3>
                         <p><?php echo custom_excerpt_lt(get_the_content(),450);?></p>
                        <p><a href="<?php the_permalink()?>" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>
                      </div>
                    </div>
                  </div>
              <?php endwhile;
               
              // Reset Query
              wp_reset_query();?>
           <div class="col-sm-4">
           <?php dynamic_sidebar('events_sidebar'); ?>
              
                
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Registions -->
    <section class="divider parallax"  data-bg-img="<?php echo get_template_directory_uri(); ?>/images/bg/Registration_bg1.jpg" >
      <div class="container">
        <h2 class="text-white title">Register now width U.S. Futsal</h2>
        <p class="text-white mb-20">Lorem ipsum dolor sit amet, a tellus accumsan donec, velit eros curabitur risus velit placerat, enim erat et ac augue non curabitur, aliquam sit potenti mattis. Sit sed leo, vestibulum pede at congue vitae sed, at lacus ut netus placerat cursus debitis, auctor libero diam augue euismod, aenean sapien porta. Morbi velit accumsan eu dolor nulla. </p>
        <p ><a href="#" class="btn btn-border btn-transparent btn-sm" role="button">Read More</a></p>
      </div>
    </section>

    <!-- Section: About -->
    <section class="bg-lighter">
      <div class="container">
        <h2 class="mt-0 mb-0">What is Futsal ?</h2>
        <h5 class="sub-title">About U.S. Futsal</h5>
        <p class=" mb-20">Lorem ipsum dolor sit amet, a tellus accumsan donec, velit eros curabitur risus velit placerat, enim erat et ac augue non curabitur, aliquam sit potenti mattis. Sit sed leo, vestibulum pede at congue vitae sed, at lacus ut netus placerat cursus debitis, auctor libero diam augue euismod, aenean sapien porta. Morbi velit accumsan eu dolor nulla. </p>
        <p class="text-center"><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>
      </div>
    </section>
  
    <!-- Section: Clients -->
    <section class="divider parallax"  data-bg-img="<?php echo get_template_directory_uri(); ?>/images/bg/Registration_bg1.jpg" >
      <div class="container">
       <?php dynamic_sidebar('carousel_client'); ?>
        <!-- <div class="section-content">
          <div class="row">
            <div class="clients-logo carousel owl-carousel-6col">
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/1.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/2.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/3.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/4.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/5.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/6.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/1.jpg" alt=""></a> </div>
              <div class="item"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/clients/2.jpg" alt=""></a> </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>
    
    <!-- Section: Pricing Table -->
    <!-- <section id="pricing">
      <div class="container pb-40">
        <div class="section-title">
          <div class="row">
            <?php //dynamic_sidebar('block-tittle-2'); ?> -->
            <!--< div class="col-md-8 col-md-offset-2 text-center">
              <h2 class="text-uppercase title">Membership <span class="text-black font-weight-300"> Packages</span></h2>
              <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
            </div> -->
          <!-- </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4 hvr-float-shadow mb-sm-30">
              <div class="pricing-table text-center pt-10 pb-0 mt-sm-0 maxwidth400 border-1px border-theme-colored">
                <div class="icon-box text-center pt-20 p-0 mb-0"> <a class="icon icon-circled icon-border-effect border-1px effect-circle icon-xl" href="#"> <i class="flaticon-sports-gym-4 text-theme-colored"></i> </a> </div>
                <h3 class="package-type text-uppercase letter-space-2">Beginner</h3>
                <div class="price-amount">
                  <div class="font-weight-700 text-theme-colored">35<sup>$</sup> <span class="font-14">monthly</span></div>
                </div>
                <ul class="table-list mt-0 no-bg">
                  <li>Free Consultation</li>
                  <li>Fitness Assessment</li>
                  <li>24 Hour Gym</li>
                  <li>Nutrional Plan: No</li>
                </ul>
                <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="#">Signup</a>
              </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 hvr-float-shadow mb-sm-30">
              <div class="pricing-table text-center pt-10 pb-0 mt-sm-0 maxwidth400 border-1px border-theme-colored">
                <div class="icon-box text-center pt-20 p-0 mb-0"> <a class="icon icon-circled icon-border-effect border-1px effect-circle icon-xl" href="#"> <i class="flaticon-sports-game-1 text-theme-colored"></i> </a> </div>
                <h3 class="package-type text-uppercase letter-space-2">Advanced</h3>
                <div class="price-amount">
                  <div class="font-weight-700 text-theme-colored">75<sup>$</sup> <span class="font-14">monthly</span></div>
                </div>
                <ul class="table-list mt-0 no-bg">
                  <li>Free Consultation</li>
                  <li>Fitness Assessment</li>
                  <li>24 Hour Gym</li>
                  <li>Nutrional Plan: No</li>
                </ul>
                <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="#">Signup</a>
              </div>
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4 hvr-float-shadow mb-sm-30">
              <div class="pricing-table text-center pt-10 pb-0 mt-sm-0 maxwidth400 border-1px border-theme-colored">
                <div class="icon-box text-center pt-20 p-0 mb-0"> <a class="icon icon-circled icon-border-effect border-1px effect-circle icon-xl" href="#"> <i class="flaticon-sports-cup-1 text-theme-colored"></i> </a> </div>
                <h3 class="package-type text-uppercase letter-space-2">professional</h3>
                <div class="price-amount">
                  <div class="font-weight-700 text-theme-colored">125<sup>$</sup> <span class="font-14">monthly</span></div>
                </div>
                <ul class="table-list mt-0 no-bg">
                  <li>Free Consultation</li>
                  <li>Fitness Assessment</li>
                  <li>24 Hour Gym</li>
                  <li>Nutrional Plan: No</li>
                </ul>
                <a class="btn btn-lg btn-theme-colored text-uppercase btn-block pt-20 pb-20 btn-flat" href="#">Signup</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    
    <!-- Section: Team -->
    <!-- <section id="trainer" class="bg-light">
      <div class="container pb-70">
        <div class="section-title text-center">
          <div class="row">
          <?php dynamic_sidebar('block-tittle-3'); ?>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="bg-img-box maxwidth400">
                <div class="photo">
                  <img class="img-fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/team/1.jpg" alt="">
                </div>
                <div class="style3 bg-light border-right-5px border-theme-colored">
                  <h5 class="text-gray mt-0 mb-0">GYM Expart</h5>
                  <h3 class="text-theme-colored mt-0 mb-5">John Smith</h3>
                  <p class="mt-0">2010 Best Trainer Award</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="bg-img-box maxwidth400">
                <div class="photo">
                  <img class="img-fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/team/2.jpg" alt="">
                </div>
                <div class="style3 bg-light border-right-5px border-theme-colored">
                  <h5 class="text-gray mt-0 mb-0">Race Expart</h5>
                  <h3 class="text-theme-colored mt-0 mb-5">John Smith</h3>
                  <p class="mt-0">2011 Uefa Championship league</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="bg-img-box maxwidth400">
                <div class="photo">
                  <img class="img-fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/team/3.jpg" alt="">
                </div>
                <div class="style3 bg-light border-right-5px border-theme-colored">
                  <h5 class="text-gray mt-0 mb-0">Boxing Expart</h5>
                  <h3 class="text-theme-colored mt-0 mb-5">John Smith</h3>
                  <p class="mt-0">2010 Best Trainer Award</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-30">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="bg-img-box maxwidth400">
                <div class="photo">
                  <img class="img-fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/team/4.jpg" alt="">
                </div>
                <div class="style3 bg-light border-right-5px border-theme-colored">
                  <h5 class="text-gray mt-0 mb-0">GYM Expart</h5>
                  <h3 class="text-theme-colored mt-0 mb-5">John Smith</h3>
                  <p class="mt-0">2010 Best Trainer Award</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="bg-img-box maxwidth400">
                <div class="photo">
                  <img class="img-fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/team/5.jpg" alt="">
                </div>
                <div class="style3 bg-light border-right-5px border-theme-colored">
                  <h5 class="text-gray mt-0 mb-0">Race Expart</h5>
                  <h3 class="text-theme-colored mt-0 mb-5">John Smith</h3>
                  <p class="mt-0">2011 Uefa Championship league</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="bg-img-box maxwidth400">
                <div class="photo">
                  <img class="img-fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/team/6.jpg" alt="">
                </div>
                <div class="style3 bg-light border-right-5px border-theme-colored">
                  <h5 class="text-gray mt-0 mb-0">Boxing Expart</h5>
                  <h3 class="text-theme-colored mt-0 mb-5">John Smith</h3>
                  <p class="mt-0">2010 Best Trainer Award</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- <section id="achievements" class="divider parallax layer-overlay overlay-deep" data-bg-img="<?php //echo get_template_directory_uri(); ?>/images/bg/bg2.jpg">
      <div class="container pt-60 pb-60">
        <div class="section-title text-center">
          <div class="row">
          <?php //dynamic_sidebar('block-tittle-4'); ?>
          </div>
        </div>
        <?php //dynamic_sidebar('carousel_archievement'); ?>
      </div>
    </section> -->

    <!-- Section: Features -->
    <!-- <section id="features" class="bg-lighter">
      <div class="container pb-40">
        <div class="section-title text-center">
          <div class="row">
            <?php //dynamic_sidebar('block-tittle-5'); ?>
          </div>
        </div>
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <?php //dynamic_sidebar('feature_box'); ?>
        </div>
      </div>
    </section> -->
  
    <!-- Section: Blog   -->
    <section id="blog">
      <div class="container pb-40">
        <div class="section-title text-center">
          <div class="row">
            <?php dynamic_sidebar('block-tittle-6'); ?>
           
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div id="out_nav" class="owl-carousel-4col" data-nav="true">
                <?php //echo do_shortcode('[latest_news_shortcode]'); ?>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/gallery/g1.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/gallery/g3.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/gallery/g2.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri(); ?>/images/gallery/g4.jpg" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content --> 
  

  <!-- end .rev_slider_wrapper -->
<!--        <script>
          jQuery(document).ready(function($) {
            var revapi = $(".rev_slider").revolution({
              sliderType:"standard",
              jsFileLocation: "js/revolution-slider/js/",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "off",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                  arrows: {
                      style: "gyges",
                      enable: true,
                      hide_onmobile: false,
                      hide_onleave: true,
                      hide_delay: 200,
                      hide_delay_mobile: 1200,
                      tmp: '',
                      left: {
                          h_align: "left",
                          v_align: "center",
                          h_offset: 0,
                          v_offset: 0
                      },
                      right: {
                          h_align: "right",
                          v_align: "center",
                          h_offset: 0,
                          v_offset: 0
                      }
                  },
                    bullets: {
                    enable: true,
                    hide_onmobile: true,
                    hide_under: 800,
                    style: "hebe",
                    hide_onleave: false,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 0,
                    v_offset: 30,
                    space: 5,
                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                }
              },
              responsiveLevels: [1240, 1024, 778],
              visibilityLevels: [1240, 1024, 778],
              gridwidth: [1170, 1024, 778, 480],
              gridheight: [720, 768, 960, 720],
              lazyType: "none",
              parallax:"mouse",
              parallaxBgFreeze:"off",
              parallaxLevels:[2,3,4,5,6,7,8,9,10,1],
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: 1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
            });

          	jQuery("#contact_form").validate({
            	submitHandler: function(form) {
	              var form_btn = $(form).find('button[type="submit"]');
	              var form_result_div = '#form-result';
	              $(form_result_div).remove();
	              form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	              var form_btn_old_msg = form_btn.html();
	              form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	              $(form).ajaxSubmit({
	                dataType:  'json',
	                success: function(data) {
	                  if( data.status == 'true' ) {
	                    $(form).find('.form-control').val('');
	                  }
	                  form_btn.prop('disabled', false).html(form_btn_old_msg);
	                  $(form_result_div).html(data.message).fadeIn('slow');
	                  setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	                }
	              });
	            }
          	});

          });

        </script>-->
  <!-- Footer -->
  <?php get_footer(); ?>