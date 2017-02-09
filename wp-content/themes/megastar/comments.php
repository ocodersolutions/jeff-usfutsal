<?php 

function megastar_comment( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment;?>

	<!-- <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

		<article class="uk-comment" id="comment-<?php comment_ID(); ?>"> 
		 
			<header class="uk-comment-header">
				<div class="uk-comment-avatar"><?php echo get_avatar($comment, $size = '50'); ?></div>
				<h3 class="uk-comment-title"><?php if($comment->comment_author_url == '' || $comment->comment_author_url == 'http://Website'){ echo get_comment_author(); } else { echo comment_author_link(); } ?></h3>
				<p class="uk-comment-meta"><?php printf(esc_html__('%1$s at %2$s', 'megastar'), get_comment_date(),  get_comment_time() ) ?><?php edit_comment_link( esc_html__( '(Edit)', 'megastar'),'  ','' ) ?>
				&middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  </p>  
			</header>

			<div class="uk-comment-body"><?php comment_text() ?></div>

			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'megastar' ) ?></em>
			<?php endif; ?>

		</article>
	</li> -->
	<li>
        <div class="media comment-author">
        	<a class="media-left" href="#"><?php echo get_avatar($comment, $size = '10','',$alt ='', array('class'=>'img-thumbnail')); ?></a>
          <div class="media-body">
            <h5 class="media-heading comment-heading"><?php if($comment->comment_author_url == '' || $comment->comment_author_url == 'http://Website'){ echo get_comment_author(); } else { echo get_comment_author(); } ?> says:</h5>
            <div class="comment-date"><?php printf(esc_html__('%1$s', 'megastar'), get_comment_date('d/m/Y')) ?></div>
            <?php comment_text() ?>
            <a class="replay-icon pull-right text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> 
			
            </div>
        </div>
      </li>	
	<?php
}

?>

<div class="uk-clearfix"></div>



<div class="comments-area">

	<?php
		if ( post_password_required() ) { ?>
			<div class="uk-alert uk-alert-warning"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'megastar'); ?></div></div>
		<?php
			return;
		}
	?>
	
	<?php if ( have_comments() ) : ?>
		
		<div class="comments-area">
    		<h5 class="comments-title">Comments</h5>
				
				<div class="navigation">
					<div class="next-posts"><?php previous_comments_link() ?></div>
					<div class="prev-posts"><?php next_comments_link() ?></div>
				</div>
			
				<ul class="comment-list">
					 <?php wp_list_comments(array( 'callback' => 'megastar_comment' )); ?>
				</ul>
			
				<div class="navigation">
					<div class="next-posts"><?php previous_comments_link() ?></div>
					<div class="prev-posts"><?php next_comments_link() ?></div>
				</div>
			
		</div>

		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<div class="uk-alert uk-alert-warning"><?php esc_html_e('Comments are closed.', 'megastar'); ?></div>
	
		<?php endif; ?>
		
	 <?php else : // this is displayed if there are no comments so far ?>
	
		
		
	<?php endif; ?>
		
		
<?php if ( comments_open() ) : ?>

	<div class="comment-box">
		<?php

		// Load WP Comment Reply JS
		wp_enqueue_script( 'comment-reply' );

		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//Custom Fields
		$fields =  array(
			'author' => '<div class="col-sm-6 pt-0 pb-0"><div class="form-group"><input name="author" type="text" placeholder="' . esc_html__('Enter Name', 'megastar') . '" size="30"' . $aria_req . '  class="form-control" /></div>',
			
			'email'  => '<div class="form-group"><input name="email" type="text" placeholder="' . esc_html__('Enter Email', 'megastar') . '" size="30"' . $aria_req . '  class="form-control" /></div>',
			
			'url'    => '<div class="form-group"><input name="url" type="text" placeholder="' . esc_html__('Website', 'megastar') . '" size="30" class="form-control" /></div></div>',
		);

		//Comment Form Args
        $comments_args = array(
        	'comment_notes_before' => '',
        	'comment_notes_after' => '',
        	'class_form' => '',
        	'id_form' => 'comment-form',
			'title_reply'   => esc_html__('Leave a Comment', 'megastar'),
			'title_reply_before' => '<h5>',
			'title_reply_after' => '</h5>',
			'comment_field' => '<div  class="col-sm-6"><div class="form-group"><textarea id="comment" class="form-control" placeholder="'.esc_html__('Enter Message', 'megastar').'" name="comment" aria-required="true" rows="7" tabindex="4"></textarea></div>',
			'fields'        => $fields,
			'label_submit'=> 'Submit',
			'class_submit' => 'btn btn-dark btn-flat pull-right m-0',
			'submit_button' => '<div class="form-group">
            <input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />
        </div></div>',
		);
		
		// Show Comment Form
		comment_form($comments_args);
	?>
	</div>
<?php endif;  ?>

</div>