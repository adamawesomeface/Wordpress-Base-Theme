<?php
/**
 * @package 
 * @subpackage 
 */
get_header(); ?>

<div class="pageHeader">
    <div class="pageHeaderTitle">
	    <h1><a href="#">Page Not Found</a></h1>
    </div>
    <?php if ( has_post_thumbnail() ) {
        	the_post_thumbnail();
          } else { ?>
        	<img src="<?php bloginfo('template_url'); ?>/images/defaultPageImage.jpg" class="pageHeaderImage" />
    <?php } ?>
</div>

<?php if(function_exists('dimox_breadcrumbs')): ?><?php dimox_breadcrumbs(); ?><?php endif; ?>

<article id="mainInnerContent">
<?php wp_reset_query(); ?>
    The file or page you were attempting to access cannot be found.  Please check your link and try again.  
</article>
<?php get_sidebar(); ?>

<?php get_footer(); ?>