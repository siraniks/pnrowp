<?php
/** 
 * Page Template
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
                <div class="mx-auto">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div class="news-item-wrapper">
                        <div style="clear: both" class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-fw fa-angle-right"></i> <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
                        </div>
                        
                        <div class="card-block">
                            
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature Image']);
                            } else { ?>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/no-thumbs.png" class="img-fluid" alt="<?php the_title(); ?>"> -->
                            <?php } ?>
                            
                            <h1 class="card-title news-title"><?php the_title(); ?> <?php edit_post_link('<span id="btn" class="btn" style="font-size: 12px;"><i class="fa fa-1x fa-fw fa-pencil" aria-hidden="true"></i> Edit</span>'); ?></h1>
                            
                            <ul class="sharelist" style="font-size: 18px;">
                                
                                <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share this post on Facebook" target="blank" rel="nofollow" class="icon-fb"><i class="fa fa-1x fa-facebook-square fa-fw"></i></a></li>
                                
                                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share this post on Google Plus" target="blank" rel="nofollow" class="icon-gplus"><i class="fa fa-1x fa-google-plus fa-fw"></i></a></li>
                                
                                <li><a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&source=<?php bloginfo('name'); ?>&url=<?php the_permalink();?>" title="Share this post on Twitter" class="icon-tw"><i class="fa fa-1x fa-twitter fa-fw"></i></a></li>
                                
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=<?php the_excerpt(); ?>&source=<?php bloginfo('name'); ?>-<?php bloginfo('description');  ?>" title="Share this post on LinkedIn" class="icon-lin"><i class="fa fa-1x fa-linkedin fa-fw"></i></a></li>
                                
                                <li><a href="https://getpocket.com/save?url=<?php the_permalink();?>&title=<?php the_title(); ?>" title="Read it later on Pocket" class="icon-pckt"><i class="fa fa-1x fa-get-pocket fa-fw"></i></a></li>
                                
                                <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink();?>&title=<?php the_title(); ?>" title="Pin it on Pinterest" class="icon-pinterest"><i class="fa fa-1x fa-pinterest fa-fw"></i></a></li>
                                
                                <li><a href="<?php the_permalink();?>feed/" title="RSS" class="icon-rss"><i class="fa fa-rss fa-fw"></i></a></li>
                                
                                <li><a href="javascript:window.print()" class="icon-prntr"><i class="fa fa-1x fa-fw fa-print"></i></a></li>
                                
                                <li><a href="mailto:?subject=<?php the_title(); ?>&body=Read it from here - <?php the_permalink(); ?>" title="Email This" class="icon-mail"><i class="fa fa-1x fa-fw fa-envelope"></i></a></li>
                                
                            </ul><hr><br>
                            
                                <?php the_content(); ?>
                            
                            <?php endwhile; else : ?>
                                <div class="news-item-wrapper">
                                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                    </div>
                    
                </div><!-- news section -->
            </div><!-- header content -->
        </div><!-- header content container -->
        
<?php get_footer(); ?>