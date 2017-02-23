<?php
/**
 * @package   megastar
 * @author    bdthemes http://www.bdthemes.com
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
$header_fullwidth = get_theme_mod('megastar_header_fullwidth');
$page_progress = get_theme_mod('megastar_page_progress');
$header_transparancy = (get_theme_mod('megastar_header_type', 'fixed') and get_theme_mod('megastar_header_transparent', 1) == 1) ? ' tm-header-transparent' : '';
?>
<header id="header" class="header">
<?php get_template_part('template-parts/toolbar'); ?>

    <div class="header-nav">
        <div class="header-nav-wrapper bg-light " style="z-index: auto; position: static; top: auto;">
            
                <div class="row">
                    <div class="col-md-12">
                        <div id="menuzord-right" class="menuzord orange no-bg menuzord-responsive" style="">
                            <?php get_template_part('template-parts/logo-default'); ?>
                            <?php get_template_part('template-parts/menu-primary'); ?>

                        </div>
                    </div>
                </div>
           
        </div> 
    </div>
</header>

<?php // get_template_part( 'template-parts/toolbar' );  ?>
