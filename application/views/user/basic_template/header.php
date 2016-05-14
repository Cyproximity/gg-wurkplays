<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo "Gnasty Gaming | ".ucfirst($title) ?></title>
  <?php
    $bootstrap = array(
      'href'  => 'bower_components/bootstrap/dist/css/bootstrap.min.css',
      'type'  => 'text/css',
      'rel'   => 'stylesheet'
      );
    echo link_tag($bootstrap);
    $featherlight =  array(
      'href'  => 'assets/js-libraries/featherlight-1.4.1/release/featherlight.min.css',
      'type'  => 'text/css',
      'rel'   => 'stylesheet'
      );
    echo link_tag($featherlight);
   ?>

</head>
