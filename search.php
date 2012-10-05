<?php
get_header(); ?>

<div class="pageHeader">
    <div class="pageHeaderTitle">
			<h1><a href="#">Search Results</a></h1>
    </div>
    <?php if ( has_post_thumbnail() ) {
        	the_post_thumbnail();
          } else { ?>
        	<img src="<?php bloginfo('template_url'); ?>/images/defaultPageImage.jpg" class="pageHeaderImage" />
    <?php } ?>
</div>

<?php if(function_exists('dimox_breadcrumbs')): ?><?php dimox_breadcrumbs(); ?><?php endif; ?>

<article id="mainInnerContent">
<?php if (have_posts()) : ?>
	<header>
	    <h2>Displaying results for "<?php echo $_REQUEST['s']; ?>".</h2>
	</header>
    <nav>
	    <div class="clear"></div>
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		<div class="clear"></div>
    </nav>
	<?php while (have_posts()) : the_post(); ?>
	    <a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		<?php /*  <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php echo get_the_date('F jS, Y'); ?></time>  */ ?>
	    <?php the_excerpt('More'); ?>
	    <div class="clear"></div>
   <?php endwhile; ?>
	<nav>
		<div class="clear"></div>
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		<div class="clear"></div>
    </nav>
</article>
<?php else : ?>
<article>
	<header>
        <h1>Search Results</h1>
	    <h2>No Results found for "<?php echo $_REQUEST['s']; ?>"</h2>
	</header>
	<b>Try another search?</b>
    <?php get_search_form(); ?>
	<div class="clear"><br /></div>
</article>
<?php endif; ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
