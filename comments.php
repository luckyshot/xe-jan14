<?php // Do not delete these lines

if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie ?>

		<p>This post has a password&hellip; Enter it to show the comments.</p>

	<?php 
		return;
	}
}

/* This variable is for alternating comment background */
$oddcomment = ' alt'; ?>

<section id="comments" class="comments-list">
	<?php if ($comments) : ?>

		<?php comments_number('<h4>Comments are open</h4>', '<h3>One comment</h3>', '<h3 class="title">% comments</h3>' ); ?>
	
		<ul class="comments">
			<?php foreach ($comments as $comment) : 
				if (get_comment_type() !== 'comment') :
					// trackbacks
				else: ?>
				<?php if ($comment->user_id > 0) {$oddcomment = ' auth';} ?>
				<li id="comment-<?php comment_ID(); ?>" class="<?php echo $oddcomment; ?>">
					<div class="s8">
						<?php /*<img src="<?php gravatar('R', 45, get_bloginfo('template_url').'/static/user-avatar.png'); ?>" alt="Avatar" />*/ ?>
						<p><?php comment_author(); ?> says:</span>
					</div>
					<div class="s4">
						<span class="date"> 
						<a href="#comment-<?php comment_ID() ?>"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a>  <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></span>
					</div>
					<?php if ($comment->comment_approved == '0') : ?> <p>Your comment will appear shortly</p> <?php endif; ?>
					<?php comment_text() ?>
					
				</li>
				<?php
					/* Changes every other comment to a different class */
					$oddcomment = ( empty( $oddcomment ) ) ? ' alt ' : '';
				?>
			<?php 
				endif;
			endforeach; ?>
		</ul><!--/comments-->

<?php elseif ('open' != $post->comment_status) : ?>
<?php else : ?>
	<h4>No comments yet</h4>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : 

/**
d88888b  .d88b.  d8888b. .88b  d88. 
88'     .8P  Y8. 88  `8D 88'YbdP`88 
88ooo   88    88 88oobY' 88  88  88 
88~~~   88    88 88`8b   88  88  88 
88      `8b  d8' 88 `88. 88  88  88 
YP       `Y88P'  88   YD YP  YP  YP 
*/

?>
	<div class="comments-form">	
		<!-- <h5 id="respond">Comment Form</h5> -->
		<form id="comment-form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<p style="margin-bottom:0"><textarea name="comment" cols="50" rows="2" placeholder="Comment&hellip;"></textarea></p>
			
			<div class="hide">
				<?php if ( $user_ID ) : ?>
					<p>Commenting as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> <small><a href="<?php echo wp_logout_url(); ?>" title="Logout">Logout</a></small></p>
				<?php else : ?>
					<p class="s6" style="margin-bottom:0">
						<input id="comment-name" value="<?php echo $comment_author; ?>" name="author"  type="text" placeholder="Name" title="Name" />
					</p>
					<p class="s6" style="margin-bottom:0">
						<input id="comment-email" name="email" value="<?php echo $comment_author_email; ?>" type="text" placeholder="Email" title="Email" />
					</p>
			<?php endif; ?>								

			<p class="tr"><input name="submit" type="submit" id="submit" tabindex="5" class="button blue" value="Send Comment" />

			</div>

			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
		<?php endif; ?>
	</form>
</div><!--/comments-form-->

<?php endif; ?>
</section><!--/comments-->
