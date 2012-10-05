<div class="clear"></div>
<footer id="footer">
    <div id="innerFooter">
    <div class="footerRight">
	<?php // TODO GET REAL SOCIAL MEDIA LINKS ?>
	<a href="<?php echo LINKEDIN; ?>" target="_blank" class="social linkedin"><span>LinkedIn</span></a>
	<a href="<?php echo TWITTER; ?>" target="_blank" class="social twitter"><span>Twitter</span></a>
	<a href="<?php echo FACEBOOK; ?>" target="_blank" class="social facebook"><span>Facebook</span></a>
	<br/><a class="lowerlinks" href="/sitemap/">Sitemap</a> <a class="lowerlinks" href="/privacy-policy/">Privacy Policy</a>
	<div class="clear"></div>
    </div>
    <div class="footerMenu">
    	<nav>
                <?php $args = array(
                  'menu'            => '5',
                  'container'       => '',
                  'menu_class'      => 'footerNav',
                  'menu_id'         => 'footerNav',
                  'echo'            => true,
                  'depth'           => 0
                  );
                ?>
                <?php wp_nav_menu($args); ?>
        </nav>
	<br/>
	&copy; <?php echo date('Y'); ?>  All Rights Reserved.   
     </div>
     <div class="clear"></div>
     </div>
     <div class="clear"></div>
</footer>
<?php wp_footer(); ?>
<div class="clear"></div>
</div><?php // #wrapper ?>

<?php /* Part 2 of Google Analytics Implimentation */ ?>
<script type="text/javascript">  (function() {
    var ga = document.createElement('script');     ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:'   == document.location.protocol ? 'https://ssl'   : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<?php /* Base Scripts for project */ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/base.js"></script>

<?php /* Cross Browser Supports */ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/selectivizr-min.js"></script>

<?php /* Project Extras Files */ ?>
<?php if(HOMEPAGESLIDER): ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slides.min.jquery.js"></script>
  <script>
    $(function(){
      $('#slider').slides({
        preload: true,
        generateNextPrev: true
      });
    });
  </script>
<?php endif; ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.colorbox-min.js"></script>

<?php /* LESS - Remove on deployment and copy over the CSS */ ?>
<?php if(LESS) { ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/less-1.2.1.min.js"></script>
<?php } ?>

</body>
</html>
