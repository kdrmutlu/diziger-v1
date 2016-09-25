<?php get_header(); ?>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="col-md-12">
            <div class="card">
              <div class="resimKapsayici">
                <?php if ( has_post_thumbnail() ) {the_post_thumbnail('bizim', array('class' => 'img-responsive'));
                }
                else{
                ?>
                    <img class="card-img-top img-responsive" src="<?php bloginfo("template_url"); ?>/images/diziger.png" alt="Card image cap">
                <?php } ?>
                
              </div>
              <div class="card-block">
                <div class="pageicerik">
                <h1 class="singlebaslik"><?php the_title(); ?></h1>
                <div class="icerik"><?php the_content(); ?></div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
<?php endwhile; else: ?> 
<?php _e('Sonuç Bulunamadı.'); ?>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>