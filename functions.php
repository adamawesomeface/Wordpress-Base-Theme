<?php
/* Declair Constants */
define('SITE_URL','');
define("ANALYTICS_CODE","UA-XXXXX-X");
define("LESS","1");
define("HOMEPAGESLIDER", "1");
define("SEARCH_BAR","0");

/* SOCIAL Constants */
define("TWITTER","#twitter");
define("FACEBOOK","#facebook");
define("LINKEDIN","#linkedIn");
define("GOOGLEPLUS","#googlePlus");
define("YOUTUBE","#youtube");

/* for Security Let's Hide our Wordpress Version */
function wpt_remove_version() {
   return '';
}
add_filter('the_generator', 'wpt_remove_version');


/* Short Codes */
add_shortcode('break', 'theme_shortcode_break');
function theme_shortcode_break($atts) {
  extract(shortcode_atts(array(
        'class' => ''
  ), $atts));

  $html = '<div class="clear"></div>';
  return $html;
}
add_shortcode('br', 'theme_shortcode_br');
function theme_shortcode_br($atts) {
  extract(shortcode_atts(array(
        'class' => ''
  ), $atts));

  $html = '<br>';
  return $html;
}
add_shortcode('div', 'theme_shortcode_div');
function theme_shortcode_div($atts, $content = null) {
  extract(shortcode_atts(array(
        'class' => '',
		'id' => ''
  ), $atts));
  
  if ($class)   $classHtml = ' class="'.$class.'" ';
  if ($id)   $idHtml = ' id="'.$id.'" ';

  $html = '<div'.$classHtml . $idHtml .'>'.do_shortcode($content).'</div>';
  return $html;
}

add_shortcode('clear', 'theme_shortcode_clear');
function theme_shortcode_clear($atts) {
  extract(shortcode_atts(array('class' => ''), $atts));
  $html = '<div class="clear"></div>';
  return $html;
}

function my_recent_posts_shortcode($atts){
        extract(shortcode_atts(array('limit' => 5), $atts));
        $q = new WP_Query('posts_per_page=' . $limit);
        $list = '<ul class="recent-posts">';
        while($q->have_posts()) : $q->the_post();
                $list .= '<li>';
		$list .= '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
                $list .= '<div class="meta">by <a href="'.$q->post_author.'">'.get_the_author().'</a> on <a href="'.get_permalink().'">' . get_the_date().'</a></div>';
                $list .= get_the_excerpt() . '... <a href="'.get_permalink().'">Read More</a></li>';
        endwhile;
        wp_reset_query();

        return $list . '</ul>';
}

add_shortcode('recent-posts', 'my_recent_posts_shortcode');




/* Controling how many characters the Excerpt is */

function new_excerpt_length($length) {
        return 55;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* Define how the Exerpt will work with 'read more' items */

function new_excerpt_more($more) {
       global $post;
        return '<a href="'. get_permalink($post->ID) . '">Read the Rest...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('the_content', 'do_shortcode', 11);
/* Allow Shortcodes in Widgets */
add_filter('widget_text', 'do_shortcode');
add_filter('get_ept_value', 'do_shortcode');
/* Adding support for Featured Images */
add_theme_support( 'post-thumbnails' );

//This enables post and comment RSS feed links to head. This should be used in place of the deprecated automatic_feed_links.
add_theme_support('automatic-feed-links');

// reference to: http://codex.wordpress.org/Function_Reference/add_editor_style
add_theme_support('editor-style');


/* Adding Sidebar Widgets */
if ( function_exists('register_sidebar') ) register_sidebar(array('name'=>'Sidebar'));
if ( function_exists('register_sidebar') ) register_sidebar(array('name'=>'Blog Sidebar'));
if ( function_exists('register_sidebar') ) register_sidebar(array('name'=>'Homepage Text above CTAs'));
if ( function_exists('register_sidebar') ) register_sidebar(array('name'=>'Home 1'));
if ( function_exists('register_sidebar') ) register_sidebar(array('name'=>'Home 2'));
if ( function_exists('register_sidebar') ) register_sidebar(array('name'=>'Home 3'));
function theme_addmenus() {
	register_nav_menus(
		array(
			'main_nav' => 'Main Menu',
			'footer_nav' => 'Footer Menu'
		)
	);
}
add_action( 'init', 'theme_addmenus' );

function loadJquery() {
  if(!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false, '1.7.1', true);
    wp_enqueue_script('jquery');
  }
}

add_action('init', 'loadJquery');

/* Allow Shortcodes in Widgets */
add_filter('widget_text', 'do_shortcode');

/* Comments Display */

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }

		
		/* Get another pages content */
	if(!function_exists('getPageContent')):
		function getPageContent($pageId){
			if(!is_numeric($pageId)):
				return;
			endif;
			global $wpdb;
			$sql_query = 'SELECT DISTINCT * FROM ' . $wpdb->posts .
			' WHERE ' . $wpdb->posts . '.ID=' . $pageId;
			$posts = $wpdb->get_results($sql_query);
			if(!empty($posts)):
				foreach($posts as $post):
					return nl2br(do_shortcode($post->post_content));
				endforeach;
			endif;
		}
	endif;




function dimox_breadcrumbs() {

  $delimiter = '//';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<div id="crumbs">';

    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
  }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
     if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
} // end dimox_breadcrumbs()

function neat_trim($str, $n, $delim='...') {
   $len = strlen($str);
   if ($len > $n) {
       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
       return rtrim($matches[1]) . $delim;
   }
   else {
       return $str;
   }
}

/*
// Custom Login Page
function wpc_url_login(){
  return SITE_URL;
}
add_filter('login_headerurl', 'wpc_url_login');

// Custom WordPress Login Logo
function login_css() {
  wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/login.css' );
}
add_action('login_head', 'login_css');

// Custom WordPress Footer
function remove_footer_admin () {
  echo '&copy; 2012 - Yo.';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Custom WordPress Admin Color Scheme
function admin_css() {
  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

*/

define('DISALLOW_FILE_EDIT', true);
