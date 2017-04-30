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

    <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header>
				<h1><?php _e( 'Not Found', 'penrowp2-0' ); ?></h1>
			</header>

					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'penrowp2-0' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'penrowp2-0' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>