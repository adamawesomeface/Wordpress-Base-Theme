<?php
/**
 * @package 
 * @subpackage 
 */
get_header(); ?>

<div class="pageHeader">
    <div class="pageHeaderTitle">
	<h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
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
    <?php while (have_posts()) : the_post(); ?>
	<?php the_content('More'); ?>
	   <?php comment_form(); ?>

    	   <ul class="commentlist">
                <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
           </ul>


    <?php endwhile; ?>
<?php endif; ?>
</article>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
                                  
