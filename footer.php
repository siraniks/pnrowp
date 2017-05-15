        
        <footer>
        <div class="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        
                        <!-- transparency logo -->
                        <div class="col-lg-9 hidden-sm-down">
                            <h6 class="footdnr">Department of Environment and Natural Resources</h6>
                            <h4 class="footpnr"><a><?php bloginfo('name'); ?></a></h4>
                            <h5 class="footrnr"><?php bloginfo('description'); ?></h5><br>
                            <i class="footcnr fa fa-map-marker fa-fw" aria-hidden="true" ></i>&nbsp;<span class="footcontact"><?php echo get_theme_mod('contact_adr', 'Block 1, Martinez Subd., Zone IV, 9506 City of Koronadal'); ?></span><br>
                            <i class="footcnr fa fa-envelope fa-fw" aria-hidden="true" ></i>&nbsp;<span class="footcontact"><?php echo get_theme_mod('contact_email', 'penro.southcotabato@yahoo.com'); ?></span><br>
                            <i class="footcnr fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp;<span class="footcontact"><?php echo get_theme_mod('contact_telnum', '(083) 228-3502'); ?></span>
                        </div>
                        
                        <div class="col-lg-3 center float-xs-right">
                            <!-- desktop -->
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Transparency Seal' ) ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="What is Transparency Seal?"><img class="transparency-seal75 hidden-md-down" src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal.png" /></a>
                            <!-- tablet -->
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Transparency Seal' ) ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="What is Transparency Seal?"><img class="transparency-seal25 hidden-lg-up hidden-sm-down" src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal.png" /></a>
                            <!-- mobile -->
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Transparency Seal' ) ) ); ?>" data-toggle="tooltip" data-placement="bottom" title="What is Transparency Seal?"><img class="transparency-seal75 hidden-sm-up" src="<?php echo get_template_directory_uri(); ?>/images/transparency-seal.png" /></a>
                        </div>
                        <!-- Site map / expanded footer Links -->
                        <!-- <div class="col-lg-9 hidden-md-down">
                                
                            <php
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
                                
                        </div> wrapper -->
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
                        <div class="col-md-5 hidden-md-down">
                            <p class="muted float-xs-right" style="text-align: right;">Copyright <?php echo date('Y'); ?> PENRO <?php bloginfo('description'); ?>. All rights reserved</p>
                        </div>
                        <!-- tablet -->
                        <ul class="col-md-12 tablet-tos hidden-lg-up hidden-sm-down">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Service' ) ) ); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Disclaimer' ) ) ); ?>">Disclaimer</a></li>
                        </ul>
                        <div class="col-md-12 hidden-lg-up hidden-sm-down">
                            <p class="muted center">Copyright <?php echo date('Y'); ?> PENRO <?php bloginfo('description'); ?>. All rights reserved</p>
                        </div>
                        <!-- mobile -->
                        <ul class="col-md-12 mobile-tos hidden-sm-up center">
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Terms of Service' ) ) ); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Disclaimer' ) ) ); ?>">Disclaimer</a></li>
                        </ul><br>
                        <div class="span12 hidden-sm-up" style="font-size: 12px;">
                            <p class="mx-auto">
                                <i class="footcnr fa fa-map-marker fa-fw" aria-hidden="true" ></i>&nbsp;<span class="footcontact"><?php echo get_theme_mod('contact_adr', 'Blk. 1, Martinez Subd., Zone IV, 9506 Koronadal City'); ?></span><br>
                                <i class="footcnr fa fa-envelope fa-fw" aria-hidden="true" ></i>&nbsp;<span class="footcontact"><?php echo get_theme_mod('contact_email', 'penro.southcotabato@yahoo.com'); ?></span><br>
                                <i class="footcnr fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp;<span class="footcontact"><?php echo get_theme_mod('contact_telnum', '(083) 228-3502'); ?></span>
                            </p>
                            <p class="center">Copyright <?php echo date('Y'); ?> PENRO <?php bloginfo('description'); ?>. <br>All rights reserved</p>
                        </div>
                        
                    </div><!-- footer content -->
                </div><!-- row-fluid -->
            </div><!-- container footer sub -->
        </div><!-- footer -->
            
        <!-- Feedback Form -->
<!--        <php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Feedback")):else: ?><php endif; ?>-->
        
        <div class="modal fade bd-example-modal-sm" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h6 class="modal-title" id="exampleModalLabel">PWP Theme Feedback</h6>
                    </div>
                    <div class="modal-body">
                        <p>Leave a message there.
                        </p>
                        
                        <div class="center"><iframe src="https://discordapp.com/widget?id=300837797344968704&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe></div>
                    </div>
                    
                </div>
                
            </div>
        </div>
            
        </footer>
        <!--end of footer -->
        <?php wp_footer(); ?>
    </body>
</html>