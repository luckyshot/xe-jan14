<?php get_header(); ?>

	<section class="feature whiteback">
		<ul class="list-horizontal">

			<?php
				if (have_posts()) :
				while (have_posts()) : the_post();
			?>

			<li><a href="<?php the_permalink(); ?>">
					<img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo jan14_catch_that_image() ?>&amp;w=155&amp;h=155&amp;zc=1&amp;q=<?=JAN14_TIMTHUMB_QUALITY?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
					<h3 class="title"><?php the_title(); ?></h3>
					<p class="subtitle"><?php the_date(); ?><?php comments_number('', ' <span class="bubble" title="Comment">1</span>', ' <span class="bubble" title="Comments">%</span>'); ?></p>
				</a>
			</li>

			<?php endwhile;
			endif; ?>
		</ul>

		<div class="pagination">
			<ul class="page-numbers">
				<li class="prev"><?php previous_posts_link('&laquo; Previous') ?></li>
				<li class="next"><?php next_posts_link('Next &raquo;') ?></li>
			</ul>
		</div>

	</section>

<?php get_footer();