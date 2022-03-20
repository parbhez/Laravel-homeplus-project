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
    <title>Marcent Corner</title>

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
                    <h2>Seller Corner</h2>
                </div>
            </div>


            <!--Start Search-->
            <div class="col-md-6">
                <div class="marcent_login">

                    <p>
                        <i class="fa fa-phone"></i>
                        Call US to: 01618-206020
                    </p>
                    {!! Form::open(['route'=>'merchantLogin','class'=>'form-inline','id'=>'merchantLoginForm']) !!}
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="{{trans('frontend.email')}}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputName2" name="password" placeholder="{{trans('frontend.password')}}">
                        </div>
                        <button type="submit" class="btn btn-default">{{trans('frontend.signin')}}</button>
                    {!! Form::close() !!}
                    <a href="{{URL::to('merchantForgotPassword')}}" style="font-size: 16px; line-height: 40px;">Forgot Password ?</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Close Header -->


<!--Start Slider & Sign Up -->
<section class="faq_and_signup">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @include('merchantCorner.errors.messages')
            </div>

            <div class="col-md-8">


                <div class="client_faq">
                    <h2>Frequently asked questions</h2>


                    <div class="panel-group" id="accordion" role="tablist">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                       aria-controls="collapseOne">
                                        eShoppingBD.com :
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        eShoppingBD.com বাংলা এবং ইংরেজী ভাষায় একটি পূর্ণাঙ্গ ই-কমার্স ওয়েবসাইট। এখানে সব বয়সের ক্রেতারা নিত্যদিনের প্রয়োজনীয় প্রতিটি পণ্যসামগ্রী যেমন,গ্যাজেট, ইলেকট্রনিক্স, গৃহস্থালি সামগ্রী, চামড়াজাত পণ্য, গহনা, বাচ্চাদের বিভিন্ন সামগ্রী, প্রসাধনী ফ্যাশন ও লাইফস্টাইল পন্য থেকে শুরু করে সবকিছুই অত্যন্ত সুলভ মুল্যে ঘরে বসে কেনা যায়।
                                    </p>
                                    <p>
                                        বাংলাদেশের যেকোনো স্থান থেকে যেকোনো সময়ে ইন্টারনেটের মাধ্যমে অনলাইনে ক্রেতারা তাদের পছন্দনীয় পণ্যের অর্ডার করে এবং ই-শপিংবিডি তার নিজস্ব ব্যবস্থাপনায় সারা বাংলাদেশে ক্রেতাদের ডেলিভারী দিয়ে থাকে ।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-controls="collapseTwo">
                                        About Seller :
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo">
                                <div class="panel-body">
                                <p>
                                    eShoppingBD.com এ যে কোন বিক্রেতা তার যে কোন বৈধ পণ্য খুব সহজেই বিক্রয় করতে পারে। এজন্য একজন বিক্রেতার eShoppingBD.com এ একটি একাউন্ট থাকবে। সেখানে তিনি সহজেই সকল পণ্য আপলো, পণ্য বিক্রয় এবং পেমেন্ট রিসিভ করতে পারে খুব সহজেই।
                                </p>
                                <p>
                                    নতুন সেলার/মার্চেন্ট পার্টনার হওয়ার জন্য যোগাযোগ করুন:
                                    01945 393 889 বা 01618 20 60 20
                                    <br>
                                    যে কোন তথ্য অনুসন্ধান এর জন্য: 01627 444 999
                                    <br>
                                    Email: seller@eshoppingbd.com
                                    <br>
                                    eShoppingBD.com এর কার্যালয়:
                                    House: 01, Road: 10, Block: A, Banarashi Polli, Mirpur-10, Dhaka.
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" aria-controls="collapseThree">
                                        Home Delivery :
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p>
                                        eShoppingBD.com তার  নিজস্ব ব্যবস্তাপনায় দেশের প্রায় সকল জেলায় ক্রেতাদের অর্ডারকৃত পণ্য তাদের কাছে সরাসরি ডেলিভারী দেয়। এক্ষেত্রে eShoppingBD.com এর রয়েছে একটি সুদক্ষ ডেলিভারী/ফুলফিলমেন্ট টিম।
                                    </p>
                                    
                                </div>
                            </div>
                        </div><!-- 
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseFour" aria-controls="headingFour">
                                        ৪.কাস্টমার সাপোর্ট বিভাগঃ
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <p>
                                        ক্রেতাদের অর্ডার গ্রহন ও ডেলিভারী প্রক্রিয়া ব্যবস্থাপনার জন্য ই-শপিংবিডি এর
                                        রয়েছে সক্রিয় কাস্টমার কেয়ার বিভাগ। আমাদের কাস্টমার কেয়ার সার্ভিস সপ্তাহের
                                        সাত দিন নিজস্ব কল সেন্টারের মাধ্যমে সকাল ৯টা থেকে রাত ১১টা পর্যন্ত তাদের
                                        কার্যক্রম পরিচালনা করে যা মার্চেন্ট/ বিক্রেতাদের পন্যের প্রচারে ও প্রসারে সহায়ক
                                        ভুমিকা পালন করে।
                                    </p>
                                </div>
                            </div>
                        </div> -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseFive" aria-controls="headingFive">
                                        Customer Support : 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFive">
                                <div class="panel-body">
                                    <p>
                                    ক্রেতাদের অর্ডার গ্রহন ও ডেলিভারী প্রক্রিয়া ব্যবস্থাপনার জন্য eShoppingBD.com এর রয়েছে সক্রিয় কাস্টমার কেয়ার বিভাগ। আমাদের কাস্টমার কেয়ার সার্ভিস সপ্তাহের সাত দিন নিজস্ব কল সেন্টারের মাধ্যমে সকাল ৯টা থেকে রাত ১১টা পর্যন্ত তাদের কার্যক্রম পরিচালনা করে যা মার্চেন্ট/ বিক্রেতাদের পন্যের প্রচারে ও প্রসারে সহায়ক ভুমিকা পালন করে।

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="marcent_sign_up">
                    <h2>Sign Up Here</h2>
                    {!! Form::open(['route'=>'merchantPage.post','class'=>'','id'=>'marcentRegistrationForm']) !!}
                        <div class="form-group">
                            <label for="name">{{trans('frontend.name')}}</label>
                            <input type="text" class="form-control" id="name" name="full_name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">{{trans('frontend.email')}}</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
                        </div>
                        <div class="form-group">
                            <label for="password">{{trans('frontend.password')}}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{trans('frontend.mobile_no')}}</label>
                            <input type="text" class="form-control" id="phone" name="mobile_no" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="company-name">{{trans('frontend.company_name')}}</label>
                            <input type="text" class="form-control" id="company-name" name="company_name" placeholder="Company Name">
                        </div>
                        <div class="form-group">
                            <label for="address">{{trans('frontend.address')}}</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Your Address"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-default" style="margin-top: 30px;">{{trans('frontend.register')}}</button>
                    {!! Form::close() !!}
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