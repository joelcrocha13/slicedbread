<?php
  if(!function_exists('theme_comment_callback')) :
  function theme_comment_callback($comment, $args, $depth) {
?>
        
        <li>
            <div class="div_guestInfo">
              <span><?php comment_author(get_comment_ID()); ?></span>
              <span><?php echo get_comment_date('d/m/Y'); ?></span>
            </div>
            <div class="div_comment">
              <p> <?php comment_text(); ?></p>
            </div>
        </li>
<?php    
    }
  endif; 
?>