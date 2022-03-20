<!--Start Menu Menu & Slider-->
<section class="menu_and_slider">
<div class="container">
    <div class="row">
        <!--Start Mega Menu-->
        <div class="col-md-2 col-sm-3 extra-wide">
            <div class="mega_menu">
                <ul>
                    <?php if(Session::has('menus')): ?>
                        <?php foreach(Session::get('menus') as $menuKey=>$menu): ?>
                            <?php
                            $menuNameWithIconAndId = explode('#', $menuKey);
                            $menuName = $menuNameWithIconAndId[0];
                            $categoryName = str_replace(' ','-',$menuName);
                            $menuIcon = $menuNameWithIconAndId[1];
                            $menuId   = $menuNameWithIconAndId[2];
                            ?>
                            <li class="gents_collection">
                                <i class=""><img src="<?php echo e(URL::to('public/images/category/icon')); ?>/<?php echo e($menuIcon); ?>"></i>
                                <a href="<?php echo e(URL::to('category').'/'.$menuId.'/'.$categoryName); ?>">
                                    <?php echo e($menuName); ?>

                                </a>
                                <?php if($menu != 'null'): ?>
                                    <div class="gents_mega_menu">
                                        <div class="row">
                                            <?php $i = 1; ?>
                                            <?php foreach($menu as $subMenuKey=>$subMenu): ?>

                                                <div class="col-md-4 col-sm-4">
                                                    <?php if(($i%3)==0): ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <?php endif; ?>
                                                    <?php
                                                        $subMenuName = explode('-', $subMenuKey);
                                                        $subcategoryName = str_replace(' ','-',$subMenuName[0])
                                                    ?>
                                                    <a href="<?php echo e(URL::to('sub-category').'/'.$subMenuName[1].'/'.$subcategoryName); ?>">
                                                        <h2>
                                                            <?php echo e($subMenuName[0]); ?>

                                                        </h2>
                                                    </a>
                                                    <?php if($subMenu != 'null'): ?>
                                                        <ul>
                                                            <?php foreach($subMenu as $subSubMenu): ?>
                                                                <?php $subSubcategoryName = str_replace(' ','-',$subSubMenu->sub_sub_category_name_lang1) ?>
                                                                <li>
                                                                    <a href="<?php echo e(URL::to('sub-sub-category').'/'.$subSubMenu->id.'/'.$subSubcategoryName); ?>">
                                                                        <?php if(Session::get('frontend_lang') == 1): ?><?php echo e($subSubMenu->sub_sub_category_name_lang1); ?> <?php else: ?> <?php echo e($subSubMenu->sub_sub_category_name_lang2); ?> <?php endif; ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>

                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!--Close Mega Menu-->