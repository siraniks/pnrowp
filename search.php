<?php
/** 
 * The search template file_
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
                            <h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'penrowp2-0' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
                        <?php else : ?>
                            <h3 class="page-title"><?php _e( 'No results found.', 'penrowp2-0' ); ?></h3>
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