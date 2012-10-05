<?php
/* Template Name: Blog */
get_header(); ?>

<?php get_sidebar(); ?>
<?php wp_reset_query(); ?>
<?php global $more; ?>
<?php $page = get_query_var('paged'); ?>
<?php $args = array(
		'posts_per_page'	=> 10,
		'paged'				=> $page,
		'post_type'			=> 'post'
		); ?>
<?php query_posts( $args ); ?>
<?php if (have_posts()) : ?>
<article>
    <?php while (have_posts()) : the_post(); ?>
	<?php $more = 0; ?>
	<header>
        <h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<?php  if ( has_post_thumbnail() ) the_post_thumbnail( 'full' ); ?>
	    <?php /*  <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php echo get_the_date('F jS, Y'); ?></time>  */ ?>
    </header>
	<?php the_content('More'); ?>
    <?php endwhile; ?>
</article>
<?php endif; ?>

<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>

<?php get_footer(); ?>
                                  