<footer>
<div class="container">
	<div class="row">
  		<div class="col-md-4"><br />
        <span class="fbaslik">SOSYAL MEDYADA BİZ</span><div class="cizgi"></div>
        <a href="#"><img class="sosyal" src="<?php bloginfo('template_url'); ?>/images/64-facebook.png" /></a>
        <a href="#"><img class="sosyal" src="<?php bloginfo('template_url'); ?>/images/64-twitter.png" /></a>
        <a href="#"><img class="sosyal" src="<?php bloginfo('template_url'); ?>/images/64-youtube-2.png" /></a><br />
        <a href="#"><img class="sosyal" src="<?php bloginfo('template_url'); ?>/images/64-instagram.png" /></a>
        <a href="#"><img class="sosyal" src="<?php bloginfo('template_url'); ?>/images/64-googleplus.png" /></a>
        <a href="#"><img class="sosyal" src="<?php bloginfo('template_url'); ?>/images/64-rss.png" /></a><br /><br />
      </div>
  		<div class="col-md-4"><br />
        <span class="fbaslik">SAYFALAR</span><div class="cizgi"></div>
        <ul class="altmenu">
          <?php wp_nav_menu( array( 'theme_location' => 'footer_menu')); ?>
        </ul>
      </div>
  		<div class="col-md-4"><br />
        <span class="fbaslik">BİLGİLENDİRME</span><div class="cizgi"></div>
        <p class="altyazi">Bu sitede yer alan tüm içerikler diziger.com'a aittir. Diziger.com'un izni olmaksızın başka yerde yayınlanamaz. Eğer alıntı yapmak isterseniz lütfen kaynak gösteriniz.</p>
        <p class="copy">Copyright &copy; 2016 diziger.com Tüm hakları saklıdır.</p>
      </div>
	</div>
</div>
</footer>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.1.0.slim.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>    
</body>
</html>