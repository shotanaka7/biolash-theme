<?php
/**
 * page.php
 */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
<div class="page-body">
  <h1 class="sec-ttl">
    <span class="sec-ttl-en"><?php echo esc_html( $post->post_name ); ?></span>
    <span class="sec-ttl-ja"><?php the_title(); ?></span>
  </h1>
  <div class="page-cont">
    <div class="in-lg">
      <?php
		the_content();
	endwhile;
endif;
?>
    </div>
  </div>
</div>

<?php
	get_footer();