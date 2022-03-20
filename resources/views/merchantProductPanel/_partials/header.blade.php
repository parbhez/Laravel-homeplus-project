<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]>
<html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>
<html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>
<html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>
<html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->
<head>


    {!! HTML::style('public/assets/css/required/bootstrap/bootstrap.min.css') !!}
    {!! HTML::style('public/assets/css/font-awesome.min.css') !!}
            <!-- {!! HTML::style('public/assets/chosen/chosen.css') !!} -->
    {!! HTML::style('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.min.css') !!}
    {!! HTML::style('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.structure.min.css') !!}
    {!! HTML::style('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.theme.min.css') !!}
            <!--  {!! HTML::style('public/assets/css/required/mCustomScrollbar/jquery.mCustomScrollbar.min.css') !!} -->
    <!--  {!! HTML::style('public/assets/css/required/icheck/all.css') !!} -->
    <!-- {!! HTML::style('public/assets/fonts/metrize-icons/styles-metrize-icons.css') !!}
    {!! HTML::style('public/assets/css/optional/bootstrap-datetimepicker.min.css') !!}
            -->

    <!-- More Required CSS Files -->
    <!--     {!! HTML::style('public/assets/css/styles-core.css') !!}
    {!! HTML::style('public/assets/css/styles-core-responsive.css') !!}
    {!! HTML::style('public/assets/css/util.carousel.skins.css') !!} -->


    {{ HTML::script('public/assets/js/required/jquery-1.11.1.min.js') }}
    {{ HTML::script('public/assets/chosen/chosen.jquery.js') }}
    {{ HTML::script('public/assets/js/required/jquery-ui-1.11.0.custom/jquery-ui.min.js') }}
    {{ HTML::script('public/assets/js/required/bootstrap/bootstrap.min.js') }}
    {{ HTML::script('public/assets/validation/jquery.validate.min.js') }}
    {{ HTML::script('public/assets/validation/jquery.customValidation.js') }}

            <!-- DataTables CSS Files -->

    {!! HTML::style('public/assets/css/optional/datatables/css/dataTables.bootstrap.min.css') !!}
    {!! HTML::style('public/assets/css/optional/datatables/css/dataTables.tableTools.min.css') !!}
    {!! HTML::style('public/assets/css/optional/datatables/css/dataTables.responsive.min.css') !!}
    {!! HTML::style('public/assets/css/solaiman-lipi.css') !!}

    {!! HTML::style('public/assets/css/style.css') !!}
    {!! HTML::style('public/assets/css/demo-files/owl.carousel.css') !!}
    {!! HTML::style('public/assets/css/demo-files/marecent-profile.css') !!}
    {!! HTML::style('public/assets/css/demo-files/responsive.css') !!}

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>Marcent Profile</title>

    <!-- Font Awesome CSS-->
    <!-- Bootstrap CSS-->
    <!-- Owl Carousel CSS-->
    <!--jQuery UI-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <!-- Custom CSS-->
    <!-- Responsive CSS-->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<!--Start Top Bar -->
<div class="top_bar">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="search_wrapper">
                        <div class="row">
                            <div class="col-md-10 col-sm-10">
                                <div class="search_box">
                                    {!! Form::open(['route'=>'serachProduct']) !!}
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <div class="search_input_box">
                                                <input type="text" name="search_content" placeholder="{{trans('frontend.search_product')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <ul class="select_input_category">
                                                <li style=" float: left;">
                                                    <select name="search_type" id="SearchSelect">
                                                        <option value="1">{{trans('frontend.all')}}</option>
                                                        <option value="2">{{trans('frontend.product')}}</option>
                                                        <option value="3">{{trans('frontend.merchant')}}</option>
                                                    </select>
                                                </li>
                                                <li style=" float: left;">
                                                    <button type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div><!--search_box -->
                            </div><!--col-md-10 -->


                            <div class="col-md-2 col-sm-2">
                                <div class="shopping_cart">
                                    <a href="">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div><!--col-md-2 -->
                        </div>
                    </div>
                </div>


                <div class="col-md-5">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a
                                href="{{URL::to('merchantPage')}}">{{trans('frontend.merchant_corner')}}</a>
                            </li>
                            <li class="dropdown">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true">
                                        <i class="fa fa-user"></i>
                                        {{trans('frontend.your_account')}}<span class="caret"></span>
                                    </a>
                                    @if(Session::has('frontendUser.id'))
                                        <ul class="dropdown-menu">
                                            <li>
                                                <h4 style="text-align: center;">{{Session::get('frontendUser.full_name')}}</h4>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{URL::to('manageUserProfile')}}">
                                                    <i class="fa fa-user" style="color: #4D4D4D;"></i>
                                                    {{trans('frontend.manage_profile')}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('userLogout')}}">
                                                    <i class="fa fa-sign-out" style="color: #4D4D4D;"></i>
                                                    {{trans('frontend.signout')}}
                                                </a>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="dropdown-menu">
                                            <li>
                                                {!!Form::open(array('route'=>'checkUserLogin.post','id'=>'userLoginForm','class'=>'navbar-form navbar-left', 'style'=>'padding-left: 15px', 'files'=>true))!!}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{trans('frontend.email_address')}}</label>
                                                    <input type="email" name="email" class="form-control no_radius"
                                                           id="exampleInputEmail1" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">{{trans('frontend.password')}}</label>
                                                    <input type="password" name="password"
                                                           class="form-control no_radius" id="exampleInputPassword1"
                                                           placeholder="Password">
                                                </div>

                                                <button type="submit"
                                                        class="btn btn-default">{{trans('frontend.signin')}}</button>
                                                <div class="forget_pass">
                                                    <a href="">{{trans('frontend.forget_password')}} ?</a>
                                                </div>
                                                {!! Form::close() !!}
                                            </li>
                                            <li>
                                                <a href="{{URL::to('frontendUser')}}"
                                                   style="margin-left: 10px">{{trans('frontend.register')}}</a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </li>
                            <li>
                                <button type="submit"
                                        class="btn btn-default language-select @if(Session::get('frontend_lang') == 1) active @endif"
                                        data-status="1">ENG
                                </button>
                                <button type="submit"
                                        class="btn btn-default language-select @if(Session::get('frontend_lang') == 2) active @endif"
                                        data-status="2">বাংলা
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!--Close Top Bar -->


<!--Start Header -->
<header class="header">
    <div class="container">
        <div class="row">


            <!--Start Logo-->
            <div class="col-md-3">
                <a href="{{URL::to('/')}}" class="logo">
                    <img src="{{URL::to('public/images/eshopLogo/logo.png')}}" alt="">
                </a>
            </div>
            <!--Close Logo-->

            <div class="col-md-4">
                <div class="marcent_login">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="search" class="form-control" id="exampleInputEmail2"
                                   placeholder="এই বিক্রেতার পন্য খুজুন">
                        </div>
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-5">
                <div class="marcent_info">
                    <h2 class="musa">
                        <i class="fa fa-info-circle"></i>
                        {{$merchantInfo->company_name}}
                        <span class="caret"></span>
                    </h2>

                    <div class="marcent_info_style">
                        <div class="info_text"><b>{{trans('merchant.merchant_name')}}
                                :</b> {{$merchantInfo->company_name}}</div>
                        <div class="info_text"><b>{{trans('merchant.distric')}} :</b> Dhaka</div>
                        <div class="info_text"><b>{{trans('merchant.dhaka_delevare')}} :</b> ৫০ টাকা</div>
                        <div class="info_text"><b>{{trans('merchant.out_delevare')}} :</b> ৯০ টাকা</div>
                        <div class="info_text">
                            <b>{{trans('merchant.address')}} :</b> {{$merchantInfo->address}}
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</header>
<!--Close Header -->
