<?php
/**
 * header.php
 */

global $post;

if ( is_home() || is_front_page() ) {
	$url_base = '';
	$title    = get_bloginfo( 'name' );
	$og_type  = 'website';
	$og_url   = home_url( '/' );
} else {
	$url_base = '/';
	$title    = get_the_title() . ' | ' . get_bloginfo( 'name' );
	$og_type  = 'article';
	if ( is_single() ) {
		$og_url = get_permalink();
	} else {
		$og_url = home_url( '/' );
	}
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo esc_html( $title ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<link rel="canonical" href="<?php echo esc_url( $og_url ); ?>">

	<!-- OGP -->
	<meta property="og:title" content="<?php echo esc_html( $title ); ?>">
	<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
	<meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $og_url ); ?>">
	<meta property="og:image" content="<?php echo imgDir(); ?>/common/ogp.jpg">
	<meta property="og:site_name" content="Bio Lash">

	<!-- Twitter -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@BioLash">
	<meta name="twitter:title" content="<?php echo esc_html( $title ); ?>">
	<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="twitter:image" content="<?php echo imgDir(); ?>/common/ogp.jpg">

	<?php wp_head(); ?>
</head>

<?php
if ( is_home() || is_front_page() ) {
	// ホームページまたはフロントページの場合
	$body_class = 'home';
} else {
	// その他のページの場合
	$body_class = 'page';
}
?>

<body <?php body_class( $body_class ); ?>>
	<header class="hd">
	<div class="in-lg hd-in">
		<div class="hd-logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hd-logo-link">
			<img src="<?php echo imgDir(); ?>/common/logo-wt.svg?v1.0.1" alt="Bio Lash" class="ft-logo-img" width="224" height="40">
		</a>
		</div>
		<button class="hd-ham">
		<span class="hd-ham-line"></span>
		<span class="hd-ham-line"></span>
		<span class="hd-ham-line"></span>
		</button>
		<nav class="hd-nav">
		<ul class="hd-nav-list">
			<li class="hd-nav-item">
			<a href="<?php echo $url_base; ?>#biolash" class="hd-nav-link">ビオラッシュ</a>
			</li>
			<li class="hd-nav-item">
			<a href="<?php echo $url_base; ?>#feature" class="hd-nav-link">製品特徴</a>
			</li>
			<li class="hd-nav-item">
			<a href="<?php echo $url_base; ?>#how-to-use" class="hd-nav-link">使い方</a>
			</li>
		</ul>
		</nav>
		<?php
		if ( is_home() || is_front_page() ) :
			?>
		<div class="hd-btn is-pc">
		<a href="<?php echo amazonLink(); ?>" class="hd-btn-link" target="_blank" rel="noopener noreferrer">
			<span class="hd-btn-pc">
			<span class="hd-btn-txt">Amazonで購入する</span>
			</span>
		</a>
		</div>
		<?php endif; ?>
	</div>
	</header>
	<div class="hd-btn is-sp">
	<a href="<?php echo amazonLink(); ?>" class="hd-btn-link" target="_blank" rel="noopener noreferrer">
		<span class="hd-btn-sp">
		<span class="hd-btn-icon"></span>
		<span class="hd-btn-txt">購入する</span>
		</span>
	</a>
	</div>
	<main class="main">
