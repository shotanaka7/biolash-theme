<?php
/**
 * index.php
 */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		// Display the content of the post
		the_content();
	endwhile;
else :
	// If no posts found, display a message
	echo '<p>No posts found.</p>';
endif;

get_footer();