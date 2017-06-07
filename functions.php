<?php
/**
 * PENROWP 2.0 functions and definitions
 * 
 * @package WordPress
 * @subpackage PENROWP
 * @since PENRO WP
 */

// Readme:
// Find $metadesc to change website's description

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

add_theme_support( 'automatic-feed-links' );

// Styles and Scripts
function penrowp2_scripts() {
    
    wp_enqueue_style(  'style', get_stylesheet_uri() );   
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0', true );
    wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'penrowp2_scripts' );

// Define content width
if ( ! isset( $content_width ) ) $content_width = 900;

function theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

/**
 * Attach a class to linked images' parent anchors
 * Works for existing content
 */
function give_linked_images_class($content) {

  $classes = 'img-link'; // separate classes by spaces - 'img image-link'

  // check if there are already a class property assigned to the anchor (should be $content and not $classes - but it work! lol )
  if ( preg_match('/<a.*? class=".*?"><img/', $classes) ) {
    // If there is, simply add the class
    $content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content);
  } else {
    // If there is not an existing class, create a class property
    $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
  }
  return $content;
}

add_filter('the_content','give_linked_images_class');

// META TAGS 
//

// important 
function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

// function starts here
function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
            $img_src = $img_src[0];
        } else {
            $img_src = get_template_directory_uri() . '/images/opengraph_image.jpg';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $metadesc = 'Official news portal for Provincial Environment and Natural Resources Office (PENRO) activities and updates.';
            $excerpt = $metadesc;
        }
        ?>

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?> - <?php bloginfo('description'); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php the_title(); ?>">
    <meta name="twitter:description" content="<?php echo $excerpt; ?>">
    <meta name="twitter:image:src" content="<?php echo $img_src; ?>">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php the_title(); ?>">
    <meta itemprop="description" content="<?php echo $excerpt; ?> | <?php echo get_bloginfo(); ?> - <?php bloginfo('description'); ?>">
    <meta itemprop="image" content="<?php echo $img_src; ?>">
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);


//
// END META TAGS


// Enable post thumbnails

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1000, 380, array ('center', 'top') ); // default Post Thumbnail dimensions (cropped)
    
    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'homepage-thumb', 230, 220, array ('center', 'center') );
    add_image_size( 'post-thumbnail', 1000,380, array ('center', 'top') );
}

// Change image compression quality
add_filter('jpeg_quality', function($arg){return 75;});

// NAVIGATION

function register_my_menus() {
    register_nav_menus( array(
        'newnav'     => __('Primary Menu','penrowp2-0'),
        'mobprimary' => __('Mobile Primary Menu','penrowp2-0'),
        'topnav'     => __('Top Menu','penrowp2-0')
        )
    );
}
// Add support for WP 3.0 custom menus
add_action('init', 'register_my_menus');

// Top Nav
function topnav_wrap() {
    $topnavwrap = '<ul class="topnav-links">';
    $topnavwrap .= '%3$s';
    // close the <ul>   
    $topnavwrap .= '</ul>';
    // return the result
    return $topnavwrap;
}

// Desktop
function mainnav_wrap() {
    $mainnavwrap = '<ul class="nav navbar-nav">';
    $mainnavwrap .= '%3$s';
    //$mainnavwrap = '<li class="nav-item">%3$s</li>';
    // close the <ul>
    $mainnavwrap .= '</ul>';
    // return the result
    return $mainnavwrap;
}

// mobile navigation wrap
function mobnav_wrap() {
    $mobnavwrap = '<ul class="mob-menu">';
    // per item 
    $mobnavwrap .= '%3$s';
    // close the <ul>
    $mobnavwrap .= '</ul>';
    // return the result
    return $mobnavwrap;
}

// New Nav
function newnav_wrap() {
    $newnavwrap = '%3$s';
    // return the result
    return $newnavwrap;
}

// END OF NAVIGATION

//Excerpt Length
function theExcerptLength( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'theExcerptLength' );

//Change "[...]" into an ellipsis "..."
function excerptMore( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'excerptMore' );

// adds excerpt length on the fly - usage: echo excerpt(30)
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

// W I D G E T S //

// Widgets - Front Page
function frontpage_widget() {
    
    // Front-page Sidebar
    register_sidebar( array(
        'name' => 'Sidebar - Front Page',
        'id' => 'frontpage_sidebar_widget',
        'description' => __( 'Widget for displaying announcements and sidebar widgets.', 'penrowp2-0' ),
        'before_widget' => '<div class="card announcement card-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="headertext center">',
        'after_title' => '</h3>',
    ));
    
    // Article Post Sidebar
    register_sidebar( array(
        'name' => 'Sidebar - Article Page',
        'id' => 'sidebar_widget',
        'description' => __( 'an area for displaying sidebar widgets that only be seen on single-post or an article.', 'penrowp2-0' ),
        'before_widget' => '<div class="card announcement card-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="headertext center">',
        'after_title' => '</h3>',
    ));
    
    // Downloads Post Sidebar
    register_sidebar( array(
        'name' => 'Sidebar - Downloads',
        'id' => 'downloads_sidebar_widget',
        'description' => __( 'an area for displaying sidebar widgets that only be seen on downloads.', 'penrowp2-0' ),
        'before_widget' => '<div class="card announcement card-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="headertext center">',
        'after_title' => '</h3>',
    ));
    
    // Search Post Sidebar
    register_sidebar( array(
        'name' => 'Sidebar - Search Page',
        'id' => 'search_sidebar_widget',
        'description' => __( 'an area for displaying sidebar widgets that only be seen on search page.', 'penrowp2-0' ),
        'before_widget' => '<div class="card announcement card-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="headertext center">',
        'after_title' => '</h3>',
    ));
    
    // Index Page Sidebar
    register_sidebar( array(
        'name' => 'Sidebar - Category Page',
        'id' => 'index_sidebar_widget',
        'description' => __( 'an area for displaying sidebar widgets that only be seen on category page.', 'penrowp2-0' ),
        'before_widget' => '<div class="card announcement card-block">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="headertext center">',
        'after_title' => '</h3>',
    ));
    
    // Announcement Slider
    register_sidebar( array(
        'name' => 'Announcement Slider',
        'id' => 'announcement',
        'description' => __( 'a slider area where announcement post will appear with ease.', 'penrowp2-0' ),
        'before_widget' => '<div class="card announcement-slider card-block">',
        'after_widget' => '</div>',
    ));
    
     // Comment Box
        register_sidebar( array(
            'name' => 'Comment Box',
            'id' => 'commentbox',
            'description' => __( 'embed a comment box service (i.e. Disqus).', 'penrowp2-0' ),
        ));
    
    // Google Map
    register_sidebar( array(
        'name' => 'Office Location Map',
        'id' => 'gmap',
        'description' => __( 'Google Map for your company address. (Use "Text" Widget and paste the iframe codes)', 'penrowp2-0' ),
    ));
    
    // Time
    register_sidebar( array(
        'name' => 'Time',
        'id' => 'time',
        'description' => __( 'Embed a time widget, recommend use PAGASA Philippine Time', 'penrowp2-0' ),
        'before_widget' => '<div class="timePanel hidden-md-down">',
        'after_widget' => '</div>',
    ));
    
    // Feedback Modal
    register_sidebar( array(
        'name' => 'Feedback',
        'id' => 'feedback',
        'description' => __( 'Place a feedback / contact form here, it will appear once you click "Feedback" button on Menu ', 'penrowp2-0' ),
        'before_widget' => '<div class="modal fade bd-example-modal-sm" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true"><div class="modal-dialog modal-sm">',
        'after_widget' => '</div></div>',
    ));
}
add_action('widgets_init', 'frontpage_widget');

// Bootstrap Pagination style
function crazy_pagination ($pages = '', $range = 4) {
    //$showitems = ($range * 2)+1; 
    $showitems = $range +1;
    
    global $paged;
    if (empty($paged)) $paged = 1;
    
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }
    
    if(1 != $pages) {
        
        echo "<div class='card card-block text-xs-center'><nav aria-label='Page navigation'><ul class='pagenation'>";
        
        // First 
        if ($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'><span class='hidden-xs sr-only'> First </span><i class='fa fa-angle-double-left'></i></a></li>";
        
        // Prev
        if ($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'><i class='fa fa-angle-left'></i><span class='hidden-xs sr-only'> Previous </span></a></li>";
        
        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                echo ($paged == $i)? "<li><a class='nolink actve'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactve' >".$i."</a></li>";
            }
        }
        
        // Next
        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' aria-label='Next' ><span class='hidden-xs sr-only'>Next </span><i class='fa fa-angle-right'></i></a></li>";

        // Last
        if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last' ><span class='hidden-xs sr-only'>Last </span><i class='fa fa-angle-double-right'></i></a></li>";
        
        echo "</ul></nav>";
        echo "</div>";
    }
}

// Walker Class for desktop

class mobnav_walker extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='mob-sub-menu'>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : ''; 
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        
        global $item_output;
        
        if ($depth == 0) {
            $output .= '<li' . $id . $class_names .'>';
        }
        if ($depth == 1) {
            $output .= '<li' . $id . $class_names .'>';
        }
        
        $attributes = '';
        
        ! empty( $item->attr_title ) and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
        ! empty( $item->xfn )and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
        ! empty( $item->url )and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
        
        $title = apply_filters ('the_title', $item->title, $item->ID);
        
        $item_output = $args->before;
        $item_output .= '<a class="mob-link" '. $attributes .'>'; 
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
           
    }
    
}

class topnav_walker extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        //$output .= "\n$indent<div class=\"nav-dropdown-content\"><ul>\n";
        $output .= "\n$indent<ul class='footnav-second-level'>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
        
        global $item_output;
        
        if ($depth == 0) {
            $output .= "<li class='topnav-links'>";
        }
        if ($depth == 1) {
            $output .= "<li>";
        }
        
        $attributes = '';
        
        ! empty( $item->attr_title ) and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
        ! empty( $item->xfn )and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
        ! empty( $item->url )and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
        
        $title = apply_filters ('the_title', $item->title, $item->ID);
        
        $item_output = $args->before;
        $item_output .= '<a '. $attributes .'>'; 
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
}

class newnav_walker extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        //$output .= "\n$indent<div class=\"nav-dropdown-content\"><ul>\n";
        $output .= "\n$indent<ul>\n"; // second-level menu
    }
    
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
        
        global $item_output;
        
        if ($depth == 0) { // has secondary-menu
            $output .= "<li class='secmenu'>";
        }
        if ($depth == 1) { // no secondary-menu
            $output .= "<li>";
        }
        
        $attributes = '';
        
        ! empty( $item->attr_title ) and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
        ! empty( $item->xfn )and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
        ! empty( $item->url )and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
        
        $title = apply_filters ('the_title', $item->title, $item->ID);
        
        $item_output = $args->before;
        $item_output .= '<a '. $attributes .'>'; 
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
}

function get_first_image_url ($post_ID) {
 global $wpdb;
 $default_image = get_template_directory_uri() . "/images/no-thumbs.jpg";   //Defines a default image
 $post = get_post($post_ID);
 $first_img = '';
 ob_start();
 ob_end_clean();
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 $first_img = $matches [1] [0];

 if(empty($first_img))
 { 
    $first_img = $default_image;
 }
 return $first_img; }


// FORECE 404

//add_action( 'wp', 'force_404' );
function force_404() {
    global $wp_query; //$posts (if required)
    if(is_page()){ // your condition
        status_header( 404 );
        nocache_headers();
        include( get_query_template( '404' ) );
        die();
    }
}

// Custom Theme Options
function penrowp_options ( $wp_customize ) {
    
    // P A N E L \\
    
    $wp_customize->add_panel( 
        'pwp_panel', 
        array (
            'title'          => __( 'PENROWP Theme Options', 'penrowp2-0' ),
            'priority'       => 1,
            'section'       => 'pwp_panel',
            'capability'     => 'edit_theme_options',
            'description'    => __( 'Customize your PENRO Wordpress Theme.', 'penrowp2-0' ),
        ) 
    );

    // S E C T I O N S \\
    
    $wp_customize->add_section (
        'pwp_sect_info',
        array (
            'title'         => __( 'Information', 'penrowp2-0' ),
            'priority'      => 1,
            'capability'    => 'edit_theme_options',
            'description'   => __( "Resources and Guides for the theme's needs.", 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    $wp_customize->add_section (
        'pwp_sect_contact',
        array (
            'title'         => __( 'Contact Details', 'penrowp2-0' ),
            'priority'      => 2,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Add contact details - email, address and telephone number', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    $wp_customize->add_section (
        'pwp_sect_sitebg',
        array (
            'title'         => __( 'Background', 'penrowp2-0' ),
            'priority'      => 3,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change image or color of the background.', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    
    $wp_customize->add_section (
        'pwp_sect_header',
        array (
            'title'         => __( 'Header', 'penrowp2-0' ),
            'priority'      => 4,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change text color and add contact details.', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    
    $wp_customize->add_section (
        'pwp_sect_content',
        array (
            'title'         => __( 'Content', 'penrowp2-0' ),
            'priority'      => 5,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change color of buttons and links.', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    $wp_customize->add_section (
        'pwp_sect_widget',
        array (
            'title'         => __( 'Widget', 'penrowp2-0' ),
            'priority'      => 6,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Built-in widget image and url (up to 5 slots).', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    $wp_customize->add_section (
        'pwp_sect_admin',
        array (
            'title'         => __( 'Administrators', 'penrowp2-0' ),
            'priority'      => 7,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change the portraits of the office administrators.', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    
    $wp_customize->add_section (
        'pwp_sect_footer',
        array (
            'title'         => __( 'Footer', 'penrowp2-0' ),
            'priority'      => 8,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change the color of the footer image, color and links color.', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    $wp_customize->add_section (
        'pwp_sect_msg',
        array (
            'title'         => __( 'Alert / Message', 'penrowp2-0' ),
            'priority'      => 9,
            'capability'    => 'edit_theme_options',
            'panel'         => 'pwp_panel',
        )
    );
    
    $wp_customize->add_section (
        'pwp_sect_fb',
        array (
            'title'         => __( 'Facebook Integration', 'penrowp2-0' ),
            'priority'      => 10,
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Comments box configuration', 'penrowp2-0' ),
            'panel'         => 'pwp_panel',
        )
    );
    
    
    // S E T T I N G S \\
    
    // MESSAGE 
    
    $wp_customize->add_setting (
        'alert_type',
        array (
            'default'       =>  'alert-success',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'alert_icon',
        array (
            'default'       =>  'check-circle',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'alert_header',
        array (
            'default'       =>  'Alert!',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'alert_msg',
        array (
            'default'       =>  'Hi, Goodmorning!',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'alert_disp',
        array (
            'default'       =>  'none',
            'transport'     =>  'refresh',
        )
    );
    
    // FACEBOOK 
    
    $wp_customize->add_setting (
        'fb-appid',
        array (
            'default'       =>  'YOUR_FACEBOOK_APPID',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'fb-adminid',
        array (
            'default'       =>  'YOUR_FACEBOOK_ID',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'fbcomment_disabler',
        array (
            'default'       =>  'disabled',
            'transport'     =>  'refresh',
        )
    );
    
    // BACKGROUND
    
    $wp_customize->add_setting (
        'bg_color',
        array (
            'default'       =>  '#ffffff',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'bg_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/bg-horizon-trans.png',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'bg_repeat',
        array (
            'default'       =>  'no-repeat',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'bg_position',
        array (
            'default'       =>  'top left',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'bg_attachment',
        array (
            'default'       =>  'scroll',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'bg_size',
        array (
            'default'       =>  'contain',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'bg_blend',
        array (
            'default'       =>  'normal',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );

    
    // HEADER (formerly CONTACT)
    
    $wp_customize->add_setting (
        'header_text_color',
        array (
            'default'       =>  '#ffffff',
            'transport'     =>  'refresh',
        )
    );
        
    $wp_customize->add_setting (
        'subhead_link_color',
        array (
            'default'       =>  '#373a3c',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'contact_adr',
        array (
            'default'       =>  'Block 1, Martinez Subd., Zone IV, 9506 City of Koronadal',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'contact_email',
        array (
            'default'       =>  'penro.southcotabato@yahoo.com',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'contact_telnum',
        array (
            'default'       =>  '(083) 228-3502',
            'transport'     =>  'refresh',
        )
    );
    
    // ADMIN
    
    $wp_customize->add_setting (
        'admin_panel-bg',
        array (
            'default'       =>  '#eceeef',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'admin-sec',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'admin-rd',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'admin-penro',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'admin_sec-name',
        array (
            'default'       =>  'Juan Dela Cruz',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'admin_rd-name',
        array (
            'default'       =>  'Juan Dela Cruz',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'admin_penro-name',
        array (
            'default'       =>  'Juan Dela Cruz',
            'transport'     =>  'refresh',
        )
    );
    
    // CONTENT
    
    // Panel
    
    $wp_customize->add_setting (
        'panel_text_color',
        array (
            'default'       =>  '#373a3c',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'panel_links_color',
        array (
            'default'       =>  '#0275d8',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'panel_bg_color',
        array (
            'default'       =>  '#ffffff',
            'transport'     =>  'postMessage',
        )
    );
    
    
    $wp_customize->add_setting (
        'btn_color',
        array (
            'default'       =>  '#0275d8',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'read-btn_textbox',
        array (
            'default'       =>  'Read',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'restrict-copy',
        array (
            'default'       =>  'text',
            'transport'     =>  'refresh',
            'capability'     =>  'edit_theme_options',
        )
    );
    
    // Widget
    
    $wp_customize->add_setting (
        'w_1_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/transpaSeal.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_1_url',
        array (
            'default'       =>  'http://localhost/wordpress/transparency-seal',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_1_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_2_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/philGEPS.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_2_url',
        array (
            'default'       =>  'http://denr.gov.ph/component/content/article/839.html#',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_2_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_3_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/perform.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_3_url',
        array (
            'default'       =>  'http://www.gov.ph/pbb/',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_3_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_4_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/ngp.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_4_url',
        array (
            'default'       =>  'http://ngp.denr.gov.ph/',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_4_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_5_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/dcc.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_5_url',
        array (
            'default'       =>  'http://localhost/wordpress/transparency-governance/citizens-charter/',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_5_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_6_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/fb.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_6_url',
        array (
            'default'       =>  'https://www.facebook.com/penro.southcotabato',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_6_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_7_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/elib.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_7_url',
        array (
            'default'       =>  get_permalink( get_page_by_title( 'Downloads' ) ),
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_7_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_8_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/widget/job.jpg',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_8_url',
        array (
            'default'       =>  get_permalink( get_page_by_title( 'Jobs' ) ),
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'w_8_disp',
        array (
            'default'       =>  'block',
            'transport'     =>  'postMessage',
        )
    );
    
    // Menu
    
    $wp_customize->add_setting (
        'menu_btn_color',
        array (
            'default'       =>  '#0275d8',
            'transport'     =>  'refresh',
        )
    );
    
    $wp_customize->add_setting (
        'menu_panel_color',
        array (
            'default'       =>  '#ffffff',
            'transport'     =>  'refresh',
        )
    );
    
    
    // Footer
    
    $wp_customize->add_setting (
        'footer_text_color',
        array (
            'default'       =>  'rgba(255,255,255,1);',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'footer_bg_color',
        array (
            'default'       =>  '#767676',
            'transport'     =>  'postMessage',
        )
    );
  
    $wp_customize->add_setting (
        'footer_bg_image',
        array (
            'default'       =>  get_template_directory_uri() . '/images/footer-bg.png',
            'transport'     =>  'postMessage',
        )
    );
    
    // C O N T R O L S \\
    
    // MESSAGES
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'alert_type_control',
        array (
            'label'         => __( 'Alert Type', 'penrowp2-0' ),
            'description'   => __( 'Background color of the alert bar.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_msg',
            'settings'      => 'alert_type',
            'type'          => 'select',
            'priority'      => '1',
            'choices'       => array (
                'alert-success'    =>  'Success',
                'alert-info'       =>  'Informative',
                'alert-warning'    =>  'Warning',
                'alert-danger'     =>  'Danger',
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'alert_icon_control',
        array (
            'label'         => __( 'Alert Icon', 'penrowp2-0' ),
            'description'   => __( 'Symbol to be used in the alert message.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_msg',
            'settings'      => 'alert_icon',
            'type'          => 'select',
            'priority'      => '2',
            'choices'       => array (
                'check-circle'          =>  'Success',
                'info-circle'           =>  'Informative',
                'exclamation-triangle'  =>  'Warning',
                'times-circle'          =>  'Danger',
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'alert_header_control',
        array (
            'label'         => __( 'Header', 'penrowp2-0' ),
            'description'   => __( 'Header of your alert message.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_msg',
            'settings'      => 'alert_header',
            'type'          => 'text',
            'priority'      => '3',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'alert_msg_control',
        array (
            'label'         => __( 'Alert Message', 'penrowp2-0' ),
            'description'   => __( 'The Message you want to give for the users to read.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_msg',
            'settings'      => 'alert_msg',
            'type'          => 'text',
            'priority'      => '4',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'alert_disp_control',
        array (
            'label'         => __( 'Display Alert?', 'penrowp2-0' ),
            'description'   => __( 'Show or Hide Alert', 'penrowp2-0' ),
            'section'       => 'pwp_sect_msg',
            'settings'      => 'alert_disp',
            'type'          => 'select',
            'priority'      => '5',
            'choices'       => array (
                'block'          =>  'Show',
                'none'           =>  'Hide',
            )
        )
    ));
    
    // FACEBOOK
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'fb-appid_control',
        array (
            'label'         => __( 'Facebook App ID', 'penrowp2-0' ),
            'description'   => __( '(optional)', 'penrowp2-0' ),
            'section'       => 'pwp_sect_fb',
            'settings'      => 'fb-appid',
            'type'          => 'text',
            'priority'      => '1',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'fb-adminid_control',
        array (
            'label'         => __( 'Facebook Admin ID', 'penrowp2-0' ),
            'description'   => __( '', 'penrowp2-0' ),
            'section'       => 'pwp_sect_fb',
            'settings'      => 'fb-adminid',
            'type'          => 'text',
            'priority'      => '2',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'fbcomment_disabler_control',
        array (
            'label'         => __( 'Enable Facebook Comments', 'penrowp2-0' ),
            'section'       => 'pwp_sect_fb',
            'settings'      => 'fbcomment_disabler',
            'type'          => 'select',
            'priority'      => '3',
            'choices'       => array (
                ''           =>  'Enable',
                'disabled'   =>  'Disable',
            )
        )
    ));

    
    // BACKGROUND
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'bg_color_control',
        array (
            'label'         => __( 'Background Color', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_color',
            'priority'      => '1',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'bg_image_control',
        array (
            'label'         => __( 'Background Image', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_image',
            'priority'      => '2',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'bg_repeat_control',
        array (
            'label'         => __( 'Repeat Background Image', 'penrowp2-0' ),
            'description'   => __( 'It will duplicate the image across horizontal or vertical.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_repeat',
            'type'          => 'select',
            'priority'      => '3',
            'choices'       => array (
                'no-repeat'    =>  'No Repeat',
                'repeat'       =>  'Repeat',
                'repeat-x'     =>  'Repeat horizontally',
                'repeat-y'     =>  'Repeat Vertically',
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'bg_position_control',
        array (
            'label'         => __( 'Image Position', 'penrowp2-0' ),
            'description'   => __( 'How will you position your background image.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_position',
            'type'          => 'select',
            'priority'      => '4',
            'choices'       => array (
                'top left'      =>  'Top Left',
                'top'           =>  'Top',
                'top right'     =>  'Top Right',
                'left'          =>  'Left',
                'center'        =>  'Center',
                'right'         =>  'Right',
                'bottom right'  =>  'Bottom Right',
                'bottom'        =>  'Bottom',
                'bottom left'   =>  'Bottom Left',
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'bg_attachment_control',
        array (
            'label'         => __( 'Image Attachment', 'penrowp2-0' ),
            'description'   => __( 'Will the background stay as you scroll (Fixed) or not (Scroll).', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_attachment',
            'type'          => 'radio',
            'priority'      => '5',
            'choices'       => array (
                'fixed'      =>  'Fixed',
                'scroll'     =>  'Scroll',
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'bg_size_control',
        array (
            'label'         => __( 'Image Size', 'penrowp2-0' ),
            'description'   => __( 'How will the background image fit in your screen?', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_size',
            'type'          => 'radio',
            'priority'      => '6',
            'choices'       => array (
                'cover'      =>  'Cover',
                'contain'    =>  'Contain'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'bg_blend_control',
        array (
            'label'         => __( 'Image Blend', 'penrowp2-0' ),
            'description'   => __( 'How will you blend your background image with background color? - Works on Firefox and Chrome but not on IE', 'penrowp2-0' ),
            'section'       => 'pwp_sect_sitebg',
            'settings'      => 'bg_blend',
            'type'          => 'select',
            'priority'      => '7',
            'choices'       => array (
                'normal'      =>  'Normal',
                'multiply'    =>  'Multiply',
                'screen'      =>  'Screen',
                'overlay'     =>  'Overlay',
                'luminosity'  =>  'Black and White'
            )
        )
    ));
    
    // HEADER
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'header_text_color_control',
        array (
            'label'         => __( 'Header Text Color', 'penrowp2-0' ),
            'section'       => 'pwp_sect_header',
            'settings'      => 'header_text_color',
            'priority'      => '1',
            'type'          => 'radio',
            'choices'       => array (
                '#ffffff'     =>  'Light',
                '#373a3c'     =>  'Dark'
            )
        )
    ));
    
    // MENU
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'menu_btn_color_control',
        array (
            'label'         => __( 'Mobile Menu Color', 'penrowp2-0' ),
            'section'       => 'pwp_sect_header',
            'settings'      => 'menu_btn_color',
            'priority'      => '4',
            'type'          => 'select',
            'choices'       => array (
                '#0275d8'     =>  'Default (Blue)',
                '#d9534f'     =>  'Red',
                '#5cb85c'     =>  'Green',
                '#81d94f'     =>  'Lime-Green',
                '#d9d54f'     =>  'Yellow',
                '#4fd980'     =>  'Blue-Green',
                '#f0ad4e'     =>  'Orange',
                '#a74fd9'     =>  'Purple',
                '#292b2c'     =>  'Dark',
                "rgba(0,0,0,0.5)"   =>  'Dark Transparent',
            )
        )
    ));
    
    
    // CONTACTS (1-10)
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'contact_adr_control',
        array (
            'label'         => __( 'Address', 'penrowp2-0' ),
            'description'   => __( 'Office address.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_contact',
            'settings'      => 'contact_adr',
            'type'          => 'text',
            'priority'      => '1',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'contact_email_control',
        array (
            'label'         => __( 'Email', 'penrowp2-0' ),
            'description'   => __( 'Office email.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_contact',
            'settings'      => 'contact_email',
            'type'          => 'email',
            'priority'      => '2',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'contact_telnum_control',
        array (
            'label'         => __( 'Telephone Number', 'penrowp2-0' ),
            'description'   => __( 'Office telephone number.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_contact',
            'settings'      => 'contact_telnum',
            'type'          => 'text',
            'priority'      => '3',
        )
    ));

    
    // ADMIN (11-20)
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'admin_panel-bg_control',
        array (
            'label'         => __( 'Background Color', 'penrowp2-0' ),
            'description'   => __( 'Background color for admin section', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin_panel-bg',
            'priority'      => '11',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'admin_sec_control',
        array (
            'label'         => __( 'DENR Secretary', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of your respected adminsitrators. (Image must be 200x200)', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin-sec',
            'priority'      => '21',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'admin_rd_control',
        array (
            'label'         => __( 'Regional Director', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of your respected adminsitrators. (Image must be 200x200)', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin-rd',
            'priority'      => '31',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'admin_penro_control',
        array (
            'label'         => __( 'PENRO Officer', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of your respected adminsitrators. (Image must be 200x200)', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin-penro',
            'priority'      => '41',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'admin_sec-name_control',
        array (
            'label'         => __( 'DENR Secretary', 'penrowp2-0' ),
            'description'   => __( 'Supply the name of the respected adminsitrator.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin_sec-name',
            'type'          => 'text',
            'priority'      => '22',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'admin_rd-name_control',
        array (
            'label'         => __( 'Regional Director', 'penrowp2-0' ),
            'description'   => __( 'Supply the name of the respected adminsitrator.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin_rd-name',
            'type'          => 'text',
            'priority'      => '32',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'admin_penro-name_control',
        array (
            'label'         => __( 'PENRO Officer', 'penrowp2-0' ),
            'description'   => __( 'Supply the name of the respected adminsitrator.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin_penro-name',
            'type'          => 'text',
            'priority'      => '42',
        )
    ));
    
    // CONTENT 
    
    // Panel (21-30)
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'panel_links_color_control',
        array (
            'label'         => __( 'Content - Panel Link Color', 'penrowp2-0' ),
            'description'   => __( 'The link inside the main content found on front-page and blog. (includes: sidebar headers, links, header icons, share buttons, breadcrumb links and widget links on hover. )', 'penrowp2-0' ),
            'section'       => 'pwp_sect_content',
            'settings'      => 'panel_links_color',
            'priority'      => '22',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'btn_color_control',
        array (
            'label'         => __( 'Read Button Color', 'penrowp2-0' ),
            'description'   => __( 'Read, pagenation, category links and Go-to-Top buttons.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_content',
            'settings'      => 'btn_color',
            'priority'      => '24',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'read-btn_textbox_control',
        array (
            'label'         => __( 'Read Button Label', 'penrowp2-0' ),
            'description'   => __( 'Default: "Read".', 'penrowp2-0' ),
            'section'       => 'pwp_sect_content',
            'settings'      => 'read-btn_textbox',
            'type'          => 'text',
            'priority'      => '25',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'restrict-copy_control',
        array (
            'label'         => __( 'Content Copy Restriction', 'penrowp2-0' ),
            'description'   => __( 'Restrict readers in copying the content.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_content',
            'settings'      => 'restrict-copy',
            'type'          => 'radio',
            'choices'       => array (
                'none'     =>  'Yes',
                'text'     =>  'No'
            )
        )
    ));
    
    // W I D G E T
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_1_image_control',
        array (
            'label'         => __( 'Widget Image #1', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_1_image',
            'priority'      => '10',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_1_url_control',
        array (
            'label'         => __( 'Link URL', 'penrowp2-0' ),
            'description'   => __( 'Where does it points to?', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_1_url',
            'type'          => 'text',
            'priority'      => '11',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_2_image_control',
        array (
            'label'         => __( 'Widget Image #2', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_2_image',
            'priority'      => '20',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_2_url_control',
        array (
            'label'         => __( 'Link URL', 'penrowp2-0' ),
            'description'   => __( 'Where does it points to?', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_2_url',
            'type'          => 'text',
            'priority'      => '21',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_2_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_2_disp',
            'priority'      => '22',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_3_image_control',
        array (
            'label'         => __( 'Widget Image #3', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_3_image',
            'priority'      => '30',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_3_url_control',
        array (
            'label'         => __( 'Link URL', 'penrowp2-0' ),
            'description'   => __( 'Where does it points to?', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_3_url',
            'type'          => 'text',
            'priority'      => '31',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_3_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_3_disp',
            'priority'      => '32',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_4_image_control',
        array (
            'label'         => __( 'Widget Image #4', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_4_image',
            'priority'      => '40',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_4_url_control',
        array (
            'label'         => __( 'Link URL', 'penrowp2-0' ),
            'description'   => __( 'Where does it points to?', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_4_url',
            'type'          => 'text',
            'priority'      => '41',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_4_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_4_disp',
            'priority'      => '42',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_5_image_control',
        array (
            'label'         => __( 'Widget Image #5', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_5_image',
            'priority'      => '50',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_5_url_control',
        array (
            'label'         => __( 'Link URL', 'penrowp2-0' ),
            'description'   => __( 'Where does it points to?', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_5_url',
            'type'          => 'text',
            'priority'      => '51',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_5_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_5_disp',
            'priority'      => '52',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_6_image_control',
        array (
            'label'         => __( 'Widget Image #6', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_6_image',
            'priority'      => '60',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_6_url_control',
        array (
            'label'         => __( 'Facebook Link URL', 'penrowp2-0' ),
            'description'   => __( "Link of your Facebook Page or Profile.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_6_url',
            'type'          => 'text',
            'priority'      => '61',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_6_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_6_disp',
            'priority'      => '62',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_7_image_control',
        array (
            'label'         => __( 'Widget Image #7', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_7_image',
            'priority'      => '70',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_7_url_control',
        array (
            'label'         => __( 'Download Page URL', 'penrowp2-0' ),
            'description'   => __( "Link of your Download Page.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_7_url',
            'type'          => 'text',
            'priority'      => '71',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_7_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_7_disp',
            'priority'      => '72',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'w_8_image_control',
        array (
            'label'         => __( 'Widget Image #8', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of the link.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_8_image',
            'priority'      => '80',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_8_url_control',
        array (
            'label'         => __( 'Jobs Page URL', 'penrowp2-0' ),
            'description'   => __( "Link of your Jobs Page.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_8_url',
            'type'          => 'text',
            'priority'      => '81',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'w_8_disp_control',
        array (
            'label'         => __( "Display", 'penrowp2-0' ),
            'description'   => __( "Don't display the image or link.", 'penrowp2-0' ),
            'section'       => 'pwp_sect_widget',
            'settings'      => 'w_8_disp',
            'priority'      => '82',
            'type'          => 'radio',
            'choices'       => array (
                'block'     =>  'Show',
                'none'      =>  'Hide'
            )
        )
    ));

    // Footer (41-50)
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'footer_text_color_control',
        array (
            'label'         => __( 'Footer - Text Color', 'penrowp2-0' ),
            'description'   => __( 'The text in the footer.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_footer',
            'settings'      => 'footer_text_color',
            'type'          => 'select',
            'priority'      => '41',
            'choices'       => array (
                'rgba(255,255,255,1)'   => 'Light',
                'rgba(0,0,0,1)'         => 'Dark',
                'rgba(255,255,255,0.5)' => 'Light Transparent',
                'rgba(0,0,0,0.5)'       => 'Dark Transparent',
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'footer_bg_color_control',
        array (
            'label'         => __( 'Footer: Background Color', 'penrowp2-0' ),
            'description'   => __( 'Change the color of your footer.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_footer',
            'settings'      => 'footer_bg_color',
            'priority'      => '43',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'footer_bg_image_control',
        array (
            'label'         => __( 'Footer - Footer BG Image', 'penrowp2-0' ),
            'label'         => __( 'The background image of footer.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_footer',
            'settings'      => 'footer_bg_image',
            'priority'      => '44',
        )
    ));
}
        
add_action( 'customize_register' , 'penrowp_options' );

function headerOutput() {
    ?>
        <!-- Customizer CSS -->
        <style type="text/css">
            
            /** BACK TO TOP **/
            
            a.back-to-top:hover { color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>; }
            
            /** RESTRICTION **/
            
            .card-block p {
                -webkit-user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
                -khtml-user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
                -moz-user-select: -moz-<?php echo get_theme_mod('restrict-copy', 'text') ?>;
                -o-user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
                user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
            }
            
            /** BACKGROUND **/
            
            body {
                background-image: url(<?php echo get_theme_mod('bg_image') ?>);
                background-repeat: <?php echo get_theme_mod('bg_repeat', 'no-repeat') ?>;
                background-position: <?php echo get_theme_mod('bg_position', 'top left') ?>;
                background-attachment: <?php echo get_theme_mod('bg_attachment', 'scroll') ?>;
                background-size: <?php echo get_theme_mod('bg_size', 'contain') ?>;
                background-blend-mode: <?php echo get_theme_mod('bg_blend', 'normal') ?>;
                background-color: <?php echo get_theme_mod('bg_color', '#ffffff') ?>;
            }
            body.pg-404 {
                background-image: url(<?php echo get_theme_mod('bg_image') ?>);
                background-repeat: no-repeat;
                background-position: top center;
                background-attachment: fixed;
                background-size: cover;
                background-blend-mode: normal;
                background-color: <?php echo get_theme_mod('bg_color', '#ffffff') ?>;
            }
            
            /** HEADER **/
            
            .logotext { color: <?php echo get_theme_mod('header_text_color', '#ffffff') ?>; }
            a.pnr2 { color: <?php echo get_theme_mod('header_text_color', '#ffffff') ?>; }
            a.pnr2:hover { color: <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>; }
            .logohr { border-color: <?php echo get_theme_mod('header_text_color', '#ffffff') ?>; }
            
            /** ALERT **/
            
            .alert { display: <?php echo get_theme_mod('alert_disp', 'none') ?>; }
                        
            /** MENU **/
            
            #mainnavbtn { background-color: <?php echo get_theme_mod('menu_btn_color', '#5cb85c') ?>; border-color: <?php echo get_theme_mod('menu_btn_color', '#5cb85c') ?>; }
            #mainnavbar, nav#primary_nav_wrap,  nav#primary_nav_wrap ul ul a:hover, a.subhead-time, #mySidenav { background-color: <?php echo get_theme_mod('menu_btn_color', '#5cb85c') ?>; }
            #primary_nav_wrapper ul ul li a { background-color: <?php echo get_theme_mod('menu_panel_color', '#FFFFFF') ?>; }
            ul.mob-menu li a, ul.menu li a { color: White; }
            .news-item-wrapper, ul.pagenation li a.inactve, #sidebar p, #sidebar span,
            #sidebar b, #sidebar i, #servertime, #serverdate { color: <?php echo get_theme_mod('panel_text_color', '#373a3c') ?>; }
            
            /** ADMIN **/
            
            .admin_panel-bg { background-color: <?php echo get_theme_mod('admin_panel-bg', '#eceeef') ?>;}
            
            /** SIDEBAR **/
                    
            .card-title a, .card-title, #sidebar a, h3.headertext, i.cnr, .admintext, a.subhead-link:hover { color: <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>; }
            .announcement img:hover  { box-shadow: 0 0 2px 1px <?php echo get_theme_mod('panel_links_color', '#0275d8') ?> !important; }
            .taglist li a:hover {
                background: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border: 1px solid <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            
            /** BREADCRUMBS **/
            
            .breadcrumb > span {
                color: <?php echo get_theme_mod('panel_links_color', '#373a3c') ?>;
                cursor: default;
            }
            .announcement img:hover, .announcement ul li:before { border-color: <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>; }
            .card, .news-item-wrapper  { background-color: <?php echo get_theme_mod('panel_bg_color', '#FFFFFF') ?>; }
            
            /** CATEGORIES **/
            
            .cat-icon {
                color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                opacity: 0.5;
                filter: alpha(opacity=50); /* IE8 or earlier */
            }
            .cat-text a {
                color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            .cat-text a:hover { background-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>; }
            
            /** BUTTONS **/
            
            .searchbtn:hover {
                color: white;
                background-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            #btn, #editBtn {
                color: white !important;
                background-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            ul.pagenation li a.actve {
                color: #FFFFFF;
                background-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            
            /** BOOTSTRAP OVERRIDES **/
            
            .modal-dialog a p b i, .nf-form-wrap { color: <?php echo get_theme_mod('panel_text_color', '#FFFFFF') ?> !important; }
            .modal-dialog a h3 { color: <?php echo get_theme_mod('panel_links_color', '#FFFFFF') ?>; }
            ul.mob-menu li a:hover {
                color: white;
                background-color: <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>;
            }
            ul.menu li a:hover { border-left: 5px solid <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>; }
            .news-item-img { border-color: <?php echo get_theme_mod('panel_links_color', '#FFFFFF') ?>; }
            
            /** WIDGET **/
            
            .w1 { display: <?php echo get_theme_mod('w_1_disp', 'block'); ?>; }
            .w2 { display: <?php echo get_theme_mod('w_2_disp', 'block'); ?>; }
            .w3 { display: <?php echo get_theme_mod('w_3_disp', 'block'); ?>; }
            .w4 { display: <?php echo get_theme_mod('w_4_disp', 'block'); ?>; }
            .w5 { display: <?php echo get_theme_mod('w_5_disp', 'block'); ?>; }
            .w6 { display: <?php echo get_theme_mod('w_6_disp', 'block'); ?>; }
            .w7 { display: <?php echo get_theme_mod('w_7_disp', 'block'); ?>; }
            .w8 { display: <?php echo get_theme_mod('w_8_disp', 'block'); ?>; }
            
            /** FOOTER ***/
            
            .footer {
                background-color: <?php echo get_theme_mod('footer_bg_color') ?>;
                background-image: url(<?php echo get_theme_mod('footer_bg_image', get_template_directory_uri() . '/images/footer-bg.png') ?>);
            }
            
            .footer-sub, .footer-sub p, .footer-sub a, .footcontact, .footdnr, .footpnr, .footrnr, .footcnr { color: <?php echo get_theme_mod('footer_text_color', 'rgba(255,255,255,1)') ?>; }
            
        </style>
    <?php  
}

add_action('wp_head', 'headerOutput' );

function live_preview() {
    
    wp_enqueue_script(
        'pwp_theme-customizer',
        get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '',
        true
    );
}

add_action( 'customize_preview_init', 'live_preview' );



?>