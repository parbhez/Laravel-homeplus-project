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
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::to('public/frontend/assets/img/favicon.jpg')}}">
        <title>Home::Plus</title>

  <!-- CSS ================================================== -->
  {!! HTML::style('public/frontend/assets/css/font-awesome.min.css') !!}
  {!! HTML::style('public/frontend/assets/css/timber.scss.css') !!}
  {!! HTML::style('public/frontend/assets/css/animate.css') !!}
  {!! HTML::style('public/frontend/assets/css/jquery.bxslider.css') !!}
  {!! HTML::style('public/frontend/assets/css/meanmenu.min.css') !!}
  {!! HTML::style('public/frontend/assets/css/nivo-slider.css') !!}
  {!! HTML::style('public/frontend/assets/css/owl.carousel.css') !!}
  {!! HTML::style('public/frontend/assets/css/owl.transitions.css') !!}
  {!! HTML::style('public/frontend/assets/css/owl.theme.css') !!}
  {!! HTML::style('public/frontend/assets/css/bootstrap.css') !!}
  {!! HTML::style('public/frontend/assets/css/jquery-ui.css') !!}
  {!! HTML::style('public/frontend/assets/css/style.css') !!}
  {!! HTML::style('public/frontend/assets/css/sign-me-in-cart.css') !!}
  {!! HTML::style('public/frontend/assets/css/responsive.css') !!}

  @if(Request::segment(1))
    {!! HTML::style('public/frontend/assets/css/magiczoom.css') !!}
    {!! HTML::style('public/frontend/assets/css/product-list.css') !!}
    {!! HTML::style('public/frontend/assets/css/solaiman-lipi.css') !!}
    {!! HTML::style('public/frontend/assets/css/single_product_view.css') !!}
  @endif


  <!-- Modal Carousel CSS --> 
  {!! HTML::style('public/frontend/assets/css/util.carousel.skins.css') !!}
  {!! HTML::style('public/frontend/assets/css/all.css') !!}



    {!! HTML::script('public/frontend/assets/js/jquery.min.js') !!}
    {{ HTML::script('public/assets/validation/jquery.validate.min.js') }}
    {{ HTML::script('public/assets/validation/jquery.customValidation.js') }}
   
 </head>

  <body>
