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
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ft-logo-link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Biolash Logo" class="ft-logo-img">
        </a>
      </div>
      <div class="ft-nav">
        <nav class="ft-nav-list">
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>