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
            
            
            <div class="row">
                <!-- news section -->
                
                <div class="col-md-9">
                    
                <!-- news section -->   
                    <h3 class="hidden-md-up center admintext">Downloads</h3>
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        
                        <div class="row">
                            
                            <div class="mx-auto">
                                
                                
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
                
                <!-- SIDEBAR -->
                <?php get_sidebar( 'frontpage' ); ?>
                
            </div><!-- header content -->
        </div><!-- header content container -->
        
<?php get_footer(); ?>