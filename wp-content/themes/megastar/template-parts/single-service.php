<?php get_header('sport'); 

// Layout
// $sidebar = get_theme_mod('megastar_blog_layout', 'sidebar-right');

// if($sidebar == 'sidebar-left'){
// 	$mainlayout = 'col-md-9 blog-pull-right';
// 	$sidebarlayout = 'col-sm-12 col-md-3';
// }
// elseif($sidebar == 'sidebar-right'){
// 	$mainlayout = 'col-md-9 blog-pull-right';
// 	$sidebarlayout = 'col-sm-12 col-md-3';
// } 
// else{
// 	$mainlayout = 'uk-width-medium-1-1';
// 	$sidebarlayout = 'uk-hidden';
?>

<!-- Section: About -->
   <section id="about">
      <div class="container">
        <div class="section-content">
          <div class="row mt-50">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-5">
              <div class="class-item box-hover-effect effect1">
                  <div class="thumb"> <a href="#">
                    <img class="img-fullwidth mb-20" src="<?php the_post_thumbnail_url();?>" alt="..."></a>
                  </div>
              </div>
            </div>
            <div class="col-md-7 mt-20">
                <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit </span>
                  <h4 class="text-uppercase letter-space-1"><?php echo str_replace(get_the_title(),'',substr(get_the_title(),0, strrpos(get_the_title(), ' ')));?> <span class="text-theme-colored"><?php echo substr(get_the_title(), strrpos(get_the_title(), ' ') + 1);?></span></h4>
                  <p> <?php the_content()?></p>
                </div>
            </div>
            <?php endwhile; endif; ?>
          </div>
          <div class="row mt-30 text-justify">
            <div class="col-md-7">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas doloribus facere perferendis eveniet ipsam reiciendis cumque aspernatur natus! Voluptatem laudantium totam, quia reiciendis quibusdam voluptate architecto impedit id iste rem mollitia enim reprehenderit fugit exercitationem ab placeat debitis vel excepturi molestiae laboriosam aut. Possimus expedita sint neque voluptatibus, odio, architecto, excepturi corrupti magnam sunt ipsa voluptatem consequuntur iusto quo, molestiae dolorem repudiandae. Consectetur dolorem placeat ratione eum quasi delectus, corrupti.</p>
            </div>
            <div class="col-md-5">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro placeat totam eum iusto, dolore velit? Voluptas autem asperiores soluta ducimus, tempore dolorem molestias eaque iusto nesciunt, qui velit quaerat? Ratione error fugit sapiente at doloremque modi voluptatibus et quasi iure quas. Nulla, similique dolores fugit ex. Quia, dolores itaque minus.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Section: Divider  -->
    <section class="divider parallax layer-overlay overlay-black" data-bg-img="http://placehold.it/1920x1280">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="section-content text-center">
              <h2 class="text-white letter-space-1 font-32 text-uppercase">Your Personal <span class="text-theme-colored">Trainer</span></h2>
              <h4 class="text-white font-24 font-weight-400">I will customize your workouts so that you can achieve your training goals. It's Truly Personal</h4>
              <a href="#" class="btn btn-theme-colored mt-10 btn-md text-uppercase btn-flat"> Contact Us</a> </div>
          </div>
        </div>
      </div>
    </section> 

    <!-- Section: Features -->
    <section id="features">
      <div class="container">
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
              <div class="icon-box text-center">
                <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-xl" href="#"> <i class="flaticon-sports-strength text-white"></i> </a>
                <h4 class="Personal trainer text-uppercase"><strong>Weight Loss Specialized</strong></h4>
                <p>Eleifend lobortis bibendum volutpat est senectus duis convallis augue hendrerit senectus duis</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
              <div class="icon-box text-center"> 
                <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-xl" href="#"> <i class="flaticon-sports-sports-6 text-white"></i> </a>
                <h4 class="icon-box-title mt-15 mb-10 text-uppercase"><strong>Golf Fitness Specialized</strong></h4>
                <p>Eleifend lobortis bibendum volutpat est senectus duis convallis augue hendrerit senectus duis</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
              <div class="icon-box text-center"> 
                <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-xl" href="#"> <i class="flaticon-sports-sport text-white"></i> </a>
                <h4 class="icon-box-title mt-15 mb-10 text-uppercase"><strong>Youth Exercise Specialized</strong></h4>
                <p>Eleifend lobortis bibendum volutpat est senectus duis convallis augue hendrerit senectus duis</p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
              <div class="icon-box text-center"> 
                <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-xl" href="#"> <i class="flaticon-sports-sports-1 text-white"></i> </a>
                <h4 class="icon-box-title mt-15 mb-10 text-uppercase"><strong>Behavior Specialized</strong></h4>
                <p>Eleifend lobortis bibendum volutpat est senectus duis convallis augue hendrerit senectus duis</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php get_footer('sport'); ?>