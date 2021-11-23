<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <!-- Reset CSS ブラウザ間の差異をなくすCSS -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  </head>
  <body>
    <!-- header -->
    <div class="container" id="header">
      <h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
      <?php wp_nav_menu(); ?>
    </div>
    <!-- /header -->
<?php wp_head(); ?>
