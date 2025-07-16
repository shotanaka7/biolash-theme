<div class="outro">
	<div class="outro-kv mask-img">
	<picture>
		<source srcset="<?php imgDir(); ?>/home/product-kv-lg.webp?v1.0.1" media="(min-width: 768px)" width="1442" height="791">
		<img src="<?php imgDir(); ?>/home/product-kv-lg-sp.webp?v1.0.1" alt="" width="354" height="396" loading="lazy">
	</picture>
	</div>
	<div class="outro-cont">
	<div class="in-lg">
		<?php
		$args      = array(
			'post_type'      => 'list',
			'posts_per_page' => -1, // 全件取得
		);
		$faq_query = new WP_Query( $args );

		if ( $faq_query->have_posts() ) :
			?>
		<ul class="faq-list fadein-wrap">
			<?php
			while ( $faq_query->have_posts() ) :
				$faq_query->the_post();
				?>
		<li class="faq-item fadein-item">
			<button class="faq-ques txt js-acc-trigger">
				<?php the_title(); ?>
			<span class="faq-ques-icon"></span>
			</button>
			<div class="faq-ans js-acc-cont">
			<div class="faq-ans-in">
				<?php the_content(); ?>
			</div>
			</div>
		</li>
				<?php
			endwhile;
		endif;
		?>
		</ul>
	</div>
	</div>
</div>
