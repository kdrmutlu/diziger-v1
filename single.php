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
                <p class="resimYazisi"><?php the_category(', ') ?></p>
              </div>
              <div class="card-block">
                
                <h1 class="singlebaslik"><?php the_title(); ?></h1>
                <div class="icerik"><?php the_content(); ?></div>

    <div class="author-box">
		<div class="image">
			<div class="img-responsive img-circle"><?php echo get_avatar( get_the_author_email(), '70' ); ?></div>
		</div>
		<div class="info">
			<h6 class="singleyazar"><?php the_author_firstname(''); ?> <?php the_author_lastname(''); ?></h6>
            <p><?php the_author_description(''); ?></p>
		</div>
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