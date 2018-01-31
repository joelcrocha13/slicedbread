<?php
  
  add_filter('getarchives_where', 'my_custom_post_type_archive_where', 10, 2);
  function my_custom_post_type_archive_where($where,$args){  
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';  
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;  
  }