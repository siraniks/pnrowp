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
            <!-- Search bar (mobile-tablet only) -->
            <!-- <div class="empty-top-margin hidden-lg-up"></div> -->
            
            <!-- announcement -->
            
            
            <div class="card card-block">
                <form role="search" method="get" action="<?php echo home_url(); ?>">
                    <div class="input-group">
                        <input type="text" class="form-control" value name="s" placeholder="Search for...">
                        <span class="input-group-btn">
                             <button type="submit" class="btn btn-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button> 
                        </span>
                    </div>
                </form>
            </div> 
            
            <div class="row">
                
                <div style="margin-bottom: 20px;">
                    <!-- ?php echo do_shortcode('[smartslider3 slider=2]'); ? -->
                </div>
            </div>
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
                <div class="col-md-12">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        
                        <div class="card-block">
                            
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature Image']);
                            } else { ?>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/no-thumbs.png" class="img-fluid" alt="<?php the_title(); ?>"> -->
                            <?php } ?>
                            
                            <h2 class="card-title news-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            
                            
                                <?php the_content(); ?>
                            
                            
                            <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
                            <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
                            
                        </div>
                        
                    </div>
                    <?php endwhile; else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                    <?php endif; ?>
                    
                </div><!-- news section -->
            </div><!-- header content -->
        </div><!-- header content container -->
        
<?php get_footer(); ?>