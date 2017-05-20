<!-- Sidebar -->
                <div id="sidebar" class="col-md-3">
                    <!-- Time -->
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("Time")):else: ?><?php endif; ?>
                    <!-- Sidebar -->
                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar("downloads_sidebar_widget")):else: ?><?php endif; ?>
                    
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
                        <br>
                        <a href="<?php echo get_theme_mod('w_7_url',esc_url( get_permalink( get_page_by_title( 'Downloads' ) ) )); ?>"><img class="w7" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/elib.jpg";
                                              echo get_theme_mod( 'w_7_image', $dir . $img ); ?>"/></a>
                        <br>
                        <a href="<?php echo get_theme_mod('w_8_url',esc_url( get_permalink( get_page_by_title( 'Jobs' ) ) )); ?>"><img class="w8" src="<?php 
                                              $dir = get_template_directory_uri(); ;
                                              $img = "/images/widget/job.jpg";
                                              echo get_theme_mod( 'w_8_image', $dir . $img ); ?>"/></a>
        
                    </div>
                    
                </div><!-- sidebar -->