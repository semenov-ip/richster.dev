<!DOCTYPE html>
<html>
<head>
  <title>Richster</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
    foreach( $header['css'] as $css ){
      echo '<link rel="stylesheet" type="text/css" href="/css/'.$css.'" />';
    }
    foreach( $header['js'] as $js ){
      echo '<script type="text/javascript" src="/js/'.$js.'"></script>';
    }
  ?>
</head>
