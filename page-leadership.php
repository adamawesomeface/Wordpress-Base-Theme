<?php
/* Template Name: Leadership */
get_header(); ?>

<?php get_sidebar(); ?>
<?php wp_reset_query(); ?>


<article id="mainInnerContent">
    <?php wp_reset_query(); ?>
	<?php 
		$args = array(
				'post_type'		=> 'leaders'
		); 
		$leaders = new WP_Query( $args);
	?>
    <p>
    <?php if ($leaders->have_posts()) : ?>
    <?php while ($leaders->have_posts()) : $leaders->the_post(); ?>
		<div class="leader" >
    	        <img class="alignleft size-full wp-image-94" title="<?php the_ept_field('name',array('raw'=>'true')); ?>" src="<?php the_ept_field('imageurl',array('raw'=>'true')); ?>" alt="" width="109" height="109" />
    	        	<strong>Name</strong>: <?php the_ept_field('name',array('raw'=>'true')); ?><br />
    	        	<strong>Classification</strong>: <?php the_ept_field('classification',array('raw'=>'true')); ?><br />
    	        	<strong>Directive: </strong><?php the_ept_field('directive',array('raw'=>'true')); ?><br/>
    	        	<div class="attr">
    	        		<strong>Attributes: </strong><?php the_ept_field('attributes',array('raw'=>'true')); ?>
    	        	</div>
    	    <div class="clear"></div> 
		</div>
	<?php endwhile; endif; ?>
	</p>
</article>

<?php get_footer(); ?>
                                  