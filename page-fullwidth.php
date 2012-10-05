<?php
/* Template Name: Full Width */
get_header(); ?>

<?php get_sidebar(); ?>

<?php if (have_posts()) : ?>
<article>
    <?php while (have_posts()) : the_post(); ?>
	<header>
        <h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	    <?php /*  <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php echo get_the_date('F jS, Y'); ?></time>  */ ?>
    </header>
	<?php the_content('More'); ?>
    <?php endwhile; ?>
</article>
<?php endif; ?>

<?php get_footer(); ?>