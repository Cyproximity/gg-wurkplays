<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <?php
    $bootstrap = array(
      'href'  => 'bower_components/bootstrap/dist/css/bootstrap.min.css',
      'type'  => 'text/css',
      'rel'   => 'stylesheet'
      );
    echo link_tag($bootstrap);
   ?>

</head>
