<?php if(is_home() or is_single() or is_category() or is_archive()) :?>
    <ul class="uk-subnav uk-subnav-line uk-article-meta catBlogMeta">
        
        <?php if(get_post_format() == 'link' or get_post_format() == 'quote') : ?>
        <li>
            <i class="uk-icon-calendar uk-icon-justify"></i>
            <?php
                printf(get_the_date());
            ?>
        </li>
        <?php endif ?>

        <?php if(get_the_author()) : ?>
        <li class="metaUser">
            <i class="uk-icon-user uk-icon-justify"></i> <?php
                printf(esc_html__('Written by %s.', 'megastar'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>');
            ?>
        </li>
        <?php endif; ?>

        <?php if(get_the_category_list()) : ?>
        <li>
            <i class="uk-icon-gear uk-icon-justify"></i> 
            <?php
                printf(esc_html__('Posted in %s', 'megastar'), get_the_category_list(', '));
            ?>
        </li>
        <?php endif; ?>

        <?php if(comments_open() || get_comments_number()) : ?>
        <li>
            <i class="uk-icon-comment uk-icon-justify"></i> <?php comments_popup_link(__('No Comments', 'megastar'), esc_html__('1 Comment', 'megastar'), esc_html__('% Comments', 'megastar'), "", ""); ?>
        </li>
        <?php endif; ?>

        <?php edit_post_link(__('Edit this post', 'megastar'), '<li><i class="uk-icon-pencil uk-icon-justify"></i> ','</li>'); ?>
    </ul>
    <div class="uk-clearfix"></div>
<?php endif; ?>