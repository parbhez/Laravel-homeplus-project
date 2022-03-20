<!--Start Header -->
<header class="header">
    <div class="container">
        <div class="row">
            <!--Start Logo-->
            <div class="col-md-3">
                <a href="{{URL::to('/')}}" class="logo">
                    <img src="{{URL::to('public/frontend/assets/img/logo.png')}}" alt="">
                </a>
            </div>
            <!--Close Logo-->
            <!--Start Search-->
            <div class="col-md-9">
                <div class="search_wrapper">
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <div class="search_box">
                                {!! Form::open(['route'=>'serachProduct',]) !!}
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9">
                                            <div class="search_input_box">
                                                <input type="text" name="search_content" placeholder="{{trans('frontend.search_product')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <ul class="select_input_category">
                                                <li style=" float: left;">
                                                    <select name="search_type" id="SearchSelect">
                                                        <option value="1">{{trans('frontend.all')}}</option>
                                                        <option value="2">{{trans('frontend.products')}}</option>
                                                        {{--<option value="3">{{trans('frontend.merchant')}}</option>--}}
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
                                <a class="loadModal" data-toggle="modal" href="#modal" onclick="loadModal('shoppingCartModal')">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div><!--col-md-2 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Close Header -->

<!--Start Top Menu -->
<section class="top_menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline">
                    @if(Session::has('top_menus'))
                        @foreach(Session::get('top_menus') as $viewTopMenu)
                            <?php $categoryName = str_replace(' ','-',$viewTopMenu->category_name_lang1) ?>
                            <li>
                                <a href="{{URL::to('category').'/'.$viewTopMenu->id.'/'.$categoryName}}">
                                    @if(Session::get('frontend_lang') == 1)
                                        {{$viewTopMenu->category_name_lang1}}
                                    @else
                                        {{$viewTopMenu->category_name_lang2}}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Close Top Menu -->