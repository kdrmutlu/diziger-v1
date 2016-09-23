<?php get_header(); ?>
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="col-md-6">
            <div class="card">
              <a class="resimlink" href="<?php the_permalink(); ?>">
              <div class="resimKapsayici">
              <?php if ( has_post_thumbnail() ) {the_post_thumbnail('bizim', array('class' => 'img-responsive'));
              }
              else{
              ?>
                 <img class="card-img-top img-responsive" src="<?php bloginfo("template_url"); ?>/images/diziger.png" alt="Card image cap">
              <?php } ?>
              <p class="resimYazisi"><?php the_category(', ') ?></p>
              </div></a>
              <div class="card-block">
                <p class="yazibilgi"><small class="text-muted"><b class="indexyazar"><?php the_author_firstname(''); ?> <?php the_author_lastname(''); ?></b> - <?php the_time('d F Y'); ?></small></p>
                <h3 class="card-text haberbaslik"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </div>
            </div>
          </div>        
        <?php endwhile; ?>
        <?php else : ?>
        Bu kategoride makale bulunmuyor.
        <?php endif; ?>
        
          <div class="col-md-12">
            <div class="row">
              <div class="sayfalama"><?php sayfalama(); ?></div>
            </div>
          </div>

        </div>
      </div>
      
<?php get_sidebar(); ?>
<?php get_footer(); ?>