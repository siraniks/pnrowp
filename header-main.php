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
        
        <!-- THIS IS TEMPORARY -->
        <!--<meta http-equiv="Cache-control" content="no-cache">-->
        
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
    <body <?php body_class(); ?>>
        
        <!--  FB JS SDK -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <header>
        <!-- overlay for sidenav -->
        <div id="sidenav-overlay"></div>
        <!-- make this as a navmenu instead - default values - navbar-full -->
        <nav class="top-nav navbar-full navbar-dark bg-inverse hidden-md-down">
            <div class="container">
                <a id="feedbackbtn" href="#" class="float-xs-right hidden-lg-down ownBtn-login-sm btn-transparent" data-toggle="modal" data-target="#feedbackModal" title="Send Feedback"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i></a>
                
                <?php if (is_user_logged_in()) { ?>
                    <a id="loginbtn" href="<?php echo home_url(); ?>/wp-admin/" class="float-xs-right hidden-lg-down ownBtn-login-sm btn-transparent" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="fa fa-1x fa-fw fa-dashboard" aria-hidden="true"></i></a>
                    <a id="loginbtn" href="<?php echo wp_logout_url( get_permalink() ); ?>" class="float-xs-right hidden-lg-down ownBtn-login-sm btn-transparent" data-toggle="tooltip" data-placement="bottom" title="Sign-out"><i class="fa fa-1x fa-fw fa-sign-out" aria-hidden="true"></i></a>
                <?php } else { ?>
                    <a id="loginbtn" href="<?php echo home_url(); ?>/wp-login.php" class="float-xs-right hidden-lg-down ownBtn-login-sm btn-transparent" data-toggle="tooltip" data-placement="bottom" title="Sign-in"><i class="fa fa-1x fa-fw fa-user-o" aria-hidden="true"></i></a>
                <?php } ?>
                
                <span class="navbar-text float-xs-left">
                    <?php
                    $menuparameters = array(
                    'menu'           =>  'Top Menu',
                    'container'      => '',
                    'theme_location' => 'topnav',
                    'items_wrap'     => topnav_wrap(),
                    'depth'          => '0',
                    'walker'         => new topnav_walker()                    
                    );

                    echo strip_tags(wp_nav_menu( $menuparameters ), '<a>' ); 
                    ?> 
                </span>
            </div>
        </nav><!-- top navbar -->
        
        <div class="logo hidden-md-down">     
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo150.png" />    
                    </div>
                    <div class="col-xs-8 logotext">
                        <h6 class="dnr2">Department of Environment and Natural Resources</h6>
                        <h4><a class="pnr2" href="<?php echo home_url(); ?>" title="Return Home"><?php bloginfo('name'); ?></a></h4><hr class="logohr">
                        <h5 class="rnr2"><?php bloginfo('description'); ?></h5>
                        
<!--
                         SEARCH BOX 
                        <div id="searchbox" class="container hidden-md-down">
                            <form role="search" method="get" action="<?php echo home_url(); ?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" value name="s" placeholder="Search for...">
                                    <span class="input-group-btn">
                                         <button type="submit" class="btn btn-secondary searchbtn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button> 
                                    </span>
                                </div>
                            </form>
                        </div>
-->
                    </div>
                    <div class="col-xs-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/phlogo150.png" class="alignright"/>    
                    </div>
                </div>
                
            </div>
            
            
        </div>
        
        <nav id="mainnavbar" class="navbar navbar-fixed-top navbg navbar-dark hidden-sm-up">
            <!-- Logo / brand -->
            <a class="align-middle navbar-brand" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> PENRO <?php bloginfo('description'); ?></a>
        </nav>
        
        <!-- SIDENAV -->
        <div id="mySidenav" class="sidenav">
        
            <div class="top-mobnav">
                <a href="#" class="closeBtn float-xs-right"><i class="fa fa-fw fa-times"></i></a>
                
                <?php if (is_user_logged_in()) { ?>
                    <?php echo 'hahaha'; ?>
                    <a href="<?php echo home_url(); ?>/wp-admin.php" class="userBtn float-xs-right"><i class="fa fa-fw fa-dashboard"></i></a>
                <?php } else { ?>
                    <?php echo 'hehehe'; ?>
                    <a href="<?php echo home_url(); ?>/wp-login.php" class="userBtn float-xs-right"><i class="fa fa-fw fa-user-o"></i></a>
                <?php } ?>
                
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact Us' ) ) ); ?>" class="callBtn float-xs-right"><i class="fa fa-fw fa-phone"></i></a>   
        
            </div>
            
            <div class="sidenav-content">
                
                <!-- menu -->  
                <div class="mobile-nav">
                    
                        <?php
                            $mobmenuparameters = array(
                            'menu'           => 'Primary Menu',
                            'container'      => '',
                            'theme_location' => 'mobprimary',
                            'items_wrap'     => mobnav_wrap(),
                            //'depth' => '0',
                            'walker'         => new mobnav_walker()
                            );

                            echo strip_tags(wp_nav_menu( $mobmenuparameters ), '<a>' ); 
                        ?> 
                         
                    <hr class="mobhr">
                    <?php
                            $menuparameters = array(
                            'menu'           =>  'Top Menu',
                            'container'      => '',
                            'theme_location' => 'topnav',
                            'depth'          => '0',

                            );

                            echo strip_tags(wp_nav_menu( $menuparameters ), '<a>' ); 
                        ?>
                    <div class="container">
                    </div><!-- container -->
                </div>
                <br>
            </div><!-- sidenav content --> 
        </div><!-- sidenav -->
        
        <!-- sub-header -->
        <div class="container">
            <div class="newsp-header">
                <button id="mainnavbtn" type="button" class="btn btn-success btn-sm float-xs-right float-top hidden-md-up"><i class="fa fa-navicon fa-fw" aria-hidden="true"></i>MENU</button>
                
                <p class="float-xs-left hidden-lg-down"><a href="#" class="subhead-time" data-toggle="tooltip" data-placement="bottom" title="Today is"><i class="fa fa-fw fa-calendar"></i>&nbsp;<?php echo date_i18n( get_option( 'date_format' ), strtotime( '11/15-1976' ) ); ?></a></p>
                <p class="float-xs-right hidden-lg-down"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact Us' ) ) ); ?>" class="subhead-contact bg-success"><i class="fa fa-fw fa-phone"></i>&nbsp;Contact Us</a></p>
                
                <!-- SEARCH BOX -->
                <div id="searchbox" class="container hidden-md-down aligncenter" style="width: 65%;">
                    <?php get_search_form(); ?>
                </div>
                
            
            </div>
        </div>
        <!-- eo sub-header -->

        <!-- desktop -->
        <nav id="primary_nav_wrap" class="navbar navbar-full navbar-dark hidden-md-down">
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
        
        <!-- SEARCH BOX -->
        <div id="searchbox" class="container">
            <div class="hidden-sm-up card card-block invisible">.</div>
            <div class="card card-block hidden-sm-up">
                <form role="search" method="get" action="<?php echo home_url(); ?>">
                    <div class="input-group">
                        <input type="text" class="form-control" value name="s" placeholder="Search for...">
                        <span class="input-group-btn">
                             <button type="submit" class="btn btn-secondary searchbtn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button> 
                        </span>
                    </div>
                </form>
            </div> 
        </div>
            
        
        
    </header>