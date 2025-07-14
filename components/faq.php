<?php
/**
 * faq.php
 */
?>
<section id="faq" class="faq sec">
  <div class="in-lg faq-in">
    <h2 class="sec-ttl">
      <span class="sec-ttl-en">Q&A</span>
      <span class="sec-ttl-ja">よくあるご質問</span>
    </h2>

    <?php
		$args      = array(
			'post_type'      => 'faq',
			'posts_per_page' => -1, // 全件取得
		);
		$faq_query = new WP_Query( $args );

		if ( $faq_query->have_posts() ) :
			?>
    <ul class="faq-list">
      <?php
			while ( $faq_query->have_posts() ) :
				$faq_query->the_post();
				?>
      <li class="faq-item">
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
</section>