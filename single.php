<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article class="whiteback">
		
		<div class="post">

			<div class="meta">
				<div class="s6">
					<i class="avatar"></i> 
					<p>by <?php the_author_link(); ?><br>
					<small>on <?php the_time(get_option('date_format')); ?></small></p>		
				</div>
				<div class="s2" style="padding-top:20px;">
					<div style="float: left;"><a href="https://twitter.com/share" class="twitter-share-button" data-via="" data-related="" data-url="<?php the_permalink(); ?>">Tweet</a></div>
				</div>
				<div class="s2" style="padding-top:16px;">
					<div id="fb-root"></div><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
				</div>
				<div class="s2" style="padding-top:20px;">
					<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
				</div>
			</div>



			<div class="content">
				<?php
					ob_start();
					the_content();
					$the_content = ob_get_clean();

					// Remove the first image from the content since we've put it as background
					$the_content = preg_replace('(<p><img.*?></p>)', '', $the_content, 1);

					// Add CSS class to the first paragraph
					$the_content = preg_replace('(<p>)', '<p class="first">', $the_content, 1);

					echo $the_content;
				?>
			</div>

		</div>	

		<section class="greylightback">
			<p class="grey center">Please share the article</p>
			
			<div class="stuck center">
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo TWITTER_ACCOUNT; ?>" data-related="xaviesteve" data-count="vertical" data-url="<?php the_permalink(); ?>">Tweet</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>"></div>
			</div>
			
			<p class="grey center"><small><?php the_author(); ?> wrote this article on <?php the_time(get_option('date_format')); ?>.</small></p>
		</section>

		<div class="post">

			<?php comments_template(); ?>

		</div><!-- .post -->
		
	</article>


<!--Twitter--><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!--Facebook--><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) {return;}js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=28624667607";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<!--Google+--><script type="text/javascript">window.___gcfg = {lang: 'en-GB'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>


<?php endwhile; endif; ?>

<?php get_footer();