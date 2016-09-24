<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'diziger' ),
) );

//Sidebar
register_sidebar( array(
        'name' => __( 'Sağ bileşen', 'diziger' ),
        'id' => 'sidebar-right',
        'description' => __( 'Sağ tarafta gözükecek bileşen alanı.', 'diziger' ),
        'before_widget' => '<div class="panel panel-default">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="panel-heading"><h3 class="panel-title">',
        'after_title'   => '</h3></div>',
    ) );

//Resim
add_theme_support( 'post-thumbnails' );
add_image_size( 'bizim', 1366, 768, array('left', 'top'), true );

//Sayfalama
function sayfalama($pages = '', $range = 3)
{
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}
if(1 != $pages)
{
echo "<center><div class='wp-pagenavi'>";
if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&laquo;</a>";
for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
}
}
if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&raquo;</a>";
echo "</div></center>\n";
}
}
?>

<?php
/*
 * Plugin Name: Kategori Bileşeni
 * Plugin URI: http://baransomakli.com
 * Description: Bu bileşen ile çift kategori oluşturacaksınız.
 * Version: 1.0
 * Author: Baran Somaklı
 * Author URI: http://baransomakli.com
 */
  
add_action( 'widgets_init', 'bs_kategori_widgets' );
  
function bs_kategori_widgets() {
 register_widget( 'bs_kategori_widget' );
}
  
class bs_kategori_widget extends WP_Widget {
  
function bs_kategori_widget() {
  
 /* Widget settings */
 $widget_ops = array( 'classname' => 'widget_kategori', 'description' => __('Bu bileşen ile kategori da ki abone ol butonu yapabilirsiniz.', 'bs') );
  
/* Create the widget */
 $this->WP_Widget( 'bs_kategori_widget', __('Çift Kategori Bileşeni', 'bs'), $widget_ops );
 }
  
function widget( $args, $instance ) {
  
 ?>  
       <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">SON YAZILAR</h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                    <?php query_posts('showposts=5'); ?>
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="media">
                            <div class="media-left">
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('bizim', array('class' => 'img-circle img-resposive'));
                            }
                            else{
                            ?>
                                <img src="http://placehold.it/70x70" class="img-circle" width="70px" height="70px">
                            <?php } ?>
                            </div>
                            <div class="media-body">
                                <h4><?php the_title(); ?></h4>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    <?php else : ?>
                    Bu kategoride makale bulunmuyor.
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
            
 
 <?php
 echo $after_widget;
 }
  
function update( $new_instance, $old_instance ) {$instance = array();return $instance;}
  
function form( $instance ) {
  
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
  
 <p>
 Bileşenin Ayalarını Tema Panelinden Yapınız!
 </p>
  <?php
 }
}