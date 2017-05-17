<?php
/*
Template Name: Menu Test Page
*/

get_header('main'); ?>

<div class="container"> 
    
    <iframe src="https://oras.pagasa.dost.gov.ph/widget.shtml" width="auto" height="300px"></iframe>
    
<div class="row">
    <div class="card card-block">
        <div class="new-mobi-menu">
            <ul class="mobi-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dropmenu</a></li>
                    <ul class="mobi-sub-menu">
                        <li><a class="mob-link" href="#">sub-link 1</a></li>
                        <li><a class="mob-link" href="#">sub-link 2</a></li>
                        <li><a class="mob-link" href="#">sub-link 3</a></li>
                    </ul>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
    </div>
</div>
    
<div class="row">
    <div class="col-sm-12">
        <div class="card card-block">
            <nav id="primary_nav_wrap">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">First Level</a>
                        <ul>
                            <li><a href="#">Second Level #1</a></li>
                            <li><a href="#">Second Level #2</a></li>
                            <li><a href="#">Second Level #3</a></li>
                            <li><a href="#">Second Level #4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Normal Link</a></li>
                </ul>
            </nav>
        </div>
        
        <!-- bootstrap menu -->
        
        <div class="card card-block">
        
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
        </div>
        
        <!-- new nav no bootstrap -->
        
        
        <div class="card card-block">
            <nav id="primary_nav_wrap">
                <ul>
                    <?php
                        $newmenuparams = array(
                            'menu'           =>  'New Primary Menu',
                            'container'      => '',
                            'theme_location' => 'newnav',
                            'items_wrap'     => newnav_wrap(),
                            'walker'         => new newnav_walker()
                        );

                        echo strip_tags(wp_nav_menu( $newmenuparams ), '<a>' ); 
                    ?>
                </ul>
            </nav>
        </div>
        
        <!-- new nav with bootstrap -->
        
    <!-- desktop -->    
    <nav id="primary_nav_wrap" class="navbar navbar-full bg-primary hidden-md-down">
        <div class="container">
            <ul>
                <?php
                    $newmenuparams = array(
                        'menu'           =>  'New Primary Menu',
                        'container'      => '',
                        'theme_location' => 'newnav',
                        'items_wrap'     => newnav_wrap(),
                        'walker'         => new newnav_walker()
                    );

                    echo strip_tags(wp_nav_menu( $newmenuparams ), '<a>' ); 
                ?>
            </ul>
        </div>
    </nav>
        
    <div class="card card-block">
        <div id="slider">
            <ul>
                <li>
                    <div class="slider-container">
                        <h4>#1 Pure Slider Content</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor id nisl vitae pellentesque. Fusce sed magna vitae est malesuada elementum et sed urna. Nulla aliquam, nunc sed facilisis tristique, orci ante gravida sem, sed laoreet nulla enim vel eros. Nulla aliquam malesuada hendrerit. Nulla dignissim mi quis odio consectetur cursus.</p>
                    </div>
                </li>
                <li>
                    <div class="slider-container">
                        <h4>#2 Pure Slider Content</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor id nisl vitae pellentesque. Fusce sed magna vitae est malesuada elementum et sed urna. Nulla aliquam, nunc sed facilisis tristique, orci ante gravida sem, sed laoreet nulla enim vel eros. Nulla aliquam malesuada hendrerit. Nulla dignissim mi quis odio consectetur cursus.</p>
                    </div>
                </li>
                <li>
                    <div class="slider-container">
                        <h4>#3 Pure Slider Content</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porttitor id nisl vitae pellentesque. Fusce sed magna vitae est malesuada elementum et sed urna. Nulla aliquam, nunc sed facilisis tristique, orci ante gravida sem, sed laoreet nulla enim vel eros. Nulla aliquam malesuada hendrerit. Nulla dignissim mi quis odio consectetur cursus.</p>
                    </div>
                </li>
            </ul>
        </div>    
    </div>
        
    <div class="card center">
      <div class="card-header">
        Featured
      </div>
      <div id="slide">
        <ul>
            <li>
                <div class="card-block">
                <h4 class="card-title">Special title treatment #1</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </li>
            <li>
                <div class="card-block">
                <h4 class="card-title">Special title treatment #2</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </li>
            <li>
                <div class="card-block">
                <h4 class="card-title">Special title treatment #3</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </li>
        </ul>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div>    
    
    <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Special title treatment</h3>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Special title treatment</h3>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
 <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Special title treatment</h3>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div> 
        
    </div>
</div>
    
</div> 
    
<div class="card-deck">
        <?php
            $args = array( 
                'numberposts'   => 3 ,
                'category_name' => 'announcement',
                'orderby'       => 'date',
                'order'         => 'DESC',
                'post_status'   => 'publish'

            );

            $lastposts = get_posts( $args );
            foreach ( $lastposts as $post ) :
                 setup_postdata( $post ); ?>

<!--                <div class="col-sm-4">-->
                    <div class="card">
                        <div class="card-block">
                            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                        </div>
                        <div class="card-footer">
                            <a id="readBtn" href="<?php the_permalink(); ?>" class="btn btn-primary center"><?php echo get_theme_mod( 'read-btn_textbox' ); ?></a>
                        </div>
                    </div>
<!--                </div>-->

                <?php endforeach; 
                wp_reset_postdata(); 
        ?>
    </div>


 <?php get_footer(); ?>