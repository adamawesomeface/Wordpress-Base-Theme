<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php
/**
 * @package Core3Solutions
 * @subpackage Core3Solutions
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta property="og:url" content="/" />
<meta property="og:title" content="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>" />
<meta property="og:description" content="" />
<meta property="og:image" content="/images/logo.png" />


<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico?3" type="image/x-icon">
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/wordpress.css" type="text/css" media="screen" />
<link href="<?php bloginfo('template_url'); ?>/css/colorbox.css" rel="stylesheet" type="text/css" />
<?php if(LESS){ ?>
<link rel="stylesheet/less" href="<?php bloginfo('template_url'); ?>/less/style.less" type="text/css" />
<?php } else { ?>
<link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet" type="text/css" />
<?php } ?>

<?php wp_head(); ?>

<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie7.css" />
<![endif]-->
<!--[if lte IE 6]>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie6.css" />
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/supersleight-min.js"></script>
<![endif]-->

<?php /* Part 1 of Analytics Code */ ?>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo ANALYTICS_CODE; ?>']);
    _gaq.push(['_trackPageview']);
  </script>
<?php /* End of Analytics Code */ ?>

</head>
<body>
<div id="wrapper" class="<?php if(is_home()): echo 'home'; else: echo 'inner'; endif; ?> <?php echo $post->post_name; ?>">
<header>
    <a href="/"><h1 class="logo"><span></span></h1></a>
	<nav>
		<?php $args = array(
		  'menu'	    => '3',
		  'container'	    => '',
		  'menu_class'      => 'topNav', 
		  'menu_id'         => 'topNav',
		  'echo'            => true,
		  'depth'           => 0
		  );
		?>
		<?php wp_nav_menu($args); ?> 
	</nav>
	<?php if(SEARCH_BAR): ?>
	<?php get_search_form(); ?>
	<?php endif;

	<div class="clear"></div>
</header>
<div class="clear"></div>
