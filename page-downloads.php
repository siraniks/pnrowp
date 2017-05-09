<?php
/** 
 * Template Name: Downloads
 *
 * @package Wordpress
 * @subpackage PENROWP
 * @since PENROWP 2.0
 *
 */

get_header('main'); ?>
<main>
        <div class="container">
            <!-- Search bar (mobile-tablet only) -->
            
            <div class="hidden-sm-up card card-block invisible">.</div>
            <div class="card card-block">
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
        
        <div class="container">
            
            
            <div class="row">
                <!-- news section -->
                
                <div class="col-md-9">
                    
                <!-- news section -->   
                    <h3 class="hidden-md-up center admintext">Downloads</h3>
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        
                        <div class="row">
                            
                            <div class="col-sm-12">
                                
                                
                                <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block news-item-content' ); ?>>
                                    
                                    <?php
                                    $args = array( 'category_name' => 'downloads', 'post_type' =>  'post', 'posts_per_page' =>  '5' ); 
                                    $postslist = get_posts( $args );    
                                    foreach ($postslist as $post) :  setup_postdata($post); 
                                    ?>  
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                    <?php the_excerpt(); ?>  
                                    
                                    <a id="readBtn" href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo get_theme_mod( 'read-btn_textbox', 'Read' ); ?></a>
                                    
                                    <?php endforeach; ?> 
                                    
                                </div>
                            </div>
                            
                        </div>
                    
                    </div>
                    
                    <?php endwhile; else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                    <?php endif; ?>
                    
                    <!-- Pagination -->
                    
                        <?php crazy_pagination(); ?> 
                    
                </div><!-- news section -->
                
                <!-- Sidebar -->
                <div id="sidebar" class="col-md-3">
                    <!-- Time -->
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Time")):else: ?><?php endif; ?>
                    <!-- Sidebar -->
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("downloads_sidebar_widget")):else: ?><?php endif; ?>
                    
                    <div class="card announcement card-block">
                        <a href="<?php echo get_theme_mod('w_1_url','http://localhost/wordpress/transparency-seal'); ?>"><img class="w1" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/transpaSeal.jpg";
                                              echo get_theme_mod( 'w_1_image', $dir . $img ); ?>" /></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_2_url','http://denr.gov.ph/component/content/article/839.html#'); ?>"><img class="w2" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/philGEPS.jpg";
                                              echo get_theme_mod( 'w_2_image', $dir . $img ); ?>" /></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_3_url','http://www.gov.ph/pbb/'); ?>"><img class="w3" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/perform.jpg";
                                              echo get_theme_mod( 'w_3_image', $dir . $img ); ?>" /></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_4_url','http://ngp.denr.gov.ph/'); ?>"><img class="w4" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/ngp.jpg";
                                              echo get_theme_mod( 'w_4_image', $dir . $img ); ?>" /></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_5_url','http://localhost/wordpress/transparency-governance/citizens-charter/'); ?>"><img class="w5" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/dcc.jpg";
                                              echo get_theme_mod( 'w_5_image', $dir . $img ); ?>" /></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_6_url','https://www.facebook.com/penro.southcotabato'); ?>"><img class="w6" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/fb.jpg";
                                              echo get_theme_mod( 'w_6_image', $dir . $img ); ?>"/></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_7_url',esc_url( get_permalink( get_page_by_title( 'Downloads' ) ) )); ?>"><img class="w7" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/elib.jpg";
                                              echo get_theme_mod( 'w_7_image', $dir . $img ); ?>"/></a>
                        
                    </div>
                    
                    <!-- announcement -->
                    <div class="mx-auto">
                        <div id="carousel-announcement" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item">
                                    <img src="<?php echo get_first_image_url ($post->ID); ?>" title="Featured Image"/>
                                </div>
                                <?php
                                    global $post;
                                    $args = array( 'numberposts' => 5, 'category_name' => 'announcement' );
                                    $posts = get_posts( $args );
                                    foreach( $posts as $post ): setup_postdata($post);

                                ?>

                                <!-- slide content -->
                                <div class="carousel-item">
                                    <img src="<?php echo get_first_image_url ($post->ID); ?>" title="Featured Image"/>
                                </div>
                                <!-- end of slide content -->

                                <?php endforeach; ?>
                                
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
                    </div><!-- end of announcement -->
                    
                </div><!-- sidebar -->
            </div><!-- header content -->
        </div><!-- header content container -->
        
<?php get_footer(); ?>