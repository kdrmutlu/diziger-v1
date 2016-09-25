<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div class="container">
        <div class="row">
            <center><h1 style="color:#900;">404</h1>
            <img class="img-responsive" src="<?php bloginfo("template_url"); ?>/images/404.gif" alt="404">
            <h1>Aradığınız sayfa burada yok. <a href="<?php echo home_url(); ?>">Anasayfaya</a> dönmenizi öneririz :)</h1></center>
        </div>
    </div>
<?php get_footer(); ?>