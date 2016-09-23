<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'diziger' ),
) );

add_theme_support( 'post-thumbnails' );
add_image_size( 'bizim', 1366, 768, array('left', 'top'), true );
?>