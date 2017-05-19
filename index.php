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
            
            <!-- alert bar
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-exclamation-triangle fa-fw"></i>&nbsp;<strong>Still in Development. </strong> If you found some bugs, just let us know.
            </div> -->
        </div>  
        
        <div class="container">
            
            
            <div class="row">
                <!-- news section -->
                <div class="col-md-9">                    
                <!-- news section -->   
                    <div class="card card-block">
                        <h3 class="aligncenter">Category: <?php the_category(); ?></h3>
                    </div>
                    
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
<!--                                <php edit_post_link('<button id="editBtn" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-1x fa-fw fa-pencil-square-o" aria-hidden="true"></i> Edit This Post</button>'); ?> -->
                                </div>
                                

                                <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block news-item-content' ); ?>>
<!--                                    <h6 class="cat-text"><php the_category( ', ' ); ?></h6>-->
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                    <a id="readBtn" href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo get_theme_mod( 'read-btn_textbox', 'Read' ); ?></a>
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
                <?php get_sidebar( 'index' ); ?>
                
            </div><!-- header content -->
        </div><!-- header content container -->    
        
        <div class="embed-container maps">
            
            <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("GMap")):else: ?><?php endif; ?>
            
        </div><!-- maps -->
        
<?php get_footer(); ?>