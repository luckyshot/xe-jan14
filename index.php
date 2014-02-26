<?php get_header();
$idObj = get_category_by_slug(JAN14_FEATURED_CATEGORY); 
?>


	<section class="feature whiteback">
		<ul class="list-horizontal">

			<?php
				$blogposts = new WP_Query();
				$blogposts->query('showposts=6&paged='.$paged.'&exclude='.$idObj->term_id);
				while ($blogposts->have_posts()) : $blogposts->the_post();
			?>

			<li><a href="<?php the_permalink(); ?>">
					<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=155&amp;h=155&amp;zc=1&amp;q=<?=TIMTHUMB_QUALITY?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
					<h3 class="title"><?php the_title(); ?></h3>
					<p class="subtitle"><?php the_date(); ?><?php comments_number('', ' <span class="bubble" title="Comment">1</span>', ' <span class="bubble" title="Comments">%</span>'); ?></p>
				</a>
			</li>

			<?php endwhile; ?>
		</ul>


		<div class="pagination">
			<?php
				global $blogposts;
				$total = $blogposts->max_num_pages;
				// only bother with the rest if we have more than 1 page!
				if ( $total > 1 )  {
					// get the current page
					if (!$paged) {$paged = 1;}
					// structure of "format" depends on whether we're using pretty permalinks
					$format = get_option('permalink_structure') ? 'page/%#%/' : '&page=%#%';
					echo paginate_links(array(
						'base' => get_pagenum_link(1) . '%_%',
						'format' => $format,
						'current' => $paged,
						'total' => $total,
						'mid_size' => 4,
						'type' => 'list'
					 ));
				}
			?>
		</div>		

	</section>

<?php get_footer();
