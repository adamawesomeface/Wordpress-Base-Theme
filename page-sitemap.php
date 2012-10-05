<?php
/* Template Name: Sitemap */
get_header(); ?>

<div class="pageHeader">
    <div class="pageHeaderTitle">
			<h1><?php the_title(); ?></h1>
    </div>
    <?php if ( has_post_thumbnail() ) {
        	the_post_thumbnail();
          } else { ?>
        	<img src="<?php bloginfo('template_url'); ?>/images/defaultPageImage.jpg" class="pageHeaderImage" />
    <?php } ?>
</div>

<?php if(function_exists('dimox_breadcrumbs')): ?><?php dimox_breadcrumbs(); ?><?php endif; ?>

<article id="mainInnerContent">
	<header>
	    <h2>Pages</h2>
	</header>
        <ul>
            <?php wp_list_pages('depth=0&sort_column=menu_order&title_li=' ); ?>
        </ul>
    </section>
	<?php $exclude_cats = ''; ?>
    
	<section>
	    <header>
		<h2>Category Archives</h2>
	    </header>
	    <ul>
	      <?php if(is_array($exclude_cats)){ ?>
                    <?php wp_list_categories( array( 'exclude'=> implode(",",$exclude_cats), 'feed' => __( 'RSS', 'theme' ), 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false ) ); ?>
              <?php } else { ?>
                    <?php wp_list_categories( array( 'exclude'=> $exclude_cats, 'feed' => __( 'RSS', 'theme' ), 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false ) ); ?>
              <?php } ?>
            </ul>
        </section>
	
	<?php $archive_query = new WP_Query( array('showposts' => 1000,'category__not_in' => $exclude_cats )); ?>
    
	<section>
	    <header>
		<h2>Blog Posts</h2>
	    </header>
            <ul>
		<?php while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
		    <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __("Permanent Link to %s", 'theme'), get_the_title() ); ?>"><?php the_title(); ?></a> (<?php comments_number('0', '1', '%'); ?>)</li>
		<?php endwhile; ?>
            </ul>
        </section>

</article>
<?php get_sidebar(); ?>

<?php get_footer(); ?>