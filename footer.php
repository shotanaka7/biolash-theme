<?php
/**
 * footer.php
 */
?>
</main>
<footer class="ft">
	<div class="in-lg">
	<div class="ft-top">
		<div class="ft-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ft-logo-link hov-fade">
			<img src="<?php echo imgDir(); ?>/common/logo-bk.svg?v1.0.1" alt="Bio Lash" class="ft-logo-img" width="224" height="40">
		</a>
		</div>
		<nav class="ft-nav">
		<ul class="ft-nav-list">
			<li class="ft-nav-item">
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ft-nav-link hov-fade">CONTACT</a>
			</li>
			<li class="ft-nav-item">
			<a href="<?php echo esc_url( home_url( '/company/' ) ); ?>" class="ft-nav-link hov-fade">COMPANY</a>
			</li>
		</ul>
		</nav>
	</div>
	<div class="ft-bottom">
		<p class="ft-copyright">
		<small>&copy; 2025 Bio Lash</small>
		</p>
	</div>
	</div>
</footer>
<?php
wp_footer();
