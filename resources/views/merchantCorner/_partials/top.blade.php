<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Marcent-Dashboard</title>

    <!-- Font Awesome CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/font-awesome.min.css') !!}
    {!! HTML::style('public/merchantCorner/assets/chosen/chosen.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/solaiman-lipi.css') !!}
            <!-- Bootstrap CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/bootstrap.min.css') !!}
            <!-- Owl Carousel CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/owl.carousel.css') !!}
            <!-- Custom CSS-->
    {!! HTML::style('public/merchantCorner/assets/style.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/marcent-corner.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/marcent-dashboard.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/marcent-product-entry.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/marcent-management.css') !!}
            <!-- Responsive CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/responsive.css') !!}

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {!! HTML::script('public/frontend/assets/js/html5shiv.min.js') !!}
    {!! HTML::script('public/frontend/assets/js/respond.min.js') !!}
    <![endif]-->

    <!-- jQuery -->
    {!! HTML::script('public/frontend/assets/js/jQuery v1.12.4.js') !!}
    {{ HTML::script('public/merchantCorner/assets/chosen/chosen.jquery.js') }}
    <!-- Bootstrap JS -->
    {!! HTML::script('public/frontend/assets/js/bootstrap.min.js') !!}
    {{--for validation--}}
    {{ HTML::script('public/assets/validation/jquery.validate.min.js') }}
    {{ HTML::script('public/assets/validation/jquery.customValidation.js') }}

    <!-- DataTables CSS Files -->
    {!! HTML::style('public/assets/css/optional/datatables/css/dataTables.bootstrap.min.css') !!}
    {!! HTML::style('public/assets/css/optional/datatables/css/dataTables.tableTools.min.css') !!}
    {!! HTML::style('public/assets/css/optional/datatables/css/dataTables.responsive.min.css') !!}
</head>
<body>