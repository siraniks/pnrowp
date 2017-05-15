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
    
        <div class="container">
            
            
            <div class="row">
                <!-- news section -->
                <!-- Announcement Slider -->
                <div class="col-md-12">
                    <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Announcement Slider")):else: ?><?php endif; ?>
                </div>
                <div class="col-md-9">
                    

                    
                <!-- news section -->   
                    <h3>Search Results: </h3>
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        <div class="row">
                            <!-- 
                            <div class="col-sm-4 news-item-img">
                                <a href="<php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <php the_title_attribute(); ?>">
                                <php if ( is_singular() and has_post_thumbnail() ) {
                                    the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature Image']);
                                } else { ?>
                                    <img src="<php echo get_first_image_url ($post->ID); ?>" class="img-fluid" title="Featured Image" alt="?php the_title(); ?>"/>
                                <php } ?>
                                </a>
                            </div>
                            -->
                            <div class="col-sm-12">
                                <div class="float-xs-right">
                                <?php edit_post_link('<button id="editBtn" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-1x fa-fw fa-pencil-square-o" aria-hidden="true"></i> Edit This Post</button>'); ?> 
                                </div>
                                
                                <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block news-item-content' ); ?>>
                                    <h6 class="cat-text"><?php the_category( ', ' ); ?></h6>
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a id="readBtn" href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo get_theme_mod( 'read-btn_textbox' ); ?></a>
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
                <?php get_sidebar( 'search' ); ?>
                
            </div><!-- header content -->
        </div><!-- header content container -->
        
<?php get_footer(); ?>