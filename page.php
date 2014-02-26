<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="whiteback">

		<div class="post">
		
			<?php the_content(); ?>
		
		</div>
		
	</article>

<?php endwhile; endif; ?>

<?php get_footer();