<?php
/** 
 * Index
 *
 * Category Results
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
                        <h3 class="aligncenter"><i class="fa fa-fw fa-list-ul"></i>&nbsp;<?php the_category(); ?></h3>
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
                        <div class="news-item-wrapper">
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Pagination -->
                    
                        <?php crazy_pagination(); ?> 
                    
                </div><!-- news section -->
                
                <!-- SIDEBAR -->
                <?php get_sidebar( 'index' ); ?>
                
            </div><!-- header content -->
        </div><!-- header content container -->    
        
        <div class="embed-container maps">
            
            <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("GMap")):else: ?><?php endif; ?>
            
        </div><!-- maps -->
        
<?php get_footer(); ?>