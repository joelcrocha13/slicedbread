<? if( have_rows('services') ): ?>
  <div class="service-area clearfix">
    <?php while ( have_rows('services') ) : the_row(); ?>
    
  		<div class="service astrid-3col">
  			<?php echo the_sub_field('icon'); ?>
  			<div class="service-content">
  				<h3 class="service-title"><?php the_sub_field('title'); ?></h3>
  				<?php echo wp_trim_words( the_sub_field('description') ); ?>
  			</div>
  		</div>
      
  	<?php endwhile; ?>
  </div>
<?php endif; ?>