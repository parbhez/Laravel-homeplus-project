
        <!--Start Big Footer-->
        <section class="big_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-7">


                        <div class="footer_content">
                            <a href="" target="_blank">
                                <h2>আজকেরডিল</h2>
                            </a>
                            <ul class="list-inline">
                                <li>
                                    <a href="" target="_blank">আমাদের ঠিকানা</a>
                                </li>
                                <li>
                                    <a href="" target="_blank">অর্ডার দেয়ার নিয়ম</a>
                                </li>
                                <li>
                                    <a href="" target="_blank">সাইট ম্যাপ</a>
                                </li>
                            </ul>
                        </div>


                        <div class="footer_content">
                            <a href="" target="_blank">
                                <h2>পেমেন্ট</h2>
                            </a>
                            <ul class="list-inline">
                                <li>
                                    <a href="" target="_blank">পণ্য পরিবর্তন প্রক্রিয়া</a>
                                </li>
                                <li>
                                    <a href="" target="_blank">রিফান্ড পলিসি</a>
                                </li>
                            </ul>
                        </div>



                        <div class="footer_content">
                            <a href="" target="_blank">
                                <h2>পেমেন্ট মাধ্যম</h2>
                            </a>
                            <ul class="list-inline">
                                <li>
                                    <a href="" target="_blank">
                                        <img src="{{URL::to('public/images/payment/COD.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="" target="_blank">
                                        <img src="{{URL::to('public/images/payment/bKash.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="" target="_blank">
                                        <img src="{{URL::to('public/images/payment/BDBL.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="" target="_blank">
                                        <img src="{{URL::to('public/images/payment/Mastercard.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="" target="_blank">
                                        <img src="{{URL::to('public/images/payment/Visa.png')}}" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="copyright">
                            <p>কপিরাইট-আজকেরডিল ডট কম লিমিটেড ২০১৬</p>
                        </div>

                    </div>


                    <br class="hidden-lg hidden-md">
                    <br class="hidden-lg hidden-md">


                    <div class="col-md-4 col-md-offset-1">
                        <div class="footer_right">
                            <h2>নিউজলেটার</h2>
                            <p>
                                প্রতিদিন ১০০০ এর বেশি পণ্য যুক্ত হচ্ছে। আজকের ডিল ডট কম-এ।
                                আমাদের নতুন পণ্যের আপডেট পেতে এখনই সাবস্ক্রাইব করুন।
                            </p>



                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control no_radius" placeholder="E-mail">
                                </div>
                                <button type="submit" class="btn btn-default no_radius">সাবস্ক্রাইব</button>
                            </form>
                            <br>

                            <ul class="list-inline">
                                <li>
                                    <i class="fa fa-question-circle"></i>
                                    <a href="" target="_blank">প্রশ্ন</a>
                                </li>
                                <li>
                                    <i class="fa fa-android"></i>
                                    <a href="" target="_blank">মতামত</a>
                                </li>
                                <li>
                                    <i class="fa fa-xing"></i>
                                    <a href="" target="_blank">অভিযোগ</a>
                                </li>
                            </ul>

                            <br>

                            <div class="contact_info">
                                <p>Phone:<strong>01821-569874</strong></p>
                                <p>E-mail:<strong>eshopping@gmail.com , eshopping@gmail.com</strong></p>
                                <p>Inbox:
                                    <strong>
                                        <a href="" target="_blank">
                                            www.facebook.com/ehopping
                                        </a>
                                    </strong>
                                </p>
                            </div>

                            <div class="footer_social_link">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--Clsoe Big Footer-->

    {{ HTML::script('public/assets/js/jQuery v1.12.4.js') }}
    {{ HTML::script('public/assets/js/demo-files/owl.carousel.min.js') }}
    {{ HTML::script('public/assets/js/bootstrap.min.js') }}
    {{ HTML::script('public/assets/js/demo-files/custom.js') }}

        <!-- jQuery -->
        <script src="js/jQuery v1.12.4.js"></script>
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!--jQuery UI-->
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <!-- Owl Carousel CSS-->
        <script src="js/"></script>
        <!--Opacity & Other IE fix for older browser-->
        <!--[if lte IE 8]>
                <script type="text/javascript" src="js/ie-opacity-polyfill.js"></script>
        <![endif]-->

        <!-- Custom JS -->
        

    <script type="text/javascript">
      $(".language-select").on('click',function(e){
         e.preventDefault();
         var langType = $(this).data("status");
         $.ajax({
            url: "{{URL::to('frontendLangChange')}}/"+langType,
            type: 'GET',
            dataType : 'json',
            success: function(data){
               if (data.success == true) {
                  location.reload();
               }
            }
          });
      });
  </script>
       
    </body>
</html>