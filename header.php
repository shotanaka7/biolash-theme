<?php
/**
 * header.php
 */

global $post;

if ( is_home() || is_front_page() ) {
	$url_base = '';
} else {
	$url_base = '/';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="hd">
    <div class="in-lg hd-in">
      <div class="hd-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hd-logo-link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Biolash Logo" class="hd-logo-img">
        </a>
      </div>
      <div class="hd-nav">
        <nav class="hd-nav-list">
          <ul>
            <li>
              <a href="<?php echo $url_base; ?>#biolash">ビオラッシュ</a>
            </li>
            <li>
              <a href="<?php echo $url_base; ?>#features">製品特徴</a>
            </li>
            <li>
              <a href="<?php echo $url_base; ?>#how-to-use">使い方</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <main class="main">