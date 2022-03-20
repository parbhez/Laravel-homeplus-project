<style>
    ul li .active{background-color:black;color: white}
</style>
<header class="header">
    <div class="container">
        <div class="row" >
            <!--Start Logo-->
            <div class="col-md-3">
                <a href="{{URL::to('/')}}" class="logo">
                    <img src="{{URL::to('public/merchantCorner/assets/img/logo.png')}}" alt="">
                </a>
            </div>
            <!--Close Logo-->
            <div class="col-md-5">
                <div class="marcent_banner">
                    <h2>{{trans('frontend.mercahnt_dashboard')}}</h2>
                </div>
            </div>
            <!--Start NEW -->
            <div class="col-md-4">
                <ul class="pull-right">
                    <li style="display: inline">
                        <button type="submit" class="btn btn-xs language-select @if(Session::get('frontend_lang') == 1) active @endif" data-status="1">ENG</button>
                        <button type="submit" class="btn btn-xs language-select @if(Session::get('frontend_lang') == 2) active @endif" data-status="2">বাংলা</button>
                    </li>
                </ul>
                <div class="marcent_logo ">
                    <?php $logo = Session::get('merchant.logo'); ?>
                    <img src="{{URL::to('public/images/merchants').'/'.$logo}}" alt="marcent logo">
                </div>
                <div class="manage_marcent_profile">
                    <div class="marcent_username">
                        <h2>
                            {{Session::get('merchant.company_name')}}
                            <i class="caret"></i>
                        </h2>
                        <div class="marcent_username_dropdown">
                            <ul>
                                <li>
                                    <a href="{{URL::to('manageProfile')}}">
                                        {{trans('frontend.manage_profile')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{URL::to('merchantLogout')}}">
                                        {{trans('frontend.signout')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Clsoe NEW -->
        </div>
    </div>
</header>
<!--Close Header -->