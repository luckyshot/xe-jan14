<?php 
/* 
Template name: Contact
*/
get_header(); ?>

	<section class="feature whiteback">

		<div class="post">
			<?php the_content(); ?>
		</div>

		<p class="announcement"><?php echo JAN14_CONTACT_EMAIL_ADDRESS; ?><br>
			<small><a href="https://twitter.com/<?php echo JAN14_TWITTER_ACCOUNT; ?>" title="Twitter" rel="nofollow">@<?php echo JAN14_TWITTER_ACCOUNT; ?></a></small>
		</p>

	</section>

	

<?php get_footer();