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
			<img src="<?php imgDir(); ?>/common/logo-wt.svg" alt="Bio Lash" class="ft-logo-img" width="224" height="40">
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
		<div class="hd-btn">
		<a href="" class="hd-btn-link">
			<span class="hd-btn-pc">
			<span class="hd-btn-txt">Amazonで購入する</span>
			</span>
			<span class="hd-btn-sp">
			<span class="hd-btn-icon"></span>
			<span class="hd-btn-txt">購入する</span>
			</span>
		</a>
		</div>
		<?php endif; ?>
	</div>
	</header>
	<main class="main">
