<!DOCTYPE html>
<html>
<head>
  <title>Richster</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:Condensed" />

  <?php
    foreach( $header['css'] as $css ){
      echo '<link rel="stylesheet" type="text/css" href="/css/'.$css.'" />';
    }
    foreach( $header['js'] as $js ){
      echo '<script type="text/javascript" src="/js/'.$js.'"></script>';
    }
  ?>

  <script type="text/javascript" src="/js/include/bootstrap.min.js"></script>
  <script src="/js/include/bootstrap-tooltip.js"></script>
  <script src="/js/include/bootstrap-popover.js"></script>
</head>
