<?php
namespace App\Services\FrontEnd;

use DB, Session, Lang, Auth;

use App\Http\Helper;

class HomeService
{

    public static function getMenuForTopNavigation()
    {
        return DB::table('categories')
            ->where('status', 1)
            ->take(5)
            ->get();
    }

    public static function getMenu()
    {
        $subCategories = array();
        $subSubCategories = array();
        $result = array();
        if (Session::get('frontend_lang') == 1) {
            $categories = DB::table('categories')
                ->where('status', 1)
                ->orderBy('id', 'ASC')
                ->take(13)
                ->get();
            foreach ($categories as $category) {
                $subCategories = DB::table('sub_categories')
                    ->where('fk_category_id', $category->id)
                    ->orderBy('fk_category_id', 'ASC')
                    ->where('status', 1)
                    ->get();
                if (!$subCategories) {
                    $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->id] = 'null';
                    //break;
                }
                foreach ($subCategories as $subCategory) {
                    $subSubCategories = DB::table('sub_sub_categories')
                        ->where('fk_sub_category_id', $subCategory->id)
                        ->where('status', 1)
                        ->get();
                    if (!$subSubCategories) {
                        $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->id][$subCategory->sub_category_name_lang1 . '-' . $subCategory->id] = 'null';
                        //break;
                    }
                    foreach ($subSubCategories as $subSubCategory) {
                        $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->id][$subCategory->sub_category_name_lang1 . '-' . $subCategory->id][] = $subSubCategory;
                    }
                }
            }
            return $result;
        } else {
            $categories = DB::table('categories')
                ->where('status', 1)
                ->orderBy('id', 'ASC')
                ->take(13)
                ->get();
            foreach ($categories as $category) {
                $subCategories = DB::table('sub_categories')
                    ->where('fk_category_id', $category->id)
                    ->orderBy('fk_category_id', 'ASC')
                    ->where('status', 1)
                    ->get();

                if (!$subCategories) {
                    $result[$category->category_name_lang2 . '#' . $category->icon . '#' . $category->id] = 'null';
                    //break;
                }
                foreach ($subCategories as $subCategory) {
                    $subSubCategories = DB::table('sub_sub_categories')
                        ->where('fk_sub_category_id', $subCategory->id)
                        ->where('status', 1)
                        ->get();
                    if (!$subSubCategories) {
                        $result[$category->category_name_lang2 . '#' . $category->icon . '#' . $category->id][$subCategory->sub_category_name_lang2 . '-' . $subCategory->id] = 'null';
                        //break;
                    }
                    foreach ($subSubCategories as $subSubCategory) {
                        $result[$category->category_name_lang2 . '#' . $category->icon . '#' . $category->id][$subCategory->sub_category_name_lang2 . '-' . $subCategory->id][] = $subSubCategory;
                    }
                }
            }
            return $result;
        }
    }

    public static function getAllProduct($categoryId = null,$subCategoryId = null)
    {
        $products = DB::table('products')
            ->join('categories', 'products.fk_category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.fk_sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('sub_sub_categories', 'products.fk_sub_sub_category_id', '=', 'sub_sub_categories.id')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('products.fk_category_id', $categoryId)
            ->where('products.status',1)
            //->where('products.fk_sub_category_id', $subCategoryId)
            ->where('pwi.type', 1)
            ->where('products.placement_type', 3) //product type  1 = normal, 2 = slider, 3 = selected
            ->take(8)
            ->get([
                'products.id as product_id',
                'products.*',
                'categories.*',
                'categories.id as category_id',
                'sub_categories.*',
                'sub_categories.id as sub_category_id',
                'sub_sub_categories.*',
                'sub_sub_categories.id as sub_sub_category_id',
                'pwi.*',
                'pwi.id as product_wise_image_id'
            ]);
        return $products;
    }

    /*public static function getAllSubcategoryForLeftSide()
    {
        $subCategoryIdArr = array();
        $result = array();
        $subCatName = '';
        $subCategory = DB::table('sub_categories')
            ->orderBy('view_order', 'ASC')
            ->take(6)
            ->get();
        foreach ($subCategory as $subCat) {
            $subCategoryIdArr[] = $subCat->id;
        }
        $subSubCategory = DB::table('sub_sub_categories')
            ->whereIn('fk_sub_category_id', $subCategoryIdArr)
            ->take(6)
            ->get();
        foreach ($subCategory as $subCat) {
            $subCatName = (Session::get('frontend_lang') == 1) ? $subCat->sub_category_name_lang1 : $subCat->sub_category_name_lang2;
            foreach ($subSubCategory as $subSubCat) {
                if ($subCat->id == $subSubCat->fk_sub_category_id) {
                    $result['left'][$subCatName . '-' . $subCat->id][] = (Session::get('frontend_lang') == 1) ? $subSubCat->sub_sub_category_name_lang1 . '-' . $subSubCat->id : $subSubCat->sub_sub_category_name_lang2 . '-' . $subSubCat->id;
                    $result['right'][$subCatName . '-' . $subCat->id] = self::getAllProduct($subCat->id);
                }
            }
        }
        return $result;
    }*/

    public static function getAllCategoryForLeftSide()
    {
        $categoryIdArr = array();
        $result = array();
        $subCatName = '';
        $categories = DB::table('categories')
            ->where('is_selected',1)
            ->orderBy('view_order','ASC')
            ->take(6)
            ->get();
        foreach ($categories as $cat) {
            $categoryIdArr[] = $cat->id;
        }
        $subCategories = DB::table('sub_categories')
            ->whereIn('fk_category_id', $categoryIdArr)
            ->orderBy('view_order', 'ASC')
            ->get();
        $flag = 0;
        foreach ($categories as $category) {
            $catName = (Session::get('frontend_lang') == 1) ? $category->category_name_lang1 : $category->category_name_lang2;
            foreach ($subCategories as $SubCat) {
                if ($category->id == $SubCat->fk_category_id) {
                    $flag = 1;
                    $result['left'][$catName . '-' . $category->id][] = (Session::get('frontend_lang') == 1) ? $SubCat->sub_category_name_lang1 . '-' . $SubCat->id : $SubCat->sub_category_name_lang2 . '-' . $SubCat->id;
                    $result['right'][$catName . '-' . $category->id] = self::getAllProduct($category->id,$SubCat->id);
                }
            }
            if ($flag == 0){
                $result['left'][$catName . '-' . $category->id][] = null;
                $result['right'][$catName . '-' . $category->id] = self::getAllProduct($category->id);
            }
            $flag = 0;
        }
        return $result;
    }

    public static function topSlider()
    {
        return DB::table('photo_sliders as ps')
            ->join('categories as c', 'ps.fk_category_id', '=', 'c.id')
            ->leftJoin('sub_categories as sc', 'ps.fk_sub_category_id', '=', 'sc.id')
            ->where('ps.status', 1)
            ->take(5)
            ->get([
                'ps.image_path','ps.fk_sub_category_id',
                'c.id as category_id',
                'sc.id as sub_category_id',
                'c.*','sc.*'
            ]);
    }

    public static function getSelectedProductSlider()
    {
        return DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('pwi.type', 1)
            ->where('products.status', 1)
            ->where('products.placement_type', 2) //product type  1 = normal, 2 = slider, 3 = selected
            ->get([
                'products.id as product_id',
                'pwi.*',
                'products.*',
            ]);
    }

    public static function singleProductView($productId = null)
    {
        $product = DB::table('products')
            ->join('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
            ->leftJoin('product_wise_color', 'products.id', '=', 'product_wise_color.fk_product_id')
            ->leftJoin('colors', 'colors.id', '=', 'product_wise_color.fk_color_id')
            ->leftJoin('product_wise_size', 'products.id', '=', 'product_wise_size.fk_product_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_wise_size.fk_size_id')
            ->where('products.id', $productId)
            ->where('products.status', 1)
            ->first([
                'products.id as product_id',
                'products.*',
                'product_wise_image.*',
                'product_wise_image.id as product_wise_image_id',
                'product_wise_color.*',
                'product_wise_color.id as product_wise_color_id',
                'product_wise_size.*',
                'product_wise_size.id as product_wise_size_id'
            ]);
        if(count($product) < 1){
           return false;
        }else{
             $productColors = self::getAllColorsForSingleProductView($productId);
             $productSizes = self::getAllSizesForSingleProductView($productId);
             $productImages = self::getAllImagesForSingleProductView($productId);
             $merchantInformation = self::getMerchantInformation($productId);
             $merchantTotalProduct = self::getMerchantTotalProduct($merchantInformation->merchantId);
             $product->productSizes = $productSizes;
             $product->productColors = $productColors;
             $product->productImages = $productImages;
             $product->merchantInformation = $merchantInformation;
             $product->merchantTotalProduct = $merchantTotalProduct;
        }
        return $product;
    }

    public static function getAllColorsForSingleProductView($productId = null)
    {
        $getAllColors = DB::table('product_wise_color')
            ->join('colors', 'colors.id', '=', 'product_wise_color.fk_color_id')
            ->where('product_wise_color.fk_product_id', $productId)
            ->get([
                'product_wise_color.id as product_wise_color_id',
                'colors.id as colors_id',
                'colors.*'
            ]);
        return $getAllColors;
    }

    public static function getAllSizesForSingleProductView($productId = null)
    {
        $getAllSizes = DB::table('product_wise_size')
            ->join('sizes', 'sizes.id', '=', 'product_wise_size.fk_size_id')
            ->where('product_wise_size.fk_product_id', $productId)
            ->get([
                'product_wise_size.id as product_wise_size_id',
                'sizes.id as sizes_id',
                'sizes.*'
            ]);
        return $getAllSizes;
    }


    public static function getAllImagesForSingleProductView($productId = null)
    {
        $getAllImages = DB::table('product_wise_image')
            ->where('fk_product_id', $productId)
            ->get();
        return $getAllImages;
    }


    public static function getMerchantInformation($productId = null)
    {
        $getMerchantInfo = DB::table('products')
            ->join('merchants', 'merchants.id', '=', 'products.fk_merchant_id')
            ->where('products.id', $productId)
            ->first([
                'products.fk_merchant_id',
                'merchants.id as merchantId',
                'merchants.company_name',

            ]);
        return $getMerchantInfo;
    }


    public static function getMerchantTotalProduct($merchantId = null)
    {
        return DB::table('products')
            ->where('products.fk_merchant_id', $merchantId)
            ->count();
    }

    public static function relatedProducts($productId = null)
    {
        $product = DB::table('products')
            ->where('id', $productId)
            ->first();
        $qry = DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('products.status',1);
        if (!empty($product->fk_sub_sub_category_id)) {
            $qry->where('fk_sub_sub_category_id',$product->fk_sub_sub_category_id);
        }elseif(!empty($product->fk_sub_category_id)){
            $qry->where('fk_sub_category_id',$product->fk_sub_category_id);
        }else{
            $qry->where('fk_category_id',$product->fk_category_id);
        }
            $qry->groupBy('product_id');
        return $qry->get([
            'products.id as product_id', 'products.*', 'pwi.*'
        ]);
    }

    public static function mostSaleProducts($productId = null)
    {
        $product = DB::table('products')
            ->where('id', $productId)
            ->first();
        return DB::table('orders')
            ->join('order_details as od', 'orders.id', '=', 'od.fk_order_id')
            ->join('products', 'od.fk_product_id', '=', 'products.id')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('products.fk_sub_category_id', $product->fk_sub_category_id)
            ->where('pwi.type', 1)
            ->where('orders.status', 3)
            ->groupBy('od.fk_product_id')
            ->orderby('sale_count', 'DESC')
            ->take(6)
            ->get([
                'products.id as product_id', 'products.*', 'pwi.*',
                DB::raw('count(orders.id) as sale_count')
            ]);
    }


    /*======@@@ End Category Wise Product Section @@=====*/

    public static function getCategoryByid($categoryId = null)
    {
        return DB::table('categories')
            ->where('id', $categoryId)
            ->first();
    }

    public static function getSubCategoryByCategoryid($categoryId = null)
    {
        return DB::table('sub_categories')
            ->where('fk_category_id', $categoryId)
            ->get();
    }

    public static function categoryWiseProduct($data = null)
    {
        if ($data['subCategoryId'] == 0 && $data['startRange'] == 0 && $data['endRange'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
                ->where('products.fk_category_id', $data['categoryId'])
                ->where('product_wise_image.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'product_wise_image.*'
                )
                ->get();
        } elseif ($data['subCategoryId'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
                ->where('products.fk_category_id', $data['categoryId'])
                ->whereBetween('products.sale_price', [$data['endRange'], $data['startRange']])
                ->where('product_wise_image.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'product_wise_image.*'
                )
                ->get();
        } elseif ($data['startRange'] == 0 && $data['endRange'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
                ->where('products.fk_category_id', $data['categoryId'])
                ->where('products.fk_sub_category_id', $data['subCategoryId'])
                ->where('product_wise_image.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'product_wise_image.*'
                )
                ->get();
        } else {
            $result = DB::table('products')
                ->join('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
                ->where('products.fk_category_id', $data['categoryId'])
                ->where('products.fk_sub_category_id', $data['subCategoryId'])
                ->whereBetween('products.sale_price', [$data['endRange'], $data['startRange']])
                ->where('product_wise_image.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'product_wise_image.*'
                )
                ->get();
        }
        return $result;
    }

    /*======@@@ End Category Wise Product Section @@=====*/


    /*======@@@ Start Sub Category Wise Product Section @@=====*/

    public static function getSubCategoryBySubCatId($subCategoryId = null)
    {
        return DB::table('sub_categories')
            ->where('id', $subCategoryId)
            ->first();
    }

    public static function getSubSubCategoryBySubCatId($subCategoryId = null)
    {
        return DB::table('sub_sub_categories')
            ->where('fk_sub_category_id', $subCategoryId)
            ->where('status',1)
            ->get();
    }

    public static function getSubCategoryWiseProduct($data = null)
    {
        if ($data['sub_sub_category_id'] == 0 && $data['start_range'] == 0 && $data['end_range'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('products.fk_sub_category_id', $data['sub_category_id'])
                ->where('pwi.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'pwi.*'
                )
                ->get();
        } elseif ($data['sub_sub_category_id'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('products.fk_sub_category_id', $data['sub_category_id'])
                ->whereBetween('products.sale_price', [$data['end_range'], $data['start_range']])
                ->where('pwi.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'pwi.*'
                )
                ->get();
        } elseif ($data['start_range'] == 0 && $data['end_range'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('products.fk_sub_category_id', $data['sub_category_id'])
                ->where('products.fk_sub_sub_category_id', $data['sub_sub_category_id'])
                ->where('pwi.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'pwi.*'
                )
                ->get();
        } else {
            $result = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('products.fk_sub_category_id', $data['sub_category_id'])
                ->where('products.fk_sub_sub_category_id', $data['sub_sub_category_id'])
                ->whereBetween('products.sale_price', [$data['end_range'], $data['start_range']])
                ->where('pwi.type', 1)
                ->where('products.status', 1)
                ->orderBy('products.id', 'DESC')
                ->select(
                    'products.id as product_id',
                    'products.*',
                    'pwi.*'
                )
                ->get();
        }
        return $result;
    }

    /*======@@@ End Sub Category Wise Product Section @@=====*/


    /*======@@@ Start Sub Sub Category Wise Product Section @@=====*/

    public static function getSubSubCategoryBySubSubCatId($subSubCategoryId = null)
    {   
        return DB::table('sub_sub_categories as ssc')
            ->join('sub_categories as sc', 'ssc.fk_sub_category_id', '=', 'sc.id')
            ->where('ssc.id', $subSubCategoryId)
            ->first([
                'sc.id as sub_category_id', 'sc.*', 'ssc.id as sub_sub_category_id'
            ]);
    }

    public static function getSubSubCategoryWiseProduct($data = null)
    {
        $query = DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('products.fk_sub_category_id', $data['sub_category_id'])
            ->where('pwi.type', 1)
            ->where('products.status', 1);
        if ($data['sub_sub_category_id'] == 0 && $data['start_range'] == 0 && $data['end_range'] == 0) {
        } elseif ($data['sub_sub_category_id'] == 0) {
            $query->whereBetween('products.sale_price', [$data['end_range'], $data['start_range']]);
        } elseif ($data['start_range'] == 0 && $data['end_range'] == 0) {
            $query->where('products.fk_sub_sub_category_id', $data['sub_sub_category_id']);
        } else {
            $query->where('products.fk_sub_sub_category_id', $data['sub_sub_category_id'])
                ->whereBetween('products.sale_price', [$data['end_range'], $data['start_range']]);
        }
        $result = $query->orderBy('products.id', 'DESC')
            ->select(
                'products.id as product_id',
                'products.*',
                'pwi.*'
            )
            ->get();
        return $result;
    }

    public static function serachProduct($data = null)
    {
        $result = [];
        $searchContent = trim($data['search_content']);
        $query = DB::table('products')
            ->where('products.status', 1);
        if ($data['search_type'] == 3 && isset($data['search_type'])) {
            $result = $query->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                ->where('merchants.full_name', 'like', "%$searchContent%")
                ->orWhere('merchants.company_name', 'like', "%$searchContent%")
                ->first(['merchants.id as merchant_id']);
        } elseif (($data['search_type'] == 2 && isset($data['search_type'])) || ($data['search_type'] == 1 && isset($data['search_type']))) {
            $result = $query->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('pwi.type', 1)
                ->where(function ($qry) use ($searchContent) {
                    $qry->where('products.product_name_lang1', 'like', "%$searchContent%")
                        ->orWhere('products.product_name_lang2', 'like', "%$searchContent%")
                        ->orWhere('products.product_code','like', "%$searchContent%");
                })
                ->get(['products.id as product_id', 'products.*', 'pwi.*']);
        } else {
            $result = $query->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('pwi.type', 1)
                ->where('products.product_name_lang1', 'like', "%$searchContent%")
                ->orWhere('products.product_name_lang2', 'like', "%$searchContent%")
                ->orWhere('products.product_code', 'like', "%$searchContent%")
                ->get(['products.id as product_id', 'products.*', 'pwi.*']);
        }
        return $result;
    }

}