<?php
/**
 * @package 
 * @subpackage 
 */
get_header(); ?>

<div class="pageHeader">
    <div class="pageHeaderTitle">
			<h1>
<?php if ( is_day() ) : ?>
    <?php printf( __( 'Daily Archives: <span>%s</span>', 'theme' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
    <?php printf( __( 'Monthly Archives: <span>%s</span>', 'theme' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
    <?php printf( __( 'Yearly Archives: <span>%s</span>', 'theme' ), get_the_date('Y') ); ?>
<?php elseif ( is_category() ) : ?>
    <?php printf( __( '%s Archive', 'theme' ), single_cat_title() ); ?>
<?php else : ?>
    <?php _e( 'Blog Archives', 'theme' ); ?>
<?php endif; ?>
        </h1>
    </div>
    <?php if ( has_post_thumbnail() ) {
        	the_post_thumbnail();
          } else { ?>
        	<img src="<?php bloginfo('template_url'); ?>/images/defaultPageImage.jpg" class="pageHeaderImage" />
    <?php } ?>
</div>

<?php if(function_exists('dimox_breadcrumbs')): ?><?php dimox_breadcrumbs(); ?><?php endif; ?>

<article id="mainInnerContent">
<?php rewind_posts(); ?>
	<?php if (have_posts()) : ?>
    <section>
    <?php while (have_posts()) : the_post(); ?>
        <header>
		    <h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php /*  <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php echo get_the_date('F jS, Y'); ?></time>  */ ?>
		</header>
        <?php the_content('More'); ?>
	</section>
    <?php endwhile; ?>

</article>
<?php endif; ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>