<?php

/**
 * Pagination function
 */

function megastar_pagination() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="col-md-12"><nav><ul class="pagination theme-colored">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="pagination-prev">%s</li>' . "\n", get_previous_posts_link('<i class="uk-icon-angle-double-left"></i>') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';
		if (1 == $paged) {
			printf( '<li%s><span>%s</span></li>' . "\n", $class, '1' );
		} else {
			printf( '<li><a href="%s">%s</a></li>' . "\n", esc_url( get_pagenum_link( 1 ) ), '1' );
		}

		if ( ! in_array( 2, $links ) )
			echo '<li><span>...</span></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		
		if ($paged == $link) {
			printf( '<li%s><span>%s</span></li>' . "\n", $class, $link );
		} else {
			printf( '<li><a href="%s">%s</a></li>' . "\n", esc_url( get_pagenum_link( $link ) ), $link );
		}
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><span>...</span></li>' . "\n";
		$class = $paged == $max ? ' class="uk-active"' : '';
		if ($paged == $max) {
			printf( '<li%s><span>%s</span></li>' . "\n", $class, $max );
		} else {
			printf( '<li><a href="%s">%s</a></li>' . "\n", esc_url( get_pagenum_link( $max ) ), $max );
		}
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="pagination-next">%s</li>' . "\n", get_next_posts_link('<i class="uk-icon-angle-double-right"></i>') );

	echo '</ul></nav></div>' . "\n";
}


?>

<div class="pagination-wrapper">
	<?php megastar_pagination(); ?>
	<p class="uk-hidden"><?php posts_nav_link(); ?></p>
</div>

