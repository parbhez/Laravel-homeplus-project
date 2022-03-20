<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Helper;
use App\Services\FrontEnd\HomeService;
use Session;
use DB;
use Hash;

class HomeController extends Controller
{
    protected function getMenuPutSession()
    {
        if (!(Session::has('top_menus'))) {
            $top_menus = HomeService::getMenuForTopNavigation();
            Session::set('top_menus', $top_menus);
        }
        if (!(Session::has('menus'))) {
            $menus = HomeService::getMenu();
            Session::set('menus', $menus);
        }
    }

    public function index()
    {
        Session::forget('menus');
        Session::forget('top_menus');
        $this->getMenuPutSession();
        $topSlider = HomeService::topSlider();
        $selectedProducts = HomeService::getSelectedProductSlider();
        $categoryForLeftRight = HomeService::getAllCategoryForLeftSide();
        // echo "<pre>";
        // print_r($categoryForLeftRight);
        // return 1;
        return view('frontend.index', compact('topSlider', 'categoryForLeftRight', 'selectedProducts'
        ));
    }

    public function categoryWiseProduct($categoryId = null)
    {
        $category = HomeService::getCategoryByid($categoryId);
        $subCategories = HomeService::getSubCategoryByCategoryid($categoryId);
        return view('frontend.categoryWiseProduct', compact('category', 'subCategories'));
    }

    public function categoryWiseProductLoad(Request $request)
    {
        return HomeService::categoryWiseProduct($request->all());
    }


    public function subCategoryWiseProduct($subCategoryId = null)
    {
        $subCategory = HomeService::getSubCategoryBySubCatId($subCategoryId);
        $subSubCategories = HomeService::getSubSubCategoryBySubCatId($subCategoryId);
        return view('frontend.subCategoryWiseProduct', compact('subCategory', 'subSubCategories'));
    }

    public function subCategoryWiseProductLoad(Request $request)
    {
        return HomeService::getSubCategoryWiseProduct($request->all());
    }

    public function subSubCategoryWiseProduct($subSubCategoryId = null)
    {//return $subSubCategoryId;
        $subCategory = HomeService::getSubSubCategoryBySubSubCatId($subSubCategoryId);
        if (count($subCategory) > 0) {
            $subSubCategories = HomeService::getSubSubCategoryBySubCatId($subCategory->sub_category_id);
        }
        return view('frontend.subSubCategoryWiseProduct', compact('subCategory', 'subSubCategories'));
    }

    public function subSubCategoryWiseProductLoad(Request $request)
    {   
        return HomeService::getSubSubCategoryWiseProduct($request->all());
    }

    public function footerMenuDetails()
    {
        return view('frontend.footerMenuDetails');
    }

    public function singleProductView($productId)
    {
        $product = HomeService::singleProductView($productId);
        $relatedProducts = HomeService::relatedProducts($productId);
        $mostSaleProducts = HomeService::mostSaleProducts($productId);
        return view('frontend.singlePageProductView', compact('product', 'relatedProducts','mostSaleProducts'));
    }

    public function serachProduct(Request $request)
    {
        $products = HomeService::serachProduct($request->all());        
        if ($request->search_type == 3) {
            if (count($products) < 1) {
                return redirect()->route('index');
            }
            return redirect()->route('merchantAllProducts', $products->merchant_id);
        } else {
            return view('frontend.searchProduct', compact('products'));
        }
    }

    public function frontendLangChange($langType = null)
    {
        Session::set('frontend_lang', $langType);
        $top_menus = HomeService::getMenuForTopNavigation();
        $menus = HomeService::getMenu();
        Session::set('top_menus', $top_menus);
        Session::set('menus', $menus);

        return response()->json(['success' => true]);
    }

}
