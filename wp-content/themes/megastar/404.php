<!DOCTYPE html>
<html >
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
 
  
  <!-- Start main-content -->
  <div class="main-content">
     
    <!-- Section: home -->
    <section id="home" class="fullscreen bg-lightest">
      <div class="display-table text-center">
        <div class="display-table-cell">
          <div class="container pt-0 pb-0">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h1 class="font-150 text-theme-colored mt-0 mb-0"><i class="fa fa-map-signs text-gray-silver"></i>404!</h1>
                <h2 class="mt-0">Oops! Page Not Found</h2>
                <p>The page you were looking for could not be found.</p>
                <a class="btn btn-border btn-gray btn-transparent btn-circled" href="javascript:history.go(-1)">&nbsp;&nbsp;&nbsp;<?php echo esc_html__("Go Back", "megastar") ?>&nbsp;&nbsp;&nbsp;</a>
                <a class="btn btn-border btn-gray btn-transparent btn-circled" href="<?php echo home_url('/'); ?>">Return Home</a>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

  <!-- Footer -->
  <footer id="footer" class="footer bg-black-333 text-center pt-20 pb-20">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
           <?php  if(get_theme_mod('megastar_show_copyright_text')) : ?>
										
                    <div class="copyright-txt"><?php echo wp_kses_post(get_theme_mod('megastar_custom_copyright_text')); ?></div>

            <?php else : ?>								

                    <div class="copyright-txt">&copy; <?php esc_html_e('Copyright', 'megastar') ?> <?php echo esc_html(date("Y ")); ?> <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' );?>"> <?php echo esc_html(bloginfo('name')); ?> </a></div>

            <?php endif; ?>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper --> 

<!-- Footer Scripts --> 
  <!-- JS | Custom script for all pages --> 
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/custom.js"></script>

</body>
</html>