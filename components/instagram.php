<?php
/**
 * instagram.php
 */
?>
<section id="instagram" class="sec ig bg-yellow" data-hd-color>
	<div class="in-lg ig-in">
	<h2 class="ig-ttl">
		<span class="ig-ttl-icon">
		<img src="<?php imgDir(); ?>/common/icon-ig.svg?v1.0.1" alt="Instagram" width="60" height="60" loading="lazy">
		</span>
		<span class="ig-ttl-txt">INSTAGRAM</span>
	</h2>
	<?php
	$args     = array(
		'post_type'      => 'instagram',
		'posts_per_page' => 1, // 1件取得
	);
	$ig_query = new WP_Query( $args );
	if ( $ig_query->have_posts() ) :
		?>
	<div class="ig-cont">
		<?php
		while ( $ig_query->have_posts() ) :
			$ig_query->the_post();
			the_content();
		endwhile;
		wp_reset_postdata();
		?>
	</div>
	<?php endif; ?>
	</div>
</section>
