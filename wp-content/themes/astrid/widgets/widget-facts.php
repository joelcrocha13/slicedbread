<? if( have_rows('facts') ): ?>
  <div class="fact-area">
    <?php while ( have_rows('facts') ) : the_row(); ?>
    
  		<div class="fact">
  			<?php echo the_sub_field('icon'); ?>
  			<div class="service-content">                        
  				<h3 class="service-title"><?php the_sub_field('title'); ?></h3>
  				<?php echo wp_trim_words( the_sub_field('sub-title') ); ?>
          
          <div class="fact-number" data-to="<?php echo $fact_one_max; ?>"><?php echo $fact_one_max; ?></div>				
				<div class="fact-name"><?php echo $fact_one; ?></div>
          
  			</div>
  		</div>
      
  	<?php endwhile; ?>
  </div>
<?php endif; ?>