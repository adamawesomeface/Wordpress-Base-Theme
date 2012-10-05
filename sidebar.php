<aside id="sidebar">
<?php wp_reset_query(); ?>
<?php if(is_page('news') || is_page('blog') || is_single() || is_archive()){ ?>
	    <ul class="blogCats">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar') ) : ?>
			<?php endif; ?>
		</ul>
<?php } ?>

	<ul>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
	<?php endif; ?>
	</ul>
</aside>
