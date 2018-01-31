<?php

  // PREPARE PORTFOLIO QUERY
	$args = array(
		'post_type'			=> 'clients',
		'posts_per_page' 	=> -1	
	);
  $posts = get_posts($args);
  
	if ($posts) :
?>
  	<div class="projects-area clearfix">
  		<?php 
        foreach ( $posts as $post ) : setup_postdata($post); $post_id = $post->ID; // print_R($project); 
          $url = get_field('url', $post_id);
      ?>
  			<div class="project">
  				<?php if ( has_post_thumbnail($post_id) ) : ?>
    				<div class="project-thumb">
    					<?php echo get_the_post_thumbnail( $post_id, 'thumbnail' ); // the_post_thumbnail('astrid-project-thumb');  ?>
    					<div class="project-content">
    						<h3 class="project-title"><a href="<?php echo $url; ?>" target="_blank"><?php echo $post->post_title; ?></a></h3>
    					</div>								
    				</div>
  				<?php endif; ?>
  			</div>
  		<?php endforeach; ?>
  	</div>
  			
<?php
	wp_reset_postdata();
	endif;