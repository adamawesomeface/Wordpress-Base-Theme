<?php
/**
 * @package 
 * @subpackage 
 */
get_header(); ?>

<?php if(HOMEPAGESLIDER): ?>
<?php /*
<div id="slider">
    <div class="slides_container">

    <?php wp_reset_query(); ?>
	<?php 
		$args = array(
				'post_type'		=> 'sliders',
				'orderby'		=> 'meta_value',
				'meta_key'		=> 'sorder',
				'order'			=> 'ASC'
		); 
		$slider = new WP_Query( $args);
	?>
    <?php if ($slider->have_posts()) : ?>
    <?php while ($slider->have_posts()) : $slider->the_post(); ?>
		<div class="slide" onclick="location.href='<?php the_ept_field('slink',array('raw'=>'true')); ?>';" style="cursor:pointer;">
			<div class="sliderImgHolder">
				<div class="overlay">
					<h1 class="<?php the_ept_field('stextcolor',array('raw'=>'true')); ?>"><?php the_ept_field('sheader',array('raw'=>'true')); ?></h1>
					<h2><?php the_ept_field('stext',array('raw'=>'true')); ?></h2>
					<a href="<?php the_ept_field('slink',array('raw'=>'true')); ?>" class="more btn"><?php the_ept_field('smoretext',array('raw'=>'true')); ?></a>
				</div><!--/overlay-->
				<img src="<?php the_ept_field('simage',array('raw'=>'true')); ?>" alt="slider image one" />
			</div><?php // .sliderImgHolder ?>
		</div><!--/slide-->
	<?php endwhile; endif; ?>
    </div><!--/slides_container-->
</div><!--/slider-->
<div class="clear"></div>
*/ ?>
<?php endif; ?>

<div id="mainContent">


	<div class="clear"></div>
</div>

<?php get_footer(); ?>
                                  
