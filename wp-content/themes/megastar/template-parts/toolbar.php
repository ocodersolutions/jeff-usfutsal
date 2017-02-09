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
                             <?php
                            $toolbar_phone = get_theme_mod('megastar_toolbar_tel', get_theme_support('megastar_toolbar_tel', '123-456-789'));
                            if ($toolbar_phone):
                                ?>
                            <li class="pl-10 pr-10 mb-0 pb-0">
                                <div class="header-widget text-white"><i class="fa fa-phone"></i> <?php echo $toolbar_phone ?> </div>
                            </li>
                            
                             <?php
                             endif;
                            $toolbar_email = get_theme_mod('megastar_toolbar_email', get_theme_support('megastar_toolbar_email', get_option("admin_email")));
                            if ($toolbar_email):
                                ?>
                            <li class="pl-10 pr-10 mb-0 pb-0">
                                <div class="header-widget text-white"><i class="fa fa-envelope-o"></i> <?php echo $toolbar_email ?></div>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 text-right flip sm-text-center">
                    <div class="widget m-0">
                        <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm">
                            <?php
                            $facebook_link = get_theme_mod('megastar_facebook_link', get_theme_support('megastar_facebook_link', '#'));
                            if ($facebook_link):
                                ?>
                                <li class="mb-0 pb-0"><a href="<?php echo $facebook_link ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php
                            $twitter_link = get_theme_mod('megastar_twitter_link', get_theme_support('megastar_twitter_link', '#'));
                            if ($twitter_link):
                                ?>
                                <li class="mb-0 pb-0"><a href="<?php echo $twitter_link ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php
                            $instagram_link = get_theme_mod('megastar_instagram_link', get_theme_support('megastar_instagram_link', '#'));
                            if ($instagram_link):
                                ?>
                                <li class="mb-0 pb-0"><a href="<?php echo $instagram_link ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php
                            $linked_link = get_theme_mod('megastar_linked_link', get_theme_support('megastar_linked_link', '#'));
                            if ($linked_link):
                                ?>
                                <li class="mb-0 pb-0"><a href="<?php echo $linked_link ?>"><i class="fa fa-linkedin text-white"></i></a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php endif; ?>