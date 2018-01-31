<?php

/**
 * Template Name: Clients Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'loop/loop', 'clients' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
