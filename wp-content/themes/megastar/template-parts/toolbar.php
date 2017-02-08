<?php
$megastar_mb_toolbar = (get_post_meta(get_the_ID(), 'megastar_toolbar', true) != null) ? get_post_meta(get_the_ID(), 'megastar_toolbar', true) : null;
$megastar_tm_toolbar = (get_theme_mod('megastar_toolbar', 1)) ? 1 : 0;
$megastar_toolbar = ($megastar_mb_toolbar != null ) ? $megastar_mb_toolbar : $megastar_tm_toolbar;
$toolbar_left = get_theme_mod('megastar_toolbar_left');
$toolbar_right = get_theme_mod('megastar_toolbar_right');
?>
<?php if ($megastar_toolbar) : ?>
    <div class="header-top sm-text-center bg-theme-colored">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <nav>
                        <?php if (!empty($toolbar_left)) : ?>
                            <?php get_template_part('template-parts/toolbars/' . $toolbar_left); ?> 
                        <?php endif; ?>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="widget m-0 mt-5 no-border">
                        <ul class="list-inline text-right sm-text-center">
                            <li class="pl-10 pr-10 mb-0 pb-0">
                                <div class="header-widget text-white"><i class="fa fa-phone"></i> 123-456-789 </div>
                            </li>
                            <li class="pl-10 pr-10 mb-0 pb-0">
                                <div class="header-widget text-white"><i class="fa fa-envelope-o"></i> contact@yourdomain.com </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 text-right flip sm-text-center">
                    <div class="widget m-0">
                        <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm">
                            <li class="mb-0 pb-0"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="mb-0 pb-0"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="mb-0 pb-0"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="mb-0 pb-0"><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php endif; ?>