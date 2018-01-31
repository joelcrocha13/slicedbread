<?php

  // PREPARE PORTFOLIO QUERY
	$args = array(
		'post_type'			=> 'portfolio',
		'posts_per_page' 	=> -1	
	);
  $projects = get_posts($args);
  
	if ($projects) :
?>
  	<div class="projects-area clearfix">
  		<?php foreach ( $projects as $project ) : setup_postdata($project); $post_id = $project->ID; // print_R($project); ?>
  			<div class="project">
  				<?php if ( has_post_thumbnail($post_id) ) : ?>
    				<div class="project-thumb">
    					<?php echo get_the_post_thumbnail( $post_id, 'thumbnail' ); // the_post_thumbnail('astrid-project-thumb');  ?>
    					<div class="project-content">
    						<h3 class="project-title"><a href="<?php echo $project->guid; ?>"><?php echo $project->post_title; ?></a></h3>
    					</div>								
    				</div>
  				<?php endif; ?>
  			</div>
  		<?php endforeach; ?>
  	</div>
  			
<?php
	wp_reset_postdata();
	endif;     