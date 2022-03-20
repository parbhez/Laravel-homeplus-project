<!--Start Menu Menu & Slider-->
<section class="menu_and_slider">
<div class="container">
    <div class="row">
        <!--Start Mega Menu-->
        <div class="col-md-2 col-sm-3 extra-wide">
            <div class="mega_menu">
                <ul>
                    @if(Session::has('menus'))
                        @foreach(Session::get('menus') as $menuKey=>$menu)
                            <?php
                            $menuNameWithIconAndId = explode('#', $menuKey);
                            $menuName = $menuNameWithIconAndId[0];
                            $categoryName = str_replace(' ','-',$menuName);
                            $menuIcon = $menuNameWithIconAndId[1];
                            $menuId   = $menuNameWithIconAndId[2];
                            ?>
                            <li class="gents_collection">
                                <i class=""><img src="{{URL::to('public/images/category/icon')}}/{{$menuIcon}}"></i>
                                <a href="{{ URL::to('category').'/'.$menuId.'/'.$categoryName}}">
                                    {{$menuName }}
                                </a>
                                @if($menu != 'null')
                                    <div class="gents_mega_menu">
                                        <div class="row">
                                            <?php $i = 1; ?>
                                            @foreach($menu as $subMenuKey=>$subMenu)

                                                <div class="col-md-4 col-sm-4">
                                                    @if(($i%3)==0)
                                                </div>
                                                <div class="col-sm-4">
                                                    @endif
                                                    <?php
                                                        $subMenuName = explode('-', $subMenuKey);
                                                        $subcategoryName = str_replace(' ','-',$subMenuName[0])
                                                    ?>
                                                    <a href="{{ URL::to('sub-category').'/'.$subMenuName[1].'/'.$subcategoryName}}">
                                                        <h2>
                                                            {{$subMenuName[0]}}
                                                        </h2>
                                                    </a>
                                                    @if($subMenu != 'null')
                                                        <ul>
                                                            @foreach($subMenu as $subSubMenu)
                                                                <?php $subSubcategoryName = str_replace(' ','-',$subSubMenu->sub_sub_category_name_lang1) ?>
                                                                <li>
                                                                    <a href="{{ URL::to('sub-sub-category').'/'.$subSubMenu->id.'/'.$subSubcategoryName}}">
                                                                        @if(Session::get('frontend_lang') == 1){{$subSubMenu->sub_sub_category_name_lang1}} @else {{$subSubMenu->sub_sub_category_name_lang2}} @endif
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>

                                            <?php $i++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <!--Close Mega Menu-->