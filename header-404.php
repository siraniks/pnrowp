<?php
/** 
 * Header for 404 page
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Wordpress
 * @subpackage PENROWP
 * @since PENROWP 2.0
 *
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
    <head>
                
        <meta property="fb:app_id" content="{<?php echo get_theme_mod('fb-appid'); ?>}" />
        <meta property="fb:admins" content="{<?php echo get_theme_mod('fb-adminid'); ?>}"/>    
        
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" >

        <?php if(is_singular() && pings_open(get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_ping_source_uri'); ?>">
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>
    <body class="pg-404">