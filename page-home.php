<?php 
/* 
Template name: Homepage
*/
get_header();
$idObj = get_category_by_slug(JAN14_FEATURED_CATEGORY); 
?>

	<section class="feature brownback">
		<h2 class="title">Latest <?php 
			echo $idObj->name;
		?></h2>
		<ul class="list-vertical">

<?php
		$projects = new WP_Query();
		$projects->query(array(
			'showposts' => 4,
			'cat' => $idObj->term_id,
		));
		while ($projects->have_posts()) : $projects->the_post();
?>
			<li><a href="<?php the_permalink(); ?>">
					<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=155&amp;zc=1&amp;q=<?=TIMTHUMB_QUALITY?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" height="155" width="155">
					<h3 class="title"><?php the_title(); ?></h3>
					<p class="subtitle"><?php
						$yoast_meta = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
						if ($yoast_meta) { echo $yoast_meta; }
					?></p>
				</a>
			</li>
<?php 	endwhile; ?>

		</ul>
		<p class="stuck right"><small><a href="<?php echo get_category_link( $idObj->term_id ); ?>" class="button">More <?php echo strtolower($idObj->name); ?></a></small></p>
	</section>

	<section class="feature whiteback">
		<h2 class="title">Latest Articles</h2>
		<ul class="list-horizontal">

<?php
		$blogposts = new WP_Query();
		$blogposts->query(array(
			'showposts' => 6,
			'category__not_in' => array($idObj->term_id)
		));
		while ($blogposts->have_posts()) : $blogposts->the_post();
?>
			<li><a href="<?php the_permalink(); ?>">
					<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=155&amp;h=155&amp;zc=1&amp;q=<?=TIMTHUMB_QUALITY?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" height="155" width="155">
					<h3 class="title"><?php the_title(); ?></h3>
					<p class="subtitle"><?php the_date(); ?><?php comments_number('', ' <span class="bubble" title="Comment">1</span>', ' <span class="bubble" title="Comments">%</span>'); ?></p>
				</a>
			</li>
<?php 	endwhile; ?>

		</ul>

		<p class="stuck right"><small><a href="<?php echo site_url(); ?>" class="button">More articles</a></small></p>

	</section>

<?php get_footer();
