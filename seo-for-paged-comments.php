<?php

/*
 Plugin Name: SEO for Paged Comments
 Version: 1.0
 Description: Reduce SEO problems when using WordPress's paged comments.
 Plugin URI: http://pressedwords.com/solving-wordpress-seo-paged-comments-problem/
 Author: Austin Matzko
 Author URI: http://www.pressedwords.com
 */

function seo_paged_comments_content_filter($t = '') {
	$cpage = intval(get_query_var('cpage'));
	if ( ! empty( $cpage ) ) {
		remove_filter('the_content', 'seo_paged_comments_content_filter');
		$t = get_the_excerpt();
		$t .= sprintf('<p><a href="%1$s">%2$s</a></p>', get_permalink(), get_the_title());
	}
	return $t;
}

add_filter('the_content', 'seo_paged_comments_content_filter');
