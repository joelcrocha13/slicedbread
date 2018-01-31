<?php

/**
 * Template Name: Portfolio Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'loop/loop', 'portfolio' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
