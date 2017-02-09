<?php
/* Template Name: Detail */

get_header();

// Layout
$megastar_layout = get_post_meta(get_the_ID(), 'megastar_layout', true);

if ($megastar_layout == 'default') {
    
} elseif ($megastar_layout == 'full') {
    
} elseif ($megastar_layout == 'sidebar-left') {
    
} elseif ($megastar_layout == 'sidebar-right') {
    
} else {
    
}
?>



<div id="page-wrap" class="tm-middle uk-grid" <?php echo ($megastar_layout == 'sidebar-left' or $megastar_layout == 'sidebar-right') ? '' : ''; ?>>
    <section id="about" class="bg-lighter">
    <main class="container">
                <div class="section-content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

                <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

                <?php if (get_theme_mod('megastar_comment_show', 1) == 1) { ?>
                    <?php comments_template(); ?>
                <?php } ?>

            <?php endwhile;
        endif; ?>
                </div>
    </main> <!-- end main -->
    </section>
</div> <!-- end content -->


<?php if ($megastar_layout == 'sidebar-left' || $megastar_layout == 'sidebar-right') { ?>
    <aside class="tm-sidebar <?php echo esc_attr($megastar_layout); ?>" >
        <?php get_sidebar(); ?>
    </aside> <!-- end aside -->
<?php } ?>

</div> <!-- end page-wrap -->

<?php get_footer(); ?>
