<?php
/**
 * PENROWP 2.0 functions and definitions
 * 
 * @package WordPress
 * @subpackage PENROWP
 * @since PENRO WP
 */

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// add_theme_support( 'custom-header' );

add_theme_support( 'automatic-feed-links' );

// Custom Background
$defaults = array(
    'default-image' => get_template_directory_uri() . '/images/bg-horizon-trans.png',
    'default-preset' => 'default',
    'default-position-x' => 'center',
    'default-position-y' => 'top',
    'default-size' => 'contain',
    'default-repeat' => 'no-repeat',
    'default-attachment' => 'scroll',
    'default-color' => 'fff',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
);
//add_theme_support( 'custom-background', $defaults );

// Styles and Scripts
function penrowp2_scripts() {
    
    wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5ecdc716c8.js', array(), '4.7.0', false);
    wp_enqueue_style( 'style', get_stylesheet_uri() );   
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


// Enable post thumbnails
if ( function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
        set_post_thumbnail_size( 1000, 300, array ('center','center') ); // 150px2 and crop in the center
}

// NAVIGATION

function register_my_menus() {
    register_nav_menus( array(
        'newnav'  => __('Primary Menu','penrowp2-0'),
        'mobprimary' => __('Mobile Primary Menu','penrowp2-0'),
//        'footnav' => __('Footer Menu','penrowp2-0'),
        'topnav' => __('Top Menu','penrowp2-0')
        )
    );
}
// Add support for WP 3.0 custom menus
add_action('init', 'register_my_menus');

// Top Nav
function topnav_wrap() {
    $topnavwrap = '<ul class="topnav-links">';
    // $topnavwrap .= 'CENRO : ';
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

// Footer
function footnav_wrap() {
    $footnavwrap = '<ul class="unstyled">';
    $footnavwrap .= '%3$s';
    // close the <ul>
    $footnavwrap .= '</ul>';
    // return the result
    return $footnavwrap;
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
	return 75;
}
add_filter( 'excerpt_length', 'theExcerptLength' );

//Change "[...]" into an ellipsis "..."
function excerptMore( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'excerptMore' );

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
    
    // Announcement Slider
    register_sidebar( array(
        'name' => 'Announcement Slider',
        'id' => 'announcement',
        'description' => __( 'a slider area where announcement post will appear with ease.', 'penrowp2-0' ),
        'before_widget' => '<div class="card card-block">',
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
        'before_widget' => '<div class="card card-block hidden-md-down">',
        'after_widget' => '</div>',
    ));
    
    // Feedback Modal
    register_sidebar( array(
        'name' => 'Feedback',
        'id' => 'feedback',
        'description' => __( 'Place a feedback / contact form here, it will appear once you click "Feedback" button on Menu ', 'penrowp2-0' ),
        'before_widget' => '<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="card card-block">',
        'after_widget' => '</div></div></div>',
    ));
}
add_action('widgets_init', 'frontpage_widget');

// change the class of the image and also can wrap custom HTML
//function filter_images($content){
//    return preg_replace('/<img (.*) \/>\s*/iU', '<img class="img-thumbnail" \1 />', $content);
//}
//add_filter('the_content', 'filter_images');

// adds additional class to <img> inside content (DONT DELETE THIS YET)
//function add_responsive_class($content){
//
//        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
//        $document = new DOMDocument();
//        libxml_use_internal_errors(true);
//        $document->loadHTML(utf8_decode($content));
//
//        $imgs = $document->getElementsByTagName('img');
//        foreach ($imgs as $img) {           
//            $existing_class = $img->getAttribute('class');
//            $img->setAttribute('class', 'img-fluid img-thumbnail ' . $existing_class);
//           //$img->setAttribute('class','img-fluid img-thumbnail');
//        }
//
//        $html = $document->saveHTML();
//        return $html;   
//}
//
//add_filter('the_content', 'add_responsive_class');


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
        //$output .= "\n$indent<div class=\"nav-dropdown-content\"><ul>\n";
        $output .= "\n$indent<ul class='mob-sub-menu'>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
        
        global $item_output;
        
        if ($depth == 0) {
            $output .= "<li class='mob-item-header'>";
        }
        if ($depth == 1) {
            $output .= "<li class='mob-sub-item'>";
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

class mobnav2_walker extends Walker_Nav_Menu {
    private $curItem;
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        global $item_title;
//        global $output;
        global $checkoutput;
        //var_dump($this);
        $indent = str_repeat("\t", $depth);
        //$output .= "\n$indent<div class=\"nav-dropdown-content\"><ul>\n";
        $output .="\n$indent<ul class='mob-sub-menu'>";
        $output .= "<div class='collapse' id='collapse" . $item_title . "'>\n";
        
        $checkoutput = htmlentities2($output);
        //echo esc_attr($checkoutput);
    }
    
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
//        $this->curItem = $item;
        global $item_output;
        global $item_title;
//        global $output;
        global $checkoutput;
        
        $attributes = '';
        $attributes2 = '';
        
        $item_title = $item->title;
        $item_title = substr($item_title, 0, 4);
        //$item_title = $item_title . " ";
        //echo esc_attr($output);
        
        ! empty( $item->attr_title ) and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
        ! empty( $item->xfn )and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
        ! empty( $item->url )and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
        
        ! empty( $item->attr_title ) and $attributes2 .= ' title="' . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )and $attributes2 .= ' target="' . esc_attr( $item->target ) .'"';
        ! empty( $item->xfn )and $attributes2 .= ' rel="' . esc_attr( $item->xfn ) .'"';
        ! empty( $item->url )and $attributes2 .= ' href="#collapse' . esc_attr( $item_title ) .'"';
        
        $title = apply_filters ('the_title', $item->title, $item->ID);
        
        $item_output = $args->before;
        $item_output .= '<a class="mob-link" '. $attributes2 .' data-toggle="collapse" aria-expanded="false" aria-controls="collapse">'; 
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $item_output2 = $args->before;
        $item_output2 .= '<a class="mob-link" '. $attributes .'>'; 
        $item_output2 .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output2 .= '</a>';
        $item_output2 .= $args->after;
        
        if ($depth == 0) { // if top level
            $output .= "<li>";
            $matchoutput = "<ul class='mob-sub-menu'>";
            
            //echo esc_attr($item->ID) . "-";
//            if (strpos($checkoutput, $matchoutput) !== true) {
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//                echo "bokya";
//            } else {
//                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//                echo "boklat";
//            }
            
        }
        if ($depth == 1) { // if second level
            $output .= "<li>";
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output2, $item, $depth, $args );
        }
        
    }
    
    
}

class footnav_walker extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        //$output .= "\n$indent<div class=\"nav-dropdown-content\"><ul>\n";
        $output .= "\n$indent<ul class='footnav-second-level'>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
        
        global $item_output;
        
        if ($depth == 0) {
            $output .= "<li class='footnav-first-level'>";
            $output .= "<div class='col-md-4' style='width: 20%;'>";
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

// wrap images with a trigger to modal
//function modalImages ( $content ) {
//
//   // A regular expression of what to look for.
//   $pattern = '/(<img([^>]*)>)/i';
//   // What to replace it with. $1 refers to the content in the first 'capture group', in parentheses above
//   $replacement = '<a class="img-Modal" href="#" data-toggle="modal" data-target="#imageModal">$1<a>';
//
//   // run preg_replace() on the $content
//   $content = preg_replace( $pattern, $replacement, $content );
//
//   // return the processed content
//   return $content;
//}

//add_filter( 'the_content', 'modalImages' );


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
    
    
    // S E T T I N G S \\
    
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
            'default'       =>  '#373a3c',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'header_link_color',
        array (
            'default'       =>  '#0275d8',
            'transport'     =>  'postMessage',
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
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'contact_email',
        array (
            'default'       =>  'penro.southcotabato@yahoo.com',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'contact_telnum',
        array (
            'default'       =>  '(083) 228-3502',
            'type'          =>  'theme_mod',
            'transport'     =>  'postMessage',
        )
    );
    
    // ADMIN
    
    $wp_customize->add_setting (
        'admin-pres',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'admin-sec',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'admin-rd',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'admin-penro',
        array (
            'default'       =>  get_template_directory_uri() . '/images/adminpic.png',
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
            'transport'     =>  'postMessage',
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
        'w_7_url',
        array (
            'default'       =>  get_permalink( get_page_by_title( 'Downloads' ) ),
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'w_7_disp',
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
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'menu_panel_color',
        array (
            'default'       =>  '#ffffff',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'menu_link_color',
        array (
            'default'       =>  '#0275d8',
            'transport'     =>  'postMessage',
        )
    );
    
    // Footer
    
    $wp_customize->add_setting (
        'footer_text_color',
        array (
            'default'       =>  '#c1c1c1',
            'transport'     =>  'postMessage',
        )
    );
    
    $wp_customize->add_setting (
        'footer_header-link_color',
        array (
            'default'       =>  '#ffffff',
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
                'darken'      =>  'Darken',
                'lighten'     =>  'Lighten',
                'color-dodge' =>  'Color-Dodge',
                'saturation'  =>  'Saturation',
                'color'       =>  'Color',
                'luminosity'  =>  'Luminosity'
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
                '#292b2c'     =>  'Dark'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'header_link_color_control',
        array (
            'label'         => __( 'Header Link Color', 'penrowp2-0' ),
            'section'       => 'pwp_sect_header',
            'settings'      => 'header_link_color',
            'priority'      => '2',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'subhead_link_color_control',
        array (
            'label'         => __( 'Contact Details Text Color', 'penrowp2-0' ),
            'section'       => 'pwp_sect_header',
            'settings'      => 'subhead_link_color',
            'priority'      => '3',
            'type'          => 'radio',
            'choices'       => array (
                '#373a3c'       =>  'Dark',
                '#ffffff'       =>  'Light',
            )
        )
    ));
    
    // MENU
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'menu_btn_color_control',
        array (
            'label'         => __( 'Mobile Menu Button and Navbar Color', 'penrowp2-0' ),
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
                '#292b2c'     =>  'Dark'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'menu_panel_color_control',
        array (
            'label'         => __( 'Mobile Menu Background Color', 'penrowp2-0' ),
            'description'   => __( 'Change background color of the menu', 'penrowp2-0' ),
            'section'       => 'pwp_sect_header',
            'settings'      => 'menu_panel_color',
            'priority'      => '5',
            'type'          => 'radio',
            'choices'       => array (
                '#ffffff'     =>  'Light',
                '#292b2c'     =>  'Dark'
            )
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'menu_link_color_control',
        array (
            'label'         => __( 'Mobile Menu Link Color', 'penrowp2-0' ),
            'section'       => 'pwp_sect_header',
            'settings'      => 'menu_link_color',
            'priority'      => '6',
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
                '#ffffff'     =>  'Light',
                '#292b2c'     =>  'Dark',
                
                
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
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'admin_sec_control',
        array (
            'label'         => __( 'DENR Secretary', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of your respected adminsitrators.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin-sec',
            'priority'      => '11',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'admin_rd_control',
        array (
            'label'         => __( 'Regional Director', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of your respected adminsitrators.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin-rd',
            'priority'      => '12',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Image_Control (
        $wp_customize,
        'admin_penro_control',
        array (
            'label'         => __( 'PENRO Officer', 'penrowp2-0' ),
            'description'   => __( 'Upload or Change the image of your respected adminsitrators.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_admin',
            'settings'      => 'admin-penro',
            'priority'      => '13',
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
    
    $wp_customize->add_control ( new WP_Customize_Control (
        $wp_customize,
        'btn_color_control',
        array (
            'label'         => __( 'Button Color', 'penrowp2-0' ),
            'description'   => __( 'Read, pagenation, category links and Go-to-Top buttons.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_content',
            'settings'      => 'btn_color',
            'priority'      => '24',
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
            )
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
            'description'   => __( 'Restrict readers in copying the content (needs refresh to see results).', 'penrowp2-0' ),
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
    
    
    
    
    // Footer (41-50)
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'footer_text_color_control',
        array (
            'label'         => __( 'Footer - Text Color', 'penrowp2-0' ),
            'description'   => __( 'The text in the footer and those text with "|" .', 'penrowp2-0' ),
            'section'       => 'pwp_sect_footer',
            'settings'      => 'footer_text_color',
            'priority'      => '41',
        )
    ));
    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize,
        'footer_header-link_color_control',
        array (
            'label'         => __( 'Footer: Menu Links Color', 'penrowp2-0' ),
            'description'   => __( 'The menu links found in the footer section.', 'penrowp2-0' ),
            'section'       => 'pwp_sect_footer',
            'settings'      => 'footer_header-link_color',
            'priority'      => '42',
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
            
            /*BACKGROUND*/
            
            body {
                background-image: url(<?php echo get_theme_mod('bg_image') ?>);
                background-repeat: <?php echo get_theme_mod('bg_repeat', 'no-repeat') ?>;
                background-position: <?php echo get_theme_mod('bg_position', 'top left') ?>;
                background-attachment: <?php echo get_theme_mod('bg_attachment', 'scroll') ?>;
                background-size: <?php echo get_theme_mod('bg_size', 'contain') ?>;
                background-blend-mode: <?php echo get_theme_mod('bg_blend', 'normal') ?>;
                background-color: <?php echo get_theme_mod('bg_color', '#ffffff') ?>;
            }
            
            .card-block p {
                -webkit-user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
                -khtml-user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
                -moz-user-select: -moz-<?php echo get_theme_mod('restrict-copy', 'text') ?>;
                -o-user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
                user-select: <?php echo get_theme_mod('restrict-copy', 'text') ?>;
            }
            
            /*HEADER*/
            
            h6.rp, h6.dnr, h4.pnr a, h5.rnr {
                color: <?php echo get_theme_mod('header_text_color', '#373a3c') ?>;
            }
            
            a.subhead-link {
                color: <?php echo get_theme_mod('subhead_link_color', '#373a3c') ?> !important;
            }
            
            h4.pnr a:hover {
                color: <?php echo get_theme_mod('header_link_color', '#0275d8') ?> !important;
            }
            
            /** MENU **/
            
            #mainnavbtn {
                background-color: <?php echo get_theme_mod('menu_btn_color', '#5cb85c') ?>;
                border-color: <?php echo get_theme_mod('menu_btn_color', '#5cb85c') ?>;
            }
            
            #mainnavbar, #primary_nav_wrap,  #primary_nav_wrap ul ul a:hover, a.subhead-time {
                background-color: <?php echo get_theme_mod('menu_btn_color', '#5cb85c') ?> !important;
            }
            
            #mySidenav, #primary_nav_wrapper ul ul li a {
                background-color: <?php echo get_theme_mod('menu_panel_color', '#FFFFFF') ?>;
            }
            
            li.mob-item-header a, .sidenav-header-text, .sidenav-sub-text {
                color: <?php echo get_theme_mod('menu_link_color', '#0275d8') ?>;
            }
            
            .news-item-wrapper, ul.pagenation li a.inactve, #sidebar p, #sidebar span,
            #sidebar b, #sidebar i, #servertime, #serverdate {
                color: <?php echo get_theme_mod('panel_text_color', '#373a3c') ?>;
            }
            
            .sidenav-content hr {
/*                border-color: <?php echo get_theme_mod('panel_text_color', '#373a3c') ?>;*/
            }
            
            .card-title a, .news-item-wrapper a, #sidebar a, h3.headertext, i.cnr, .admintext, a.subhead-link:hover {
                color: <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>;
            }
            
            .announcement img:hover  {
                box-shadow: 0 0 2px 1px <?php echo get_theme_mod('panel_links_color', '#0275d8') ?> !important;
            }
            
            .top-nav {
/*                background-color: <php echo get_theme_mod('panel_links_color', '#373a3c') ?> !important;*/
            }
            
            /** BREADCRUMBS **/
            .breadcrumb {
                color: <?php echo get_theme_mod('panel_bg_color', '#FFFFFF') ?>;
            }
            
            .breadbg {
                background: <?php echo get_theme_mod('panel_text_color', '#FFFFFF') ?>;
            }
            
            .breadcrumb a {
                color: <?php echo get_theme_mod('panel_links_color', '#FFFFFF') ?>;
            }
            
            .announcement img:hover, .announcement ul li:before {
                border-color: <?php echo get_theme_mod('panel_links_color', '#0275d8') ?>;
            }
            
            
            
            .card, .news-item-wrapper  { 
                background-color: <?php echo get_theme_mod('panel_bg_color', '#FFFFFF') ?>;
            }
            
            a.back-to-top:hover {
                color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            
            .cat-icon {
                color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                opacity: 0.5;
                filter: alpha(opacity=50); /* IE8 or earlier */
            }
            
            .cat-text a {
                color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            
            .cat-text a:hover {
                background-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            
            .searchbtn:hover {
                color: white;
                background-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
                border-color: <?php echo get_theme_mod('btn_color', '#0275d8') ?>;
            }
            
            #readBtn, #editBtn {
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
            
            .modal-dialog a p b i, .nf-form-wrap {
                color: <?php echo get_theme_mod('panel_text_color', '#FFFFFF') ?> !important; 
            }
            
            .modal-dialog a h3 {
                color: <?php echo get_theme_mod('panel_links_color', '#FFFFFF') ?>; 
            }
            
            .news-item-img {
                border-color: <?php echo get_theme_mod('panel_links_color', '#FFFFFF') ?>;
            }
            
            /** WIDGET **/
            
            .w1 {
                display: <?php echo get_theme_mod('w_1_disp', 'block'); ?>;
            }
            
            .w2 {
                display: <?php echo get_theme_mod('w_2_disp', 'block'); ?>;
            }
            
            .w3 {
                display: <?php echo get_theme_mod('w_3_disp', 'block'); ?>;
            }
            
            .w4 {
                display: <?php echo get_theme_mod('w_4_disp', 'block'); ?>;
            }
            
            .w5 {
                display: <?php echo get_theme_mod('w_5_disp', 'block'); ?>;
            }
            
            .w6 {
                display: <?php echo get_theme_mod('w_6_disp', 'block'); ?>;
            }
            
            .w7 {
                display: <?php echo get_theme_mod('w_7_disp', 'block'); ?>;
            }
            
            /** FOOTER ***/
            
            .footer {
                background-color: <?php echo get_theme_mod('footer_bg_color') ?>;
                background-image: url(<?php echo get_theme_mod('footer_bg_image', get_template_directory_uri() . '/images/footer-bg.png') ?>);
            }
            
            .footer-sub, .footer-sub p, .footer-sub a {
                color: <?php echo get_theme_mod('footer_text_color', '#ffffff') ?>;
            }
            
            ul.unstyled li.footnav-first-level a, ul.unstyled ul.footnav-second-level li a { 
                color: <?php echo get_theme_mod('footer_header-link_color', '#ffffff') ?>;
            }    
            
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