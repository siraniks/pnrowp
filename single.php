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
            <h1 id="temp">SINGLE</h1>  
            
            <div class="row">
                <!-- news section -->
                
                <div class="col-md-9">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                    
                    <div class="news-item-wrapper">
                        <div style="clear: both" class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-fw fa-angle-right"></i> <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
                        </div>
                        <hr>
                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block' ); ?>>
                            
                            <?php if (has_post_thumbnail()) { ?>      
                                <div class="post-img-wrapper">
                                    <?php 
                                        the_post_thumbnail(
                                        'large', [
                                            'class' => 'post-img aligncenter', 
                                            'title' => 'Feature image'
                                        ]);
                                    ?>
                                </div>
                                <?php
                                    $get_description = get_post(get_post_thumbnail_id())->post_excerpt;
                                    if(!empty($get_description)){//If description is not empty show the div
                                      echo '<p class="post-img-caption">' . $get_description . '</p>';
                                    }
                                ?>
                            <?php } else { ?>
                                <!-- do nothing --> 
                            <?php } ?>   
                            
                            <h1 class="card-title news-title"><?php the_title(); ?> <?php edit_post_link('<span id="btn" class="btn" style="font-size: 12px;"><i class="fa fa-1x fa-fw fa-pencil" aria-hidden="true"></i> Edit</span>'); ?></h1>

                            <ul class="sharelist" style="font-size: 18px;">
                                
                                <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share this post on Facebook" target="blank" rel="nofollow" class="icon-fb"><i class="fa fa-facebook-square fa-fw"></i></a></li>
                                
                                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share this post on Google Plus" target="blank" rel="nofollow" class="icon-gplus"><i class="fa fa-google-plus fa-fw"></i></a></li>
                                
                                <li><a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&source=<?php bloginfo('name'); ?>&url=<?php the_permalink();?>" title="Share this post on Twitter" class="icon-tw"><i class="fa fa-twitter fa-fw"></i></a></li>
                                
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=<?php the_excerpt(); ?>&source=<?php bloginfo('name'); ?>-<?php bloginfo('description');  ?>" title="Share this post on LinkedIn" class="icon-lin"><i class="fa fa-linkedin fa-fw"></i></a></li>
                                
                                <li><a href="https://getpocket.com/save?url=<?php the_permalink();?>&title=<?php the_title(); ?>" title="Read it later on Pocket" class="icon-pckt"><i class="fa fa-get-pocket fa-fw"></i></a></li>
                                
                                <li><a href="javascript:window.print()" class="icon-prntr"><i class="fa fa-fw fa-print"></i></a></li>
                                
                                <li><a href="mailto:?subject=<?php the_title(); ?>&body=Read it from here - <?php the_permalink(); ?>" title="Email This" class="icon-mail"><i class="fa fa-fw fa-envelope"></i></a></li>
                                
                            </ul><br>
                            
                            <?php the_content(); ?>
                            
                            <?php endwhile; else : ?>
                                <div class="news-item-wrapper">
                                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                        <hr>
                        <?php the_tags( '<ul class="taglist"><i class="fa fa-fw fa-tags"></i>  Tags: &nbsp;<li>', '</li><li>', '</li></ul>' ); ?>
                        <br>
                        <div id="fbcommentbox">
                            <div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="5"></div>
                        </div>
                    </div>
                    
                    
                    
                </div><!-- news section -->
                
                <!-- SIDEBAR -->
                <?php get_sidebar( 'post' ); ?>
                
        </div><!-- header content -->
    </div><!-- header content container -->
        
<?php get_footer(); ?>