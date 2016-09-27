<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'diziger' ),
) );
//Footer Menu
add_theme_support('menus');
register_nav_menus(array(
 'footer_menu' => 'Footer Menu'
));

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

//Arama
function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div id="custom-search-input">
        <div class="input-group col-md-12">
            <input type="text" class="  search-query form-control" value="' . get_search_query() . '" name="s" id="s" placeholder="Ara" />
            <span class="input-group-btn">
                <button class="btn btn-danger" type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'">
                    <span class=" glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
    </form>';

    return $form;
}
                        
add_filter( 'get_search_form', 'my_search_form' );

//Youtube
function responsive_embed($content){
$content = str_replace('<iframe', '<div class="responsive-youtube"><iframe', $content);
$content = str_replace('</iframe>', '</iframe></div>', $content);
return $content;
}
add_filter('the_content', 'responsive_embed');
add_filter('the_excerpt', 'responsive_embed');
?>

<?php
/*
 * Plugin Name: Diziger Son Yazılar
 * Plugin URI: http://diziger.com
 * Description: Bu bileşen ile son yazılar listelenecek.
 * Version: 1.0
 * Author: Kadir Mutlu
 * Author URI: http://diziger.com
 */
  
add_action( 'widgets_init', 'bs_kategori_widgets' );
  
function bs_kategori_widgets() {
 register_widget( 'bs_kategori_widget' );
}
  
class bs_kategori_widget extends WP_Widget {
  
function bs_kategori_widget() {
  
 /* Widget settings */
 $widget_ops = array( 'classname' => 'widget_kategori', 'description' => __('Bu bileşen ile son yazılar listelenecek.', 'bs') );
  
/* Create the widget */
 $this->WP_Widget( 'bs_kategori_widget', __('Diziger Son Yazılar', 'bs'), $widget_ops );
 }
  
function widget( $args, $instance ) {
  
 ?>  
       <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">SON YAZILAR</h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                    <?php query_posts('showposts=3'); ?>
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="media">
                            <div class="media-left">
                            <a class="resimlink" href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('bizim', array('class' => 'img-circle img-resposive'));
                            }
                            else{
                            ?>
                                <img src="http://placehold.it/70x70" class="img-circle" width="70px" height="70px">
                            <?php } ?></a>
                            </div>
                            <div class="media-body">
                                <h4 class="widgetyazi"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
 Bileşenin Ayarlarını Tema Panelinden Yapınız!
 </p>
  <?php
 }
}
?>
<?php
/*
 * Plugin Name: Fragmanlar
 * Plugin URI: http://diziger.com
 * Description: Bu bileşen ile fragmanlar listelenecek.
 * Version: 1.0
 * Author: Kadir Mutlu
 * Author URI:http://diziger.com
 */

add_action( 'widgets_init', 'diziger_fra_widgets' );
 
function diziger_fra_widgets() {
 register_widget( 'diziger_fra_widget' );
}
 
class diziger_fra_widget extends WP_Widget {
 
function diziger_fra_widget() {
 
 /* Widget settings */
 $widget_ops = array( 'classname' => 'widget_fra', 'description' => __('Fragmanları listeler.', 'diziger') );
 
 /* Create the widget */
 $this->WP_Widget( 'diziger_fra_widget', __('Fragmanlar', 'diziger'), $widget_ops );
 }
 
function widget( $args, $instance ) {
 
 ?>
 
       <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">FRAGMANLAR</h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                    <?php query_posts('showposts=3&category_name=fragman'); ?>
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="media">
                            <div class="media-left">
                            <a class="resimlink" href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('bizim', array('class' => 'img-circle img-resposive'));
                            }
                            else{
                            ?>
                                <img src="http://placehold.it/70x70" class="img-circle" width="70px" height="70px">
                            <?php } ?></a>
                            </div>
                            <div class="media-body">
                                <h4 class="widgetyazi"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
 
function update( $new_instance, $old_instance ) {}
 
 function form( $instance ) {
 
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
 
 <p>
 Bileşen Ayarı Yoktur Şuan Çalışır Durumdadır.
 </p>
 
 <?php
 }
}
?>
<?php
/*
 * Plugin Name: Listeler
 * Plugin URI: http://diziger.com
 * Description: Bu bileşen ile listeler listelenecek.
 * Version: 1.0
 * Author: Kadir Mutlu
 * Author URI:http://diziger.com
 */

add_action( 'widgets_init', 'diziger_lis_widgets' );
 
function diziger_lis_widgets() {
 register_widget( 'diziger_lis_widget' );
}
 
class diziger_lis_widget extends WP_Widget {
 
function diziger_lis_widget() {
 
 /* Widget settings */
 $widget_ops = array( 'classname' => 'widget_lis', 'description' => __('Listeleri listeler.', 'diziger') );
 
 /* Create the widget */
 $this->WP_Widget( 'diziger_lis_widget', __('Listeler', 'diziger'), $widget_ops );
 }
 
function widget( $args, $instance ) {
 
 ?>
 
       <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">LİSTELER</h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                    <?php query_posts('showposts=3&category_name=liste'); ?>
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="media">
                            <div class="media-left">
                            <a class="resimlink" href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('bizim', array('class' => 'img-circle img-resposive'));
                            }
                            else{
                            ?>
                                <img src="http://placehold.it/70x70" class="img-circle" width="70px" height="70px">
                            <?php } ?></a>
                            </div>
                            <div class="media-body">
                                <h4 class="widgetyazi"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
 
function update( $new_instance, $old_instance ) {}
 
 function form( $instance ) {
 
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
 
 <p>
 Bileşen Ayarı Yoktur Şuan Çalışır Durumdadır.
 </p>
 
 <?php
 }
}
?>
