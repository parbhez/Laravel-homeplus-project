<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(URL::to('public/frontend/assets/img/favicon.jpg')); ?>">
        <title>Home::Plus</title>

  <!-- CSS ================================================== -->
  <?php echo HTML::style('public/frontend/assets/css/font-awesome.min.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/timber.scss.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/animate.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/jquery.bxslider.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/meanmenu.min.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/nivo-slider.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/owl.carousel.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/owl.transitions.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/owl.theme.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/bootstrap.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/jquery-ui.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/style.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/sign-me-in-cart.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/responsive.css'); ?>


  <?php if(Request::segment(1)): ?>
    <?php echo HTML::style('public/frontend/assets/css/magiczoom.css'); ?>

    <?php echo HTML::style('public/frontend/assets/css/product-list.css'); ?>

    <?php echo HTML::style('public/frontend/assets/css/solaiman-lipi.css'); ?>

    <?php echo HTML::style('public/frontend/assets/css/single_product_view.css'); ?>

  <?php endif; ?>


  <!-- Modal Carousel CSS --> 
  <?php echo HTML::style('public/frontend/assets/css/util.carousel.skins.css'); ?>

  <?php echo HTML::style('public/frontend/assets/css/all.css'); ?>




    <?php echo HTML::script('public/frontend/assets/js/jquery.min.js'); ?>

    <?php echo e(HTML::script('public/assets/validation/jquery.validate.min.js')); ?>

    <?php echo e(HTML::script('public/assets/validation/jquery.customValidation.js')); ?>

   
 </head>

  <body>
