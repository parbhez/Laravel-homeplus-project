@extends('backend.app')
@section('content')

    <ul class="nav nav-tabs" role="tablist">
        <li class="active" role="presentation">
            <a aria-expanded="true" href="#account_update" aria-controls="account_update" role="tab" data-toggle="tab">
                অ্যাকাউন্ট আপডেট
            </a>
        </li>
        <li class="" role="presentation">
            <a aria-expanded="false" href="#change_password" aria-controls="change_password" role="tab"
               data-toggle="tab">
                পাসওয়ার্ড পরিবর্তন
            </a>
        </li>
    </ul>

    <div class="tab-content section">
        @if(isset($merchant))
            <div role="tabpanel" class="tab-pane active" id="account_update">
                <div class="row">
                    <div class="col-md-7 col-md-offset-1">

                        <div class="marcent_profile_update">
                            <h2 class="text text-center"
                                style="background-color: #EEEEEE;border: 1px gray solid;margin-bottom: 20px;">Merchant
                                Information Update</h2>
                            {!!Form::open(array('route'=>'saveMerchantAdminEdit','class'=>'form-horizontal form-wrp adminForm','files'=>true))!!}

                            <div class="form-group">
                                <label for="company-name" class="col-sm-3 control-label">কোম্পানির নাম </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="company-name" name="company_name"
                                           value="{{$merchant->company_name}}">
                                    <input type="hidden" class="form-control" name="merchant_id"
                                           value="{{$merchant->id}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="merchant-name" class="col-sm-3 control-label">যোগাযোগকারীর নাম</label>
                                <div class="col-sm-9">
                                    <input type="text" name="merchant_name" class="form-control" id="merchant-name"
                                           value="{{$merchant->full_name}}" placeholder="যোগাযোগকারীর নাম">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="merchant-name" class="col-sm-3 control-label">কোম্পানির ইমেইল</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="merchant-name"
                                           value="{{$merchant->email}}" placeholder="যোগাযোগকারীর নাম">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile-no" class="col-sm-3 control-label">মোবাইল নম্বর</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mobile-no" name="mobile_no"
                                           value="{{$merchant->mobile_no}}" placeholder="মোবাইল নম্বর">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">ঠিকানা</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" id="address"
                                              placeholder="ঠিকানা">{{$merchant->address}}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="bank" class="col-sm-3 control-label">ব্যাংক অ্যাকাউন্ট হোল্ডার নাম</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="bank_ac_holder_name"
                                           value="{{$merchant->bank_ac_holder_name}}"
                                           placeholder="অ্যাকাউন্ট হোল্ডার নাম">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bank" class="col-sm-3 control-label">ব্যাংক অ্যাকাউন্ট নাম্বার</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="bank_ac_number"
                                           value="{{$merchant->bank_ac_number}}"
                                           placeholder="ব্যাংক অ্যাকাউন্ট নাম্বার">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bank" class="col-sm-3 control-label">ব্যাংক নাম</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="bank_name"
                                           value="{{$merchant->bank_name}}" placeholder="ব্যাংক নাম">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bank" class="col-sm-3 control-label">ব্রাঞ্চ নাম</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="branch_name"
                                           value="{{$merchant->branch_name}}" placeholder="ব্রাঞ্চ নাম">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bank" class="col-sm-3 control-label">রাউটিং নাম্বার</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="routing_number"
                                           value="{{$merchant->routing_number}}" placeholder="রাউটিং নাম্বার">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="website" class="col-sm-3 control-label">ওয়েব সাইট ঠিকানা</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="website" name="website"
                                           value="{{$merchant->web_address}}" placeholder="http://www.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="business-type" class="col-sm-3 control-label">ব্যবসার ধরন</label>
                                <div class="col-sm-9">
                                    <select id="business-type" class="form-control" name="business_type"
                                            style="width: 100%">
                                        <option selected="selected"
                                                value="{{$merchant->business_type}}">{{$merchant->business_type}}</option>
                                        <option value="অডিও / ভিডিও পণ্য ও পরিষেবা">অডিও / ভিডিও পণ্য ও পরিষেবা</option>
                                        <option value="গাড়ি সার্ভিসিং / সিএনজি রূপান্তর">গাড়ি সার্ভিসিং / সিএনজি
                                            রূপান্তর
                                        </option>
                                        <option value="কার">কার</option>
                                        <option value="ক্রেডিট কার্ড">ক্রেডিট কার্ড</option>
                                        <option value="ইলেকট্রনিক্স">ইলেকট্রনিক্স</option>
                                        <option value="ইভেন্ট ও বিনোদন">ইভেন্ট ও বিনোদন</option>
                                        <option value="ফ্যাশন ও লাইফস্টাইল">ফ্যাশন ও লাইফস্টাইল</option>
                                        <option value="খাদ্য তালিকা">খাদ্য তালিকা</option>
                                        <option value="আসবাবপত্র">আসবাবপত্র</option>
                                        <option value="ইন্টারনেট সার্ভিস">ইন্টারনেট সার্ভিস</option>
                                        <option value="ভূমি ও বৈশিষ্ট্য">ভূমি ও বৈশিষ্ট্য</option>
                                        <option value="ল্যাপটপ / পিসি">ল্যাপটপ / পিসি</option>
                                        <option value="মেডিকেল পণ্য ও সেবা">মেডিকেল পণ্য ও সেবা</option>
                                        <option value="মোবাইল সার্ভিস">মোবাইল সার্ভিস</option>
                                        <option value="মোবাইল সেট">মোবাইল সেট</option>
                                        <option value="অন্যান্য">অন্যান্য</option>
                                        <option value="রেস্টুরেন্ট / হোটেল">রেস্টুরেন্ট / হোটেল</option>
                                        <option value="্যুর ও পর্যটন">ট্যুর ও পর্যটন</option>
                                        <option value="প্রশিক্ষণ / কর্মশালা">প্রশিক্ষণ / কর্মশালা</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="location" class="col-sm-3 control-label">অবস্থান</label>
                                <div class="col-sm-9">
                                    <select id="location" class="form-control" name="location" style="width:100%;">
                                        <option selected="selected"
                                                value="{{$merchant->location}}">{{$merchant->location}}</option>
                                        <option value="আগারগাঁও">আগারগাঁও</option>
                                        <option value="আজিমপুর">আজিমপুর</option>
                                        <option value="বাড্ডা">বাড্ডা</option>
                                        <option value="বকশিবাজার">বকশিবাজার</option>
                                        <option value="বনানী">বনানী</option>
                                        <option value="বংশাল">বংশাল</option>
                                        <option value="বারিধারা">বারিধারা</option>
                                        <option value="বাসাবো">বাসাবো</option>
                                        <option value="বুয়েট ক্যাম্পাস">বুয়েট ক্যাম্পাস</option>
                                        <option value="সেনানিবাস">সেনানিবাস</option>
                                        <option value="চকবাজার">চকবাজার</option>
                                        <option value="দক্ষিনখান">দক্ষিনখান</option>
                                        <option value="দয়াগঞ্জ">দয়াগঞ্জ</option>
                                        <option value="ডেমরা">ডেমরা</option>
                                        <option value="ধামরাই">ধামরাই</option>
                                        <option value="ধানমন্ডি">ধানমন্ডি</option>
                                        <option value="দোহার">দোহার</option>
                                        <option value="ঢাবি ক্যাম্পাস">ঢাবি ক্যাম্পাস</option>
                                        <option value="এলিফ্যান্ট রোড">এলিফ্যান্ট রোড</option>
                                        <option value="ফার্মগেট">ফার্মগেট</option>
                                        <option value="গাবতলী">গাবতলী</option>
                                        <option value="গেন্ডারিয়া">গেন্ডারিয়া</option>
                                        <option value="গুলিস্তান">গুলিস্তান</option>
                                        <option value="গুলশান">গুলশান</option>
                                        <option value="যাত্রাবাড়ী">যাত্রাবাড়ী</option>
                                        <option value="জুরাইন">জুরাইন</option>
                                        <option value="কাফরুল">কাফরুল</option>
                                        <option value="কলাবাগান">কলাবাগান</option>
                                        <option value="কমলাপুর">কমলাপুর</option>
                                        <option value="কামরাঙ্গীরচর">কামরাঙ্গীরচর</option>
                                        <option value="কাঁঠালবাগান">কাঁঠালবাগান</option>
                                        <option value="কাওরান বাজার">কাওরান বাজার</option>
                                        <option value="কাজীপাড়া">কাজীপাড়া</option>
                                        <option value="কেরানীগঞ্জ">কেরানীগঞ্জ</option>
                                        <option value="খিলগাঁও">খিলগাঁও</option>
                                        <option value="খিলক্ষেত">খিলক্ষেত</option>
                                        <option value="কোতোয়ালী">কোতোয়ালী</option>
                                        <option value="লালবাগ">লালবাগ</option>
                                        <option value="লালমাটিয়া">লালমাটিয়া</option>
                                        <option value="মগবাজার">মগবাজার</option>
                                        <option value="মালিবাগ">মালিবাগ</option>
                                        <option value="মিরপুর">মিরপুর</option>
                                        <option value="মহাখালী">মহাখালী</option>
                                        <option value="মোহাম্মদপুর">মোহাম্মদপুর</option>
                                        <option value="মতিঝিল">মতিঝিল</option>
                                        <option value="নাখালপাড়া">নাখালপাড়া</option>
                                        <option value="নারিন্দা">নারিন্দা</option>
                                        <option value="নবাবগঞ্জ">নবাবগঞ্জ</option>
                                        <option value="নয়াপল্টনে">নয়াপল্টনে</option>
                                        <option value="ডিওএইচএস-বনানী">ডিওএইচএস-বনানী</option>
                                        <option value="নিউ ইস্কাটন">নিউ ইস্কাটন</option>
                                        <option value="নিউ মার্কেট">নিউ মার্কেট</option>
                                        <option value="নীলক্ষেত">নীলক্ষেত</option>
                                        <option value="ডিওএইচএস-মহাখালী">ডিওএইচএস-মহাখালী</option>
                                        <option value="পল্লবী">পল্লবী</option>
                                        <option value="পোস্তখোলা">পোস্তখোলা</option>
                                        <option value="পুরানা পল্টন">পুরানা পল্টন</option>
                                        <option value="রাজাবাজার">রাজাবাজার</option>
                                        <option value="রাজারবাগ">রাজারবাগ</option>
                                        <option value="রমনা">রমনা</option>
                                        <option value="রামপুরা">রামপুরা</option>
                                        <option value="রায়েরবাজার">রায়েরবাজার</option>
                                        <option value="সবুজবাগ">সবুজবাগ</option>
                                        <option value="সদরঘাট">সদরঘাট</option>
                                        <option value="সাভার">সাভার</option>
                                        <option value="সেগুনবাগিচা">সেগুনবাগিচা</option>
                                        <option value="শাহবাগ">শাহবাগ</option>
                                        <option value="শাজাহানপুর">শাজাহানপুর</option>
                                        <option value="শ্যামপুর">শ্যামপুর</option>
                                        <option value="শান্তিনগর">শান্তিনগর</option>
                                        <option value="শের-ই-বাংলা">শের-ই-বাংলা</option>
                                        <option value="শ্যামলী">শ্যামলী</option>
                                        <option value="সিদ্ধেশ্বরী">সিদ্ধেশ্বরী</option>
                                        <option value="সূত্রাপুর">সূত্রাপুর</option>
                                        <option value="তেজগাঁও">তেজগাঁও</option>
                                        <option value="উত্তরা">উত্তরা</option>
                                        <option value="উত্তরখান">উত্তরখান</option>
                                        <option value="ওয়ারী">ওয়ারী</option>
                                        <option value="আরামবাগ">আরামবাগ</option>
                                        <option value="আশুলিয়া">আশুলিয়া</option>
                                        <option value="বাংলাবাজার">বাংলাবাজার</option>
                                        <option value="বসুন্ধরা">বসুন্ধরা</option>
                                        <option value="ডিইপিজে">ডিইপিজে</option>
                                        <option value="দিলকুশা">দিলকুশা</option>
                                        <option value="ডিওএইচএস-বারিধারা">ডিওএইচএস-বারিধারা</option>
                                        <option value="ইপিজেড">ইপিজেড</option>
                                        <option value="ইস্কাটন">ইস্কাটন</option>
                                        <option value="গ্রীন রোড">ফকিরাপুল</option>
                                        <option value="গ্রীন রোড">গ্রীন রোড</option>
                                        <option value="কাকরাইল">কাকরাইল</option>
                                        <option value="কল্যানপুর">কল্যানপুর</option>
                                        <option value="কোনাবাড়ি">কোনাবাড়ি</option>
                                        <option value="কুড়িল">কুড়িল</option>
                                        <option value="লক্ষ্মী বাজার">লক্ষ্মী বাজার</option>
                                        <option value="মিটফোর্ড">মিটফোর্ড</option>
                                        <option value="মগবাজার">মগবাজার</option>
                                        <option value="নবাবপুর">নবাবপুর</option>
                                        <option value="নিকুঞ্জ">নিকুঞ্জ</option>
                                        <option value="পল্টন">পল্টন</option>
                                        <option value="পান্থপথ">পান্থপথ</option>
                                        <option value="টঙ্গী">টঙ্গী</option>
                                        <option value="গাজীপুর">গাজীপুর</option>
                                        <option value="আদমজী">আদমজী</option>
                                        <option value="ফতুল্লা">ফতুল্লা</option>
                                        <option value="মেঘনাঘাটে">মেঘনাঘাটে</option>
                                        <option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
                                        <option value="রূপগঞ্জ">রূপগঞ্জ</option>
                                        <option value="শ্যামপুর">শ্যামপুর</option>
                                        <option value="সিদ্ধিরগঞ্জ">সিদ্ধিরগঞ্জ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" name="submit" class="btn btn-default">আপডেট করুন</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>

            <div role="tabpanel" class="tab-pane" id="change_password">
                <div class="row" style="min-height: 450px">
                    <div class="col-md-9 col-md-offset-1">
                        <form class="form-horizontal">
                            <div class="marcent_profile_update">
                                <div class="form-group">
                                    <label for="old-password" class="col-sm-3 control-label">Password Change </label>
                                    <div class="col-sm-5">
                                        <input type="hidden" class="form-control" id="merchant_id"
                                               value="{{$merchant->id}}">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <button class="btn btn-default btn-sm" id="btn-password-change">Password
                                            Change
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script type="text/javascript">

        //======@@ Save btn function @@========
        var loading = $('.loading');
        var info_err = $('.info-error');
        var info_suc = $('.info-suc');
        var db_err = $('.db-error');
        var inactive_msg = $('.inactive-msg');
        var active_msg = $('.active-msg');
        var delete_msg = $('.delete-msg');
        var warning_msg = $('.warning-msg');
        var fk_msg = $('.fk-msg');

        $('#btn-password-change').on('click', function (e) {
            e.preventDefault();
            var merchant_id = $('#merchant_id').val();
            var password = $('#password').val();
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });

            $.ajax({
                url: "{{URL::to('merchantAdminPasswordChange')}}",
                type: "GET",
                cache: false,
                dataType: 'json',
                data: {'merchant_id': merchant_id, 'password': password},
                success: function (data) {
                    if (data.success == true) {
                        info_suc.slideDown();
                        info_suc.delay(3000).slideUp(300);
                    }
                    if (data.success == false) {
                        info_err.hide().find('ul').empty();
                        $.each(data.error, function (index, error) {
                            info_err.find('ul').append('<li>' + error + '</li>');
                        });
                        info_err.slideDown();
                        info_err.delay(6000).slideUp(300);
                    }
                    if (data.error == true) {
                        db_err.hide().find('label').empty();
                        db_err.find('label').append(data.status);
                        db_err.slideDown();
                        db_err.delay(5000).slideUp(300);
                    }
                    loading.hide();
                },
                error: function (data) {
                    alert('error occurred! Please Check');
                    loading.hide();
                }
            });
        });


        //Form Image Preview
        //product images upload
        $("#productImage1").click(function () {
            $("#product_img_1").click();
        });
        /*===================================================*/


        function imageReset() {
            $("#applicantImage").val('');
            //$('#uploadPreview').html('<img class="img-thumbnail" src="public/images/applicant-default.png">');
            $('#productImage1').attr('src', 'img/img-upload.png');
        }

        function readImage(file) {

            var reader = new FileReader();
            var image = new Image();

            reader.readAsDataURL(file);
            reader.onload = function (_file) {
                image.src = _file.target.result;              // url.createObjectURL(file);
                image.onload = function () {
                    var w = this.width,
                            h = this.height,
                            t = file.type, // ext only: // file.type.split('/')[1],
                            n = file.name,
                            s = ~~(file.size / 1024);
                    if (s > 800) {
                        $('#imageAlert').text("Image size too large!");
                        imageReset();
                    } else {
                        $('#imageAlert').text(" ");
                        $('#productImage1').attr('src', this.src);
                    }
                };
                image.onerror = function () {
                    imageReset();
                    $('#imageAlert').text("Invalid file type:" + file.type);
                };
            };

        }
        $("#product_img_1").change(function (e) {
            if (this.disabled) {
                imageReset();
                //$('#imageAlert').text("File upload not supported!");
            }

            var F = this.files;
            if (F && F[0])
                for (var i = 0; i < F.length; i++)
                    readImage(F[i]);
        });

    </script>
@endsection