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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::to('public/merchantCorner/assets/img/favicon-32x32.png')}}">
    <title>Seller Corner</title>

    <!-- Font Awesome CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/font-awesome.min.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/solaiman-lipi.css') !!}
            <!-- Bootstrap CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/bootstrap.min.css') !!}
            <!-- Owl Carousel CSS-->
    {!! HTML::style('public/merchantCorner/assets/css/owl.carousel.css') !!}
            <!-- Custom CSS-->
    {!! HTML::style('public/merchantCorner/assets/style.css') !!}
    {!! HTML::style('public/merchantCorner/assets/css/marcent-corner.css') !!}
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
            <!-- Bootstrap JS -->
    {!! HTML::script('public/frontend/assets/js/bootstrap.min.js') !!}
    {{--for validation--}}
    {{ HTML::script('public/assets/validation/jquery.validate.min.js') }}
    {{ HTML::script('public/assets/validation/jquery.customValidation.js') }}
</head>
<body>
<!--Start Header -->
<header class="header">
    <div class="container">
        <div class="row">

            <!--Start Logo-->
            <div class="col-md-3">
                <a href="{{URL::to('/')}}" class="logo">
                    <img src="{{URL::to('public/merchantCorner/assets/img/logo.png')}}" alt="">
                </a>
            </div>
            <!--Close Logo-->

            <div class="col-md-3">
                <div class="marcent_banner">
                    <a href="{{URL::to('merchantPage')}}">
                        <h2>Seller Corner</h2>
                    </a>
                </div>
            </div>


            <!--Start Search-->
        </div>
    </div>
</header>
<!--Close Header -->


<!--Start Slider & Sign Up -->
<section class="faq_and_signup">
    <div class="container">
        <div class="row">
        <div class="col-md-offset-2 col-md-6" style="margin-top: 20px">
                    <div class="login_section_title">
                        <h2>
                            <i class="fa fa-user-plus"></i>
                            পাসওয়ার্ড পরিবর্তন
                        </h2>
                    </div>
                    <div class="login_section">
                       {!!Form::open(array('route'=>'merchantForgotPassword.post', 'id'=>'userRegistrationForm','id' => 'userRegistrationForm'))!!}
                        <div class="form-group">
                            <label for="Email">Enter Your Email Address *</label>
                            <input type="email" name="email" id="Email" class="form-control input-feild" required="">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-success">Send Me a New Password</button>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
        </div>
    </div>
</section>
<!--Close Slider & Sign Up -->


<!--Start Quick Link -->
<section class="quick_link">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="" class="single_quick_link">
                    <i class="fa fa-sign-in"></i>
                    <h2>{{trans('frontend.registration')}}</h2>
                </a>
            </div>
            <div class="col-md-3">
                <a href="" class="single_quick_link">
                    <i class="fa fa-list-alt"></i>
                    <h2>{{trans('frontend.product_listing')}}</h2>
                </a>
            </div>
            <div class="col-md-3">
                <a href="" class="single_quick_link">
                    <i class="fa fa-car"></i>
                    <h2>{{trans('frontend.product_delivery')}}</h2>
                </a>
            </div>
            <div class="col-md-3">
                <a href="" class="single_quick_link">
                    <i class="fa fa-money"></i>
                    <h2>{{trans('frontend.payment_receive')}}</h2>
                </a>
            </div>
        </div>
    </div>
</section>
<!--Close Quick Link -->


<!--Start Big Footer-->
<section class="big_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer_content">
                    <a target="_blank" class="footer_heading">
                        <h2>eShoppingBD.com</h2>
                    </a>
                    <ul class="footer_list">
                        <li>
                            <a href="{{URL::to('footerMenuDetails#footer-how-to-order')}}" target="_blank">How to Order</a>
                        </li>
                        <li>
                            <a href="{{URL::to('footerMenuDetails#footer-refund-policy')}}" target="_blank">Return Policy</a>
                        </li>
                        <li>
                            <a href="{{URL::to('footerMenuDetails#footer-shipment')}}" target="_blank">Shipment</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer_content">
                    <a target="_blank" class="footer_heading">
                        <h2>Information</h2>
                    </a>
                    <ul class="footer_list">
                        <li>
                            <a href="{{URL::to('footerMenuDetails#footer-contact-us')}}" target="_blank">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{URL::to('footerMenuDetails#footer-about-seller')}}" target="_blank">About Seller</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer_content">
                    <a target="_blank" class="footer_heading">
                        <h2>Communities</h2>
                    </a>
                    <ul class="footer_list">
                        <li>
                            <a href="http://facebook.com/eshoppingbd2016" target="_blank">Facebook</a>
                        </li>
                        <li>
                            <a href="{{URL::to('footerMenuDetails#')}}" target="_blank">Google Plus</a>
                        </li>
                        <li>
                            <a href="{{URL::to('footerMenuDetails#')}}" target="_blank">Twitter</a>
                        </li>
                        <li>
                            <a href="{{URL::to('footerMenuDetails#')}}" target="_blank">Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-6">
                <div class="payment_media">
                    <p>We Accept:- Cash on Delivery, bKash, Rocket etc.</p>
                </div>
            </div>
            <div class="col-md-6">
                <form class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" class="form-control no_radius" placeholder="E-mail">
                    </div>
                    <button type="submit" class="btn btn-success no_radius">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>



<div class="copyright-text text-center">
    <p>© 2017 Copyright <a href="http://eshoppingbd.com">eshoppingbd.com</a></p>
</div>
<!--Clsoe Big Footer-->

<script>
    $(document).ready(function(){
        $('#marcentRegistrationForm').validate({
            onkeyup: false,
            rules: {
                full_name: {
                    required: true
                },
                company_name: {
                    required: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                mobile_no: {
                    required: true
                },
                address: {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#merchantLoginForm').validate({
            onkeyup: false,
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    });

    $('.alert').delay(1500).slideUp();

</script>

<!--<div style="height: 300px;"></div>-->
<!-- Owl Carousel CSS-->
{!! HTML::script('public/merchantCorner/assets/js/owl.carousel.min.js') !!}
<!--Opacity & Other IE fix for older browser-->
<!--[if lte IE 8]>
{!! HTML::script('public/merchantCorner/assets/js/ie-opacity-polyfill.js') !!}
<![endif]-->

<!-- Custom JS -->
{!! HTML::script('public/merchantCorner/assets/js/custom.js') !!}
</body>
</html>