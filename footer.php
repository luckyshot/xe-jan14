
	<footer>

		<p class="s4"><a href="<?php bloginfo('url'); ?>" class="logo" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></p>
		<div class="s8">
			<ul class="topfoot s12">
				<?php wp_nav_menu(array('theme_location' => 'footer-column-title-links')); ?>
			</ul>
			<ul class="profiles">
				<?php wp_nav_menu(array('theme_location' => 'footer-column-links')); ?>
			</ul>
		</div>

		<p class="footnote s6">&copy; <?php bloginfo('name'); ?> <?=date('Y');?> <small>Design by <?php /* 
		Please don't remove this credit :)
		I've worked hard on the theme and released it for free instead of making 
		a few hundred bucks selling it. See this link as your way of saying 'Thanks!' 
		*/ ?><a href="http://xaviesteve.com/" rel="nofollow">Xavi</a></small></p>

		<ul class="footlinks right s6">
			<?php wp_nav_menu(array('theme_location' => 'footer-bottom-right-links')); ?>
		</ul>

		<form class="search" action="<?php bloginfo('url'); ?>"><input type="text" id="s" name="s" title="Search" value="<?=htmlentities($_GET['s']);?>"></form>

	</footer>

	<script>setTimeout(function(){document.body.className = document.body.className.replace("loading","")},1e3);document.getElementById('s').addEventListener("focus",function(){document.getElementById('cas').className=''})</script>

	<?php wp_footer(); ?>

</body>
</html>