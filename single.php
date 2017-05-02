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
            
            
        </div>  
    
        <div class="container">
            <div class="row">
                <!-- news section -->
                
                <div class="col-md-9">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                    
                    <div class="news-item-wrapper">
                        <div class="card float-xs-right" style="padding: 5px;">
                            <ul class="sharelist" style="font-size: 16px;">
                                Share This:
                                <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share this post on Facebook" target="blank" rel="nofollow"><i class="fa fa-facebook-square fa-fw"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&source=<?php bloginfo('name'); ?>&url=<?php the_permalink();?>"><i class="fa fa-twitter fa-fw"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=<?php the_excerpt(); ?>&source=<?php bloginfo('name'); ?>-<?php bloginfo('description'); ?>"><i class="fa fa-linkedin fa-fw"></i></a></li>
                                <li><a href="https://getpocket.com/save?url=<?php the_permalink();?>&title=<?php the_title(); ?>"><i class="fa fa-get-pocket fa-fw"></i></a></li>
                            </ul>
                        </div>
                        <div style="clear: both" class="breadbg breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
                            <a href="<?php echo home_url(); ?>">Home</a> > <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }?>
                        </div>
                        
                        <div class="float-xs-right">
                        <?php edit_post_link('<button id="editBtn" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-1x fa-fw fa-pencil-square-o" aria-hidden="true"></i> EDIT</button>'); ?> 
                        </div>
<!--                    
                        <div class="tags float-xs-left">
                            <php the_tags( '<ul class="taglist">Tags: <li>', '</li><li>', '</li></ul>' ); >
                        </div>
-->
                        
                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'card-block' ); ?>>
                            <h2 class="card-title news-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            
                            <?php the_content(); ?>
                            
                            <?php endwhile; else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.', 'penrowp2-0' ); ?></p>
                            <?php endif; ?>
                            
                        </div>
                        
                        <hr>
                        
<!--                        <php wp_list_comments( ); ?>-->
<!--                        <php comments_template( ); ?>-->
<!--                        <php comment_form(); ?>-->
<!--                        <php wp_link_pages(  ); ?>-->
                        
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("disqus_commentbox")):else: ?><?php endif; ?>
                    </div>
                    
                    
                    
                </div><!-- news section -->
                
                <!-- Sidebar -->
                <div class="col-md-3">
                    
                    <div class="hidden-md-down">
                        <!-- Time -->
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Time")):else: ?><?php endif; ?>
                    </div>
                        <!-- Announcement -->
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("sidebar_widget")):else: ?><?php endif; ?>
                    
                        <div class="card announcement card-block">
                            <a href="<?php echo get_theme_mod('w_1_url','http://localhost/wordpress/transparency-seal'); ?>"><img class="w1" src="<?php 
                                                  $dir = get_template_directory_uri(); ;
                                                  $img = "/images/widget/transpaSeal.jpg";
                                                  echo get_theme_mod( 'w_1_image', $dir . $img ); ?>" /></a>
                            <br>
                            <a href="<?php echo get_theme_mod('w_2_url','http://denr.gov.ph/component/content/article/839.html#'); ?>"><img class="w2" src="<?php 
                                                  $dir = get_template_directory_uri(); ;
                                                  $img = "/images/widget/philGEPS.jpg";
                                                  echo get_theme_mod( 'w_2_image', $dir . $img ); ?>" /></a>
                            <br>
                            <a href="<?php echo get_theme_mod('w_3_url','http://www.gov.ph/pbb/'); ?>"><img class="w3" src="<?php 
                                                  $dir = get_template_directory_uri(); ;
                                                  $img = "/images/widget/perform.jpg";
                                                  echo get_theme_mod( 'w_3_image', $dir . $img ); ?>" /></a>
                            <br>
                            <a href="<?php echo get_theme_mod('w_4_url','http://ngp.denr.gov.ph/'); ?>"><img class="w4" src="<?php 
                                                  $dir = get_template_directory_uri(); ;
                                                  $img = "/images/widget/ngp.jpg";
                                                  echo get_theme_mod( 'w_4_image', $dir . $img ); ?>" /></a>
                            <br>
                            <a href="<?php echo get_theme_mod('w_5_url','http://localhost/wordpress/transparency-governance/citizens-charter/'); ?>"><img class="w5" src="<?php 
                                                  $dir = get_template_directory_uri(); ;
                                                  $img = "/images/widget/dcc.jpg";
                                                  echo get_theme_mod( 'w_5_image', $dir . $img ); ?>" /></a>
                            <br>
                            <a href="<?php echo get_theme_mod('w_6_url','https://www.facebook.com/penro.southcotabato'); ?>"><img class="w6" src="<?php 
                                                  $dir = get_template_directory_uri(); ;
                                                  $img = "/images/widget/fb.jpg";
                                                  echo get_theme_mod( 'w_6_image', $dir . $img ); ?>"/></a>
                        </div>
                </div><!-- sidebar -->
            </div><!-- header content -->
        </div><!-- header content container -->
        
        
<?php get_footer(); ?>