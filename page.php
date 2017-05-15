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