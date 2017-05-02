<?php
/** 
 * The template for displaying the header
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
        
        <meta property="og:url" content="<?php echo home_url(); ?>" />
        <meta property="og:title" content="<?php bloginfo('name'); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/logo150.png" />
        
        <!-- THIS IS TEMPORARY -->
        <meta http-equiv="Cache-control" content="no-cache">
        
        
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
<!--        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" >

        <?php if(is_singular() && pings_open(get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_ping_source_uri'); ?>">
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
        <div id="sidenav-overlay"></div><!-- overlay for sidenav -->
        <!-- make this as a navmenu instead - default values - navbar-full -->
        <nav class="top-nav navbar-full navbar-dark bg-inverse hidden-md-down">
            <div class="container">
                <span class="navbar-text float-xs-left">
                    <?php
                    $menuparameters = array(
                    'menu'  =>  'Top Menu',
                    'container' => '',
                    'theme_location' => 'topnav',
                    'items_wrap' => topnav_wrap(),
                    'depth' => '0',
                    );

                    echo strip_tags(wp_nav_menu( $menuparameters ), '<a>' ); 
                    ?> 
                </span>
            </div>
        </nav><!-- top navbar -->
        
        <div class="logo hidden-md-down">
            <div class="center">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo150.png" /><br>
                <p>
                
                    <h6 class="rp">Republic of the Philippines</h6>
                    <h6 class="dnr">Department of Environment and Natural Resources</h6>
                    <h4 class="pnr"><a href="<?php echo home_url(); ?>" data-toggle="tooltip" data-placement="bottom" title="Return Home"><?php bloginfo('name'); ?></a></h4>
                    <h5 class="rnr"><?php bloginfo('description'); ?></h5>
                </p>
            </div>
        </div>
        
        <nav id="mainnavbar" class="navbar navbar-fixed-top navbg navbar-dark hidden-sm-up">
            <!-- Logo / brand -->
            <a class="align-middle navbar-brand" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> PENRO <?php bloginfo('description'); ?></a>
        </nav>
        
        <!-- SIDENAV -->
        <div id="mySidenav" class="sidenav">
        <a href="#" class="closebtn">&times;</a>
            <div class="sidenav-content">
                
                <div class="card-img">
                    
                    <div class="sidenav-header-subcontent">
                        
                        <i class="cnr fa fa-envelope fa-fw" aria-hidden="true" ></i>&nbsp;<?php echo get_theme_mod('contact_email', 'admin@penrosocot.com'); ?>
                        <i class="cnr fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp;<?php echo get_theme_mod('contact_telnum', 'Company call number'); ?>
                    </div>
                </div>
                
                <!-- menu -->  
                <div class="mobile-nav">
                    
                    <div style="margin-bottom: 30px;"></div>

                        <?php
                            $mobmenuparameters = array(
                            'menu'  =>  'Primary Menu',
                            'container' => '',
                            'theme_location' => 'mobprimary',
                            'items_wrap' => mobnav_wrap(),
                            //'depth' => '0',
                            'walker' => new mobnav2_walker()
                            );

                            echo strip_tags(wp_nav_menu( $mobmenuparameters ), '<a>' ); 
                        ?> 
                         
                    <hr>
                    <?php
                            $menuparameters = array(
                            'menu'  =>  'Top Menu',
                            'container' => '',
                            'theme_location' => 'topnav',
                            //'items_wrap' => topnavmob_wrap(),
                            'depth' => '0',
                            );

                            echo strip_tags(wp_nav_menu( $menuparameters ), '<a>' ); 
                        ?>
                    <hr>
                    <div class="container">
                        <a id="loginbtn" href="<?php echo home_url(); ?>/wp-login.php" class="ownBtn btn-primary"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Login</a>

                        <a id="feedbackbtn" href="#" class="ownBtn btn-success xbtn" data-toggle="modal" data-target="#feedbackModal"><i class="fa fa-comments fa-fw" aria-hidden="true"></i>Feedback</a>
                    </div><!-- container -->
                </div>
                <br>
            </div><!-- sidenav content --> 
        </div><!-- sidenav -->
        
        <!-- sub-header -->
        <div class="container">
            <div class="newsp-header">
                <button id="mainnavbtn" type="button" class="btn btn-success btn-sm float-xs-right float-top hidden-md-up"><i class="fa fa-navicon fa-fw" aria-hidden="true"></i>MENU</button>
                
                <a id="feedbackbtn" href="#" class="float-xs-right hidden-lg-down ownBtn-login-sm btn-success xbtn" data-toggle="modal" data-target="#feedbackModal"><i class="fa fa-comments fa-fw" aria-hidden="true"></i></a>
                
                <a id="loginbtn" href="<?php echo home_url(); ?>/wp-login.php" class="float-xs-right hidden-lg-down ownBtn-login-sm btn-primary"><i class="fa fa-1x fa-fw fa-user" aria-hidden="true"></i></a>
                
                <p class="float-xs-right hidden-lg-down"><i class="cnr fa fa-calendar fa-fw" aria-hidden="true"></i><a href="#" class="subhead-link" data-toggle="tooltip" data-placement="bottom" title="Today is">&nbsp;<?php echo date_i18n( get_option( 'date_format' ), strtotime( '11/15-1976' ) ); ?></a></p>
            
                
            
                <span class="hidden-lg-down">
                    <i id="copyclipboard" class="cnr fa fa-envelope fa-fw" aria-hidden="true" ></i>&nbsp;<a id="email" href="#" class="subhead-link" data-toggle="tooltip" data-placement="bottom" title="Email us!"><?php echo get_theme_mod('contact_email', 'admin@penrosocot.com'); ?></a>
                    <i class="cnr fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp;<a id="telnum" href="#" class="subhead-link" data-toggle="tooltip" data-placement="bottom" title="Call us!"><?php echo get_theme_mod('contact_telnum', 'Company call number'); ?></a>
                </span>
            </div>
        </div>
        <!-- eo sub-header -->

        <!-- desktop -->
        <nav id="primary_nav_wrap" class="navbar navbar-full navbar-dark navbg hidden-md-down">
            <div class="container">
                <ul>
                    <?php
                        $newmenuparams = array(
                            'menu'           =>  'New Primary Menu',
                            'container'      => '',
                            'theme_location' => 'newnav',
                            'items_wrap'     => newnav_wrap(),
                            'walker'         => new newnav_walker()
                        );

                        echo strip_tags(wp_nav_menu( $newmenuparams ), '<a>' ); 
                    ?>
                </ul>
            </div>
        </nav>
        
    <br>
    <a href="#" class="back-to-top"><i class="fa fa-arrow-up fa-fw"></i></a>    
    </header>