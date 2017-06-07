<?php
/** 
 * Search Template
 *
 * @package Wordpress
 * @subpackage PENROWP
 * @since PENROWP 2.0
 *
 */

get_header('main'); ?>
<main>
    
        <div class="container">
            
            
            <div class="row">
                <!-- news section -->
                <div class="col-md-9">
                    

                    
                <!-- news section -->   
                    
                    <div class="card card-block">
                        <?php if ( have_posts() ) : ?>
                            <h3 class="page-title aligncenter"><?php printf( __( '<i class="fa fa-fw fa-search" style="color:rgba(0,0,0,0.3);"></i>&nbsp;Search results for<br> %s', 'penrowp2-0' ), '<span style="color:#0275d8;">"' . get_search_query() . '"</span>' ); ?></h3>
                        <?php else : ?>
                            <h3 class="page-title aligncenter"><?php _e( '<i class="fa fa-fw fa-times-circle" style="color:#db4437;"></i>No results found', 'penrowp2-0' ); ?><?php printf( __( ' for<br> %s', 'penrowp2-0' ), '<span style="color:#0275d8;">"' . get_search_query() . '"</span>' ); ?></h3>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        
                        <div class="row">
                            <div class="mx-auto">
                                <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block news-item-content' ); ?>>
                                    
                                    <div class="col-md-4">
                                        <div class="post-thumb-wrapper">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <?php the_post_thumbnail( 
                                                    'full', array( 
                                                        'class' => 'post-thumb-img' 
                                                    )); 
                                                ?>
                                            <?php } else { ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/nothumbs.png" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        
                                        <div class="post-thumb-content">
                                            <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                            <h6 class="cat-text"><?php the_category( ' ' ); ?></h6>
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <a id="readBtn" href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo get_theme_mod( 'read-btn_textbox', 'Read' ); ?></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <?php endwhile; else : ?>
                    <?php endif; ?>
                    
                    <!-- Pagination -->
                    
                        <?php crazy_pagination(); ?> 
                    
                </div><!-- news section -->
                
                <!-- SIDEBAR -->
                <?php get_sidebar( 'search' ); ?>
                
            </div><!-- header content -->
        </div><!-- header content container -->
        
<?php get_footer(); ?>