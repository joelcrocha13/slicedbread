<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
  
  <?php get_template_part( 'widgets/widget', 'facts' ); ?>
  <?php get_template_part( 'widgets/widget', 'services' ); ?>

<?php endwhile; endif; ?>
