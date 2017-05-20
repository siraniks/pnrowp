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
                            
                            <h2 class="card-title news-title"><?php the_title(); ?></h2>
                            
                            <ul class="sharelist" style="font-size: 18px;">
                                
                                <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share this post on Facebook" target="blank" rel="nofollow" class="icon-fb"><i class="fa fa-facebook-square fa-fw"></i></a></li>
                                
                                <li><a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&source=<?php bloginfo('name'); ?>&url=<?php the_permalink();?>" title="Share this post on Twitter" class="icon-tw"><i class="fa fa-twitter fa-fw"></i></a></li>
                                
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=<?php the_excerpt(); ?>&source=<?php bloginfo('name'); ?>-<?php bloginfo('description');  ?>" title="Share this post on LinkedIn" class="icon-lin"><i class="fa fa-linkedin fa-fw"></i></a></li>
                                
                                <li><a href="https://getpocket.com/save?url=<?php the_permalink();?>&title=<?php the_title(); ?>" title="Read it later on Pocket" class="icon-pckt"><i class="fa fa-get-pocket fa-fw"></i></a></li>
                                
                                <li><a href="javascript:window.print()" class="icon-prntr"><i class="fa fa-fw fa-print"></i></a></li>
                                
                                <li><a href="mailto:?subject=<?php the_title(); ?>&body=Read it from here - <?php the_permalink(); ?>" title="Email This" class="icon-mail"><i class="fa fa-fw fa-envelope"></i></a></li>
                                
                            </ul><br>
                            
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