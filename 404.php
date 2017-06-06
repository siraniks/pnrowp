<?php
/** 
 * 404 Page
 *
 * @package Wordpress
 * @subpackage PENROWP
 * @since PENROWP 2.0
 *
 */

get_header('404'); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="mx-auto">
                <div class="div404 aligncenter">
                    
                    <div class="card card-block" style="background-color: rgba(255,255,255, 0.8);">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/404-pic.png" class="img-fluid" style="height:250px;"/>
                        <hr>
                        <p>The page you're looking for was not found.</p>
                        <a id="btn" href="<?php echo home_url(); ?>" class="btn btn-primary"><i class="fa fa-fw fa-home"></i>&nbsp;Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer('404'); ?>