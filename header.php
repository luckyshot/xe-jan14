<?php
wp_deregister_script('jquery');

if (strpos(get_bloginfo('url'), 'localhost') !== false) {
	error_reporting(E_WARNING);
}else{
	error_reporting(0);
}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo wp_title("",false); ?></title>
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/static/favicon.png" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" />
	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1, maximum-scale=1, minimum-scale=1"/>
	<?php wp_head(); ?>

<?php if (is_single()) { ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<style>
			body {background-image:url('<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo jan14_catch_that_image() ?>&w=960&h=460&zc=1&q=<?=JAN14_TIMTHUMB_QUALITY?>');}
			@media screen and (min-width: 960px) {body {background-image: url('<?php echo jan14_catch_that_image(); ?>');}}
		</style>
	<?php endwhile; endif; ?>
<?php } ?>

</head>


<body <?php body_class("loading"); ?>>

	<header>

		<a href="<?php bloginfo('url'); ?>" class="logo" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

		<label for="phone-menu-toggle" class="phone phone-menu-icon">&#9776;</label>
		<input type="checkbox" id="phone-menu-toggle">
		<nav>
			<?php wp_nav_menu(array('theme_location' => 'header-main')); ?>
		</nav>


<?php if (is_front_page()) { ?>
	<h1><?php bloginfo('name'); ?> 
	<small><?php bloginfo('description'); ?></small></h1>

<?php }else if (is_404()) { ?>
	<h1>Not found</h1>

<?php }elseif (is_category()) { ?>
	<h1><?php single_cat_title(); ?>
		<small>Category archive</small></h1>

<?php }elseif (is_tag()) { ?>
	<h1><?php single_tag_title(); ?>
		<small>Tag archive</small></h1>

<?php }elseif (is_day()) { ?>
	<h1><?php the_time('F jS, Y'); ?>
		<small>Daily archive</small></h1>

<?php }elseif (is_month()) { ?>
	<h1><?php the_time('F, Y'); ?>
		<small>Monthly archive</small></h1>

<?php }elseif (is_year()) { ?>
	<h1><?php the_time('Y'); ?>
		<small>Yearly archive</small></h1>

<?php }elseif (is_author()) { 
	$author = get_userdata( get_query_var('author') ); ?>
	<h1><?php echo $author->display_name; ?>
		<small>Author archive</small></h1>

<?php }else if (is_search()) { ?>
	<h1>Searching <i><?=htmlentities($_REQUEST['s']);?></i></h1>

<?php }else{ ?>

	<h1><?php the_title(); ?> 
	<small><?php
		$yoast_meta = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
		if ($yoast_meta) { echo $yoast_meta; }
	?></small></h1>
<?php } ?>

	</header>
