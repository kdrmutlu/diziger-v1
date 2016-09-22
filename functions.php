<?php
add_theme_support('menus');
register_nav_menus(array(
 'menu' => 'Header Menü'
));
?>
<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'diziger' ),
) );
?>