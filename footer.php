        
        <footer>
        <div class="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        
                        <!-- transparency logo -->
                        <div class="col-lg-3 center">
                            <!-- desktop -->
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Transparency Seal' ) ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="What is Transparency Seal?"><img class="transparency-seal75 hidden-md-down" src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal.png" /></a>
                            <!-- tablet -->
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Transparency Seal' ) ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="What is Transparency Seal?"><img class="transparency-seal25 hidden-lg-up hidden-sm-down" src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal.png" /></a>
                            <!-- mobile -->
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Transparency Seal' ) ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="What is Transparency Seal?"><img class="transparency-seal75 hidden-sm-up" src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal.png" /></a>
                        </div>
                        <!-- Site map / expanded footer Links -->
                        <div class="col-lg-9 hidden-md-down">
                                
                            <?php
                            $footerparams = array(
                            'menu'  =>  'Footer Menu',
                            'container' => '',
                            'theme_location' => 'footnav',
                            'items_wrap' => footnav_wrap(),
                            'depth' => '0',
                            'walker' => new footnav_walker()
                            );

                              echo strip_tags(wp_nav_menu( $footerparams ), '<a>' ); 
                            ?>
                                
                        </div><!-- wrapper -->
                    </div><!-- span12 -->
                </div><!-- row-fluid -->
            </div><!-- container -->
            
            <hr>
            <!-- sub-footer -->
            <div class="container footer-sub">
                <div class="row-fluid">
                    <div class="col-md-12">
                        <!-- desktop -->
                        <ul class="col-md-7 desk-tos hidden-md-down">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Service' ) ) ); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Disclaimer' ) ) ); ?>">Disclaimer</a></li>
                        </ul>
                        <!-- tablet -->
                        <ul class="col-md-12 tablet-tos hidden-lg-up hidden-sm-down">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Service' ) ) ); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Disclaimer' ) ) ); ?>">Disclaimer</a></li>
                        </ul>
                        <!-- mobile -->
                        <ul class="col-md-12 mobile-tos hidden-sm-up">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Service' ) ) ); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Disclaimer' ) ) ); ?>">Disclaimer</a></li>
                        </ul>
                        <!-- desktop -->
                        <div class="col-md-5 hidden-md-down">
                            <p class="muted pull-right" style="text-align: right;">Copyright <?php echo date('Y'); ?> PENRO <?php bloginfo('description'); ?>. All rights reserved</p>
                        </div>
                        <!-- tablet -->
                        <div class="col-md-12 hidden-lg-up hidden-sm-down">
                            <p class="muted center">Copyright <?php echo date('Y'); ?> PENRO <?php bloginfo('description'); ?>. All rights reserved</p>
                        </div>
                        <!-- mobile -->
                        <div class="span12 hidden-sm-up" style="font-size: 12px;">
                            <p class="center">Copyright <?php echo date('Y'); ?> PENRO <?php bloginfo('description'); ?>. All rights reserved</p>
                        </div>
                    </div><!-- footer content -->
                </div><!-- row-fluid -->
            </div><!-- container footer sub -->
        </div><!-- footer -->
            
        <!-- Feedback Form -->
        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Feedback")):else: ?><?php endif; ?>
            
        </footer>
        <!--end of footer -->
        <?php wp_footer(); ?>
    </body>
</html>