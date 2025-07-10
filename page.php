<?php
/**
 * page.php
 */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
<h1 class="page-title">
  <span class="page-title-en"><?php echo esc_html( $post->post_name ); ?></span>
  <span class="page-title-ja"><?php the_title(); ?></span>
</h1>
<div class="page-content">
  <?php
		the_content();
	endwhile;
endif;
?>
</div>

<?php
get_footer();