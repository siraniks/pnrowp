<?php
/** 
 * The single template file_
 *
 * @package Wordpress
 * @subpackage PENROWP
 * @since PENROWP 2.0
 *
 */

get_header('main'); ?>
<main>
        <!-- alert bar-->
        <div class="container">
            <div class="alert <?php echo get_theme_mod( 'alert_type', 'alert-danger' ); ?> alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-<?php echo get_theme_mod( 'alert_icon', 'exclamation-triangle' ); ?> fa-fw "></i>&nbsp;<span id="alertmsg"><strong id="alertheader"><?php echo get_theme_mod( 'alert_header', 'Alert!' ); ?></strong>&nbsp;<?php echo get_theme_mod( 'alert_msg', 'Be alert!' ); ?></span>
            </div>    
        </div> 
    
        <div class="container">
            
            <div class="row">
                <!-- news section -->
                <!-- Announcement Slider -->
                <div class="container">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Announcement Slider")):else: ?><?php endif; ?>
                </div>
                
                <div class="col-md-9">
                    
                <!-- news section -->   
                    <h3 class="hidden-md-up center admintext">News</h3>
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        
                        <div class="row">
                            
                            <div class="col-sm-12">
                                
                                
                                <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block news-item-content' ); ?>>
                                    
                                    
                                    
                                    <h6 class="cat-text"><?php the_category( ' ' ); ?></h6>
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                    
                                    <?php the_excerpt(); ?>
                                    
                                    <a id="readBtn" href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo get_theme_mod( 'read-btn_textbox', 'Read' ); ?></a>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <?php endwhile; else : ?>
                        <div class="news-item-wrapper">
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Pagination -->
                    
                        <?php crazy_pagination(); ?> 
                    
                </div><!-- news section -->
                
                <!-- SIDEBAR -->
                <?php get_sidebar( 'frontpage' ); ?>
                
            </div><!-- header content -->
        </div><!-- header content container -->
        
        <!-- admin section -->
        <div class="officers admin_panel-bg">
            <div class="container">
                <div class="row">
                    <div class="card-deck-wrapper">
                        <div class="card-deck">
                            
                            <div class="card">
                                <div class="card-header uppercase aligncenter"><h5>DENR Secretary</h5></div>
                                <div id="admin-sec" class="card-block">
                                    <img src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/adminpic.png";
                                              echo get_theme_mod( 'admin-sec', $dir . $img ); ?>" alt="Secretary" class="adminfx center">
                                    <br>
                                    <div class="admin-label uppercase aligncenter">
                                        <h5 id="admintext-sec"><?php echo get_theme_mod( 'admin_sec-name', 'ROY CIMATU'); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header uppercase aligncenter"><h5>Regional Director</h5></div>
                                <div id="admin-rd" class="card-block">
                                    <img src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/adminpic.png";
                                              echo get_theme_mod( 'admin-rd', $dir . $img ); ?>" alt="Regional Director" class="adminfx center">
                                    <br>
                                    <div class="admin-label uppercase aligncenter">
                                        <h5 id="admintext-rd"><?php echo get_theme_mod( 'admin_rd-name', 'REYNULFO A. JUAN'); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header uppercase aligncenter"><h5>PENR Officer</h5></div>
                                <div id="admin-penro" class="card-block">
                                    <img src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/adminpic.png";
                                              echo get_theme_mod( 'admin-penro', $dir . $img ); ?>" alt="PENRO Officer" class="adminfx center">
                                    <br>
                                    <div class="admin-label uppercase aligncenter">
                                        <h5 id="admintext-penro"><?php echo get_theme_mod( 'admin_penro-name', 'RADZAK B. SINARIMBO, MPA, LLB'); ?></h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- carousel admin for mobile only -->
        
<!--
        <div class="container">
            <div class="card card-block">
                <h3 class="center admintext hidden-md-up">Administrators</h3>
                <div class="mx-auto" style="background-color:transparent; width:200px; margin-bottom: 10px;">
                    <div id="carousel-example-generic" class="carousel slide hidden-md-up" data-ride="carousel">
                          <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img src="<?php 
                                      $dir = get_template_directory_uri(); ;
                                      $img = "/images/adminpic.png";
                                      echo get_theme_mod( 'admin-sec', $dir . $img ); ?>" alt="Secretary">
                                    <div class="carousel-caption">
                                        <h3>Cimatu</h3>
                                        <p>DENR Secretary</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php 
                                      $dir = get_template_directory_uri(); ;
                                      $img = "/images/adminpic.png";
                                      echo get_theme_mod( 'admin-rd', $dir . $img ); ?>" alt="Regional Director">
                                </div>
                              <div class="carousel-item">
                                  <img src="<?php 
                                      $dir = get_template_directory_uri(); ;
                                      $img = "/images/adminpic.png";
                                      echo get_theme_mod( 'admin-penro', $dir . $img ); ?>" alt="PENRO Officer">
                                </div>
                          </div>
                          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="icon-prev" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="icon-next" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                          </a>
                    </div>
                </div>
            </div>
        </div>
-->
        
        <!-- admin section -->    
        
        <div class="embed-container maps">
            
            <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("GMap")):else: ?><?php endif; ?>
            
        </div><!-- maps -->
        
<?php get_footer(); ?>