<?php get_header(); 

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
}
$search = new WP_Query($search_query);

global $wp_query;
$total_results = $wp_query->found_posts;

?>

	<section class="feature whiteback">

		<?php if (!$total_results) { ?>
			<p class="announcement">Nothing found for <?=htmlentities($_REQUEST['s']);?>.</p>
		<?php }else{ ?>

			<ul class="list-horizontal">

				<?php while ($search->have_posts()) : $search->the_post(); ?>

				<li><a href="<?php the_permalink(); ?>">
						<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=155&amp;h=155&amp;zc=1&amp;q=<?=TIMTHUMB_QUALITY?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" height="155" width="155">
						<h3 class="title"><?php the_title(); ?></h3>
						<p class="subtitle"><?php the_date(); ?></p>
					</a>
				</li>

				<?php endwhile; ?>
				
			</ul>

		<?php } ?>

	</section>


<?php get_footer();