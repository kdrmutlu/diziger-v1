<!DOCTYPE html>
<html>  
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
</head>
<body>
<header>     
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img alt="Brand" height="25px" src="<?php bloginfo('template_url'); ?>/images/logo.png"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Anasayfa</a></li>
        <li><a href="#">Haberler</a></li>
        <li><a href="#">Fragman</a></li>
        <li><a href="#">Tanıtım</a></li>
        <li><a href="#">İnceleme</a></li>
        <li><a href="#">Listeler</a></li>
        <li><a href="#">Özel Dosya</a></li>
        <li><a href="#">Kamera Arkası</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<!-- /Header -->