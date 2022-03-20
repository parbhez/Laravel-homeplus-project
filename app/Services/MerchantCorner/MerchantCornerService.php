<?php

namespace App\Services\MerchantCorner;

use Lang;
use Session;
use DB;
use Hash;
use App\Http\Helper;
use Mail;

class MerchantCornerService
{
    public static function saveMerchantRegistration($data = null)
    {
        try {
            DB::table('merchants')
                ->insert([
                    'full_name' => $data['full_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'mobile_no' => $data['mobile_no'],
                    'company_name' => $data['company_name'],
                    'address' => $data['address'],
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getActiveCategory()
    {
        return DB::table('categories')
            ->where('status', 1)
            ->get();
    }

    public static function getCategoryWiseSubCategory($categoryId)
    {
        return DB::table('sub_categories')
            ->where('fk_category_id', $categoryId)
            ->where('status', 1)
            ->get();
    }

    public static function getSubCategoryWiseSubCategoryDetails($subCategoryid)
    {
        return DB::table('sub_sub_categories')
            ->where('fk_sub_category_id', $subCategoryid)
            ->where('status', 1)
            ->get();
    }

    /*public static function updateProductCode($data = null)
    {   
        $productForUpId = DB::table('products')
                            ->get();
                            $a =100000;
        foreach($productForUpId as $productForUpIdUp){
            $a++;
        $productId = DB::table('products')
            ->where('product_code',$productForUpIdUp->product_code)
            ->update([
                'product_code'         => $a
            ]);
        }
    }*/

    public static function saveMerchantProduct($data = null)
    {
        $productCode = DB::table('products')->max('product_code');
        $productCode = ($productCode) ? $productCode : 1000;
        $productCode++;
        $subcategoryname = (isset($data['sub_category_name_id'])) ? $data['sub_category_name_id'] : null;
        $subSubcategoryname = (isset($data['sub_sub_category_name_id'])) ? $data['sub_sub_category_name_id'] : null;
        $productSlug = str_replace(' ', '-', $data['product_name_english']);
        try {
            $productId = DB::table('products')
                ->insertGetId([
                    'fk_merchant_id' => $data['merchant_id'],
                    'fk_category_id' => $data['category_name_id'],
                    'fk_sub_category_id' => $subcategoryname,
                    'fk_sub_sub_category_id' => $subSubcategoryname,
                    'product_name_lang1' => $data['product_name_english'],
                    'product_name_lang2' => $data['product_name_bangla'],
                    'details_lang1' => $data['product_details_en'],
                    'details_lang2' => $data['product_details_bn'],
                    'slug' => $productSlug ,
                    'product_code' => $productCode,
                    'refund_policy' => '',
                    'market_price' => $data['product_market_price'],
                    'quantity' => $data['product_quantity'],
                    'discount' => $data['product_discount'],
                    'sale_price' => $data['product_sale_price'],
                    'commission' => $data['commission_percentage'],
                    'placement_type' => 1,
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
            if ($productId) {
                if (isset($data['color_id'])) {
                    for ($i = 0; $i < count($data['color_id']); $i++) {
                        DB::table('product_wise_color')
                            ->insert([
                                'fk_product_id' => $productId,
                                'fk_color_id' => $data['color_id'][$i],
                                'status' => 1,
                                'created_at' => date('Y-m-d h:i:s'),
                                'created_by' => $data['merchant_id'],
                            ]);
                    }
                }
                if (isset($data['size_id'])) {
                    for ($i = 0; $i < count($data['size_id']); $i++) {
                        DB::table('product_wise_size')
                            ->insert([
                                'fk_product_id' => $productId,
                                'fk_size_id' => $data['size_id'][$i],
                                'status' => 1,
                                'created_at' => date('Y-m-d h:i:s'),
                                'created_by' => $data['merchant_id'],
                            ]);
                    }
                }
               $imageType = null;
               $folderPath = '/images/product/' . $data['merchant_id'] . '/';
               if(!file_exists(public_path().$folderPath )){
                	mkdir(public_path().$folderPath , 0755, true);
                    }
                for ($i = 0; $i < count($data['image_title']); $i++) {
                    ($i == 0) ? $imageType = 1 : $imageType = 2;
                   // mkdir(public_path().$folder_path, 0755, true);
                    $fileName = Helper::imageUpload($productId.$i, $data['image'][$i], $folderPath);
                    if ($fileName == 'tooLarge'){
                        return 'tooLarge';
                    }
                    DB::table('product_wise_image')
                        ->insert([
                            'fk_product_id' => $productId,
                            'path' => $data['merchant_id'] . '/' . $fileName,
                            'type' => $imageType,
                            'caption' => $data['image_title'][$i],
                            'status' => 1,
                            'created_at' => date('Y-m-d h:i:s'),
                            'created_by' => $data['merchant_id'],
                        ]);
                }
            }
            return true;
        } catch (\Exception $e) {
            //return $e;
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveMerchantProductEdit($data = null)
    {
        $subcategoryname = (isset($data['sub_category_name_id'])) ? $data['sub_category_name_id'] : null;
        $subSubcategoryname = (isset($data['sub_sub_category_name_id'])) ? $data['sub_sub_category_name_id'] : null;
        try {
            DB::beginTransaction();
            if ($data['product_status'] == 0) { 
                 $productSlug = str_replace(' ', '-', $data['product_name_english']);           
                 DB::table('products')
                    ->where('id', $data['product_id'])
                    ->update([
                        'fk_category_id' => $data['category_name_id'],
                        'fk_sub_category_id' => $subcategoryname,
                        'fk_sub_sub_category_id' => $subSubcategoryname,
                        'product_name_lang1' => isset($data['product_name_english']),
                        'product_name_lang2' => $data['product_name_bangla'],
                        'details_lang1' => $data['product_details_en'],
                        'details_lang2' => $data['product_details_bn'],
                        'slug' => $productSlug,
                        'refund_policy' => '',
                        'market_price' => $data['product_market_price'],
                        'quantity' => $data['product_quantity'],
                        'discount' => $data['product_discount'],
                        'sale_price' => $data['product_sale_price'],
                        'commission' => $data['commission_percentage'],
                        'updated_at' => date('Y-m-d h:i:s'),
                    ]);
                
                self::updateProductsSizeColors($data);
                self::updateProductsImage($data);
            } elseif ($data['product_status'] == 1) {
                DB::table('products')
                    ->where('id', $data['product_id'])
                    ->update([
                        'refund_policy' => $data['refund_policy'],
                        'market_price' => $data['product_market_price'],
                        'quantity' => $data['product_quantity'],
                        'discount' => $data['product_discount'],
                        'sale_price' => $data['product_sale_price'],
                        'updated_at' => date('Y-m-d h:i:s'),
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function updateProductsSizeColors($data = null)
    {
        //===========@@ Start Color Edit Section @@=========
        if (isset($data['color_id'])) {

            $deleteColorArr = array();
            $updateColorArr = array();
            $insertColorArr = array();
            $existscolorArr = array();
            $productWiseColors = DB::table('product_wise_color')
                ->where('fk_product_id', $data['product_id'])
                ->where('status', 1)
                ->get();
            for ($i = 0; $i < count($productWiseColors); $i++) {
                if (in_array($productWiseColors[$i]->fk_color_id, $data['color_id'])) {
                    $updateColorArr[] = array(
                        'id' => $productWiseColors[$i]->id,
                        'fk_product_id' => $productWiseColors[$i]->fk_product_id,
                        'fk_color_id' => $productWiseColors[$i]->fk_color_id,
                    );
                } else {
                    $deleteColorArr[] = array(
                        'id' => $productWiseColors[$i]->id,
                        'fk_product_id' => $productWiseColors[$i]->fk_product_id,
                        'fk_color_id' => $productWiseColors[$i]->fk_color_id,
                    );
                }
            }
            foreach ($updateColorArr as $key => $value) {
                $existscolorArr[] = $value['fk_color_id'];
            }
            $insertColorArr = array_diff($data['color_id'], $existscolorArr);

            foreach ($deleteColorArr as $key => $deleteColor) {
                DB::table('product_wise_color')
                    ->where('id', $deleteColor['id'])
                    ->update([
                        'status' => 0
                    ]);
            }
            foreach ($insertColorArr as $key => $insertColor) {
                DB::table('product_wise_color')
                    ->insert([
                        'fk_product_id' => $data['product_id'],
                        'fk_color_id' => $insertColor,
                        'status' => 1
                    ]);
            }
        }

        //===========@@ End Color Edit Section @@=========

        //===========@@ Start Size Edit Section @@========
        if (isset($data['size_id'])) {

            $deleteSizeArr = array();
            $updateSizeArr = array();
            $insertSizeArr = array();
            $existsSizeArr = array();
            $productWiseSizes = DB::table('product_wise_size')
                ->where('fk_product_id', $data['product_id'])
                ->where('status', 1)
                ->get();
            for ($i = 0; $i < count($productWiseSizes); $i++) {
                if (in_array($productWiseSizes[$i]->fk_size_id, $data['size_id'])) {
                    $updateSizeArr[] = array(
                        'id' => $productWiseSizes[$i]->id,
                        'fk_product_id' => $productWiseSizes[$i]->fk_product_id,
                        'fk_size_id' => $productWiseSizes[$i]->fk_size_id,
                    );
                } else {
                    $deleteSizeArr[] = array(
                        'id' => $productWiseSizes[$i]->id,
                        'fk_product_id' => $productWiseSizes[$i]->fk_product_id,
                        'fk_size_id' => $productWiseSizes[$i]->fk_size_id,
                    );
                }
            }

            foreach ($updateSizeArr as $key => $value) {
                $existsSizeArr[] = $value['fk_size_id'];
            }
            $insertSizeArr = array_diff($data['size_id'], $existsSizeArr);


            foreach ($deleteSizeArr as $key => $deleteSize) {
                DB::table('product_wise_size')
                    ->where('id', $deleteSize['id'])
                    ->update([
                        'status' => 0
                    ]);
            }
            foreach ($insertSizeArr as $key => $insertSize) {
                DB::table('product_wise_size')
                    ->insert([
                        'fk_product_id' => $data['product_id'],
                        'fk_size_id' => $insertSize
                    ]);
            }
        }
        //===========@@ End Size Edit Section @@=========
    }

    public static function updateProductsImage($data = null)
    {
        $folderPath = '/images/product/' . $data['merchant_id'] . '/';
        $productId = $data['product_id'];
        $productImage = self::getProductImageById($productId);
        for ($i = 0; $i < count($data['image_title']); $i++) {
            if ($i > 0) {
                $fileName = Helper::imageUpload($productId.$i, $data['image'][$i], $folderPath);
                DB::table('product_wise_image')
                    ->insert([
                        'fk_product_id' => $productId,
                        'path' => $data['merchant_id'] . '/' . $fileName,
                        'type' => 2,
                        'caption' => $data['image_title'][$i],
                        'status' => 1,
                    ]);
            }
        }
        $imageUpdateFlag = null;
        if (isset($data['image'][0])) {
            $fileName = Helper::imageUpload($productId, $data['image'][0], $folderPath);
            if ($fileName == null) {
                $fileName = $productImage->path;
            } else if ($fileName == 'tooLarge') {
                return 'tooLarge';
            } else {
                $imageUpdateFlag = 1;
            }
        } else {
            $fileName = $productImage->path;
        }

        $status = DB::table('product_wise_image')
            ->where('id', $productImage->id)
            ->update([
                'path' => (isset($data['image'][0])) ? $data['merchant_id'] . '/' . $fileName : $fileName,
                'caption' => $data['image_title'][0],
                'updated_at' => date("Y-m-d h-i-s"),
            ]);
        if ($status) {
            if ($imageUpdateFlag == 1) {
                if (file_exists(public_path('images/product/' . $productImage->path))) {
                    unlink(public_path('images/product/' . $productImage->path));
                }
            }
        }
    }

    public static function getProductImageById($productId = null)
    {
        return DB::table('product_wise_image')
            ->where('fk_product_id', $productId)
            ->where('type', 1)
            ->first();
    }

    public static function getMerchantWiseProduct($id = null)
    {
        $result = DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('products.fk_merchant_id', $id)
            ->where('products.status', 1)
            ->where('pwi.type', 1)
            ->orderBy('products.id', 'DESC')
            ->select(
                'products.id as product_id',
                'products.*',
                'pwi.*'
            )
            ->paginate(12);
        return $result;
    }

    public static function getSubCategoryByCategoryid($categoryId = null, $merchantId = null)
    {
        return $subCategories = DB::table('products')
            ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
            ->join('sub_categories', 'products.fk_sub_category_id', '=', 'sub_categories.id')
            ->where('merchants.id', $merchantId)
            ->where('products.fk_category_id', $categoryId)
            ->where('sub_categories.status', 1)
            ->groupBy('products.fk_sub_category_id')
            ->orderBy('sub_categories.fk_category_id', 'ASC')
            ->get();
    }

    public static function merchantCategoryWiseProduct($data = null)
    {
        if ($data['subCategoryId'] == 0 && $data['startRange'] == 0 && $data['endRange'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
                ->where('products.fk_category_id', $data['categoryId'])
                ->where('product_wise_image.type', 1)
                ->where('products.fk_merchant_id', $data['merchantId'])
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
                ->where('products.fk_merchant_id', $data['merchantId'])
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
                ->where('products.fk_merchant_id', $data['merchantId'])
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
                ->where('products.fk_merchant_id', $data['merchantId'])
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

    public static function getSubSubCategoryBySubCatId($subCategoryId = null, $merchantId = null)
    {
        return DB::table('products')
            ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
            ->join('sub_sub_categories', 'products.fk_sub_sub_category_id', '=', 'sub_sub_categories.id')
            ->where('merchants.id', $merchantId)
            ->where('products.fk_sub_category_id', $subCategoryId)
            ->where('sub_sub_categories.status', 1)
            ->groupBy('products.fk_sub_category_id')
            ->orderBy('sub_sub_categories.fk_sub_category_id', 'ASC')
            ->get();
    }

    public static function getSubCategoryWiseProduct($data = null)
    {
        if ($data['sub_sub_category_id'] == 0 && $data['start_range'] == 0 && $data['end_range'] == 0) {
            $result = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->where('products.fk_sub_category_id', $data['sub_category_id'])
                ->where('products.fk_merchant_id', $data['merchantId'])
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
                ->where('products.fk_merchant_id', $data['merchantId'])
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
                ->where('products.fk_merchant_id', $data['merchantId'])
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
                ->where('products.fk_merchant_id', $data['merchantId'])
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

    public static function getMerchantMenu($id)
    {
        $subCategories = array();
        $subSubCategories = array();
        $result = array();
        if (Session::get('frontend_lang') == 1) {
            $categories = DB::table('products')
                ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                ->join('categories', 'products.fk_category_id', '=', 'categories.id')
                ->select('products.fk_category_id', 'categories.id as category_id', 'categories.*')
                ->where('merchants.id', $id)
                ->where('categories.status', 1)
                ->where('products.status', 1)
                ->groupBy('products.fk_category_id')
                ->get();
            foreach ($categories as $category) {
                $subCategories = DB::table('products')
                    ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                    ->join('sub_categories', 'products.fk_sub_category_id', '=', 'sub_categories.id')
                    ->where('merchants.id', $id)
                    ->where('products.fk_category_id', $category->category_id)
                    ->where('products.status', 1)
                    ->where('sub_categories.status', 1)
                    ->groupBy('products.fk_sub_category_id')
                    ->orderBy('sub_categories.fk_category_id', 'ASC')
                    ->get();
                if (!$subCategories) {
                    $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->category_id] = 'null';
                    break;
                }

                foreach ($subCategories as $subCategory) {
                    $subSubCategories = DB::table('products')
                        ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                        ->join('sub_sub_categories', 'products.fk_sub_sub_category_id', '=', 'sub_sub_categories.id')
                        ->where('merchants.id', $id)
                        ->where('products.fk_sub_category_id', $subCategory->id)
                        ->where('products.status', 1)
                        ->where('sub_sub_categories.status', 1)
                        ->groupBy('products.fk_sub_sub_category_id')
                        ->orderBy('sub_sub_categories.fk_sub_category_id', 'ASC')
                        ->get();
                    if (!$subSubCategories) {
                        $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->category_id][$subCategory->sub_category_name_lang1 . '-' . $subCategory->id] = 'null';
                        break;
                    }
                    foreach ($subSubCategories as $subSubCategory) {
                        $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->category_id][$subCategory->sub_category_name_lang1 . '-' . $subCategory->id][] = $subSubCategory;
                    }
                }
            }
        } else {
            $categories = DB::table('products')
                ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                ->join('categories', 'products.fk_category_id', '=', 'categories.id')
                ->select('products.fk_category_id', 'categories.id as category_id', 'categories.*')
                ->where('merchants.id', $id)
                ->groupBy('products.fk_category_id')
                ->get();
            foreach ($categories as $category) {
                $subCategories = DB::table('products')
                    ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                    ->join('sub_categories', 'products.fk_sub_category_id', '=', 'sub_categories.id')
                    ->where('merchants.id', $id)
                    ->where('products.fk_category_id', $category->category_id)
                    ->where('sub_categories.status', 1)
                    ->groupBy('products.fk_sub_category_id')
                    ->orderBy('sub_categories.fk_category_id', 'ASC')
                    ->get();
                if (!$subCategories) {
                    $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->category_id] = 'null';
                    break;
                }

                foreach ($subCategories as $subCategory) {
                    $subSubCategories = DB::table('products')
                        ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
                        ->join('sub_sub_categories', 'products.fk_sub_sub_category_id', '=', 'sub_sub_categories.id')
                        ->where('merchants.id', $id)
                        ->where('products.fk_sub_category_id', $subCategory->id)
                        ->where('sub_sub_categories.status', 1)
                        ->groupBy('products.fk_sub_sub_category_id')
                        ->orderBy('sub_sub_categories.fk_sub_category_id', 'ASC')
                        ->get();
                    if (!$subSubCategories) {
                        $result[$category->category_name_lang1 . '#' . $category->icon . '#' . $category->category_id][$subCategory->sub_category_name_lang1 . '-' . $subCategory->id] = 'null';
                        break;
                    }
                    foreach ($subSubCategories as $subSubCategory) {
                        $result[$category->category_name_lang2 . '#' . $category->icon . '#' . $category->category_id][$subCategory->sub_category_name_lang2 . '-' . $subCategory->id][] = $subSubCategory;
                    }
                }
            }
        }

        return $result;
    }

    public static function mercentRemoveProductImage($data = null)
    {
        $status = DB::table('product_wise_image')
            ->where('id', $data['image_id'])
            ->delete();
        if ($status) {
            if (file_exists(public_path('images/product/' . $data['image_path']))) {
                unlink(public_path('images/product/' . $data['image_path']));
            }
            return true;
        }
    }

    public static function getDealingStatus($dealingPriodeType)
    {
        $result = new \stdClass;
        $merchantId = Session::get('merchant.id');
        //$merchantId = 10;
        if ($dealingPriodeType == 1) {
            $date = date('Y-m-d');
            $totalPanding = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('approved_date','like',"$date%")
                ->where('status', 1)
                ->count();
            $totalShiftMentProcess = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('updated_at','like',"$date%")
                ->where('status', 2)
                ->count();
            $totalSale = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('updated_at','like',"$date%")
                ->where('status', 3)
                ->count();
            $totalDeny = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('updated_at','like',"$date%")
                ->whereIn('status', ['3','4','5'])
                ->count();
        } elseif ($dealingPriodeType == 2) {
            $totalPanding = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->whereRaw("approved_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)")
                ->where('status', 1)
                ->count();
            $totalShiftMentProcess = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->whereRaw("updated_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)")
                ->where('status', 2)
                ->count();
            $totalSale = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->whereRaw("updated_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)")
                ->where('status', 3)
                ->count();
            $totalDeny = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->whereRaw("updated_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)")
                ->whereIn('status', ['3','4','5'])
                ->count();
        } elseif ($dealingPriodeType == 3) {
            $month = date('Y-m');
            $totalPanding = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('approved_date', 'like', "$month%")
                ->where('status', 1)
                ->count();
            $totalShiftMentProcess = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('updated_at', 'like', "$month%")
                ->where('status', 2)
                ->count();
            $totalSale = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('updated_at', 'like', "$month%")
                ->where('status', 3)
                ->count();
            $totalDeny = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('updated_at', 'like', "$month%")
                ->whereIn('status', ['3','4','5'])
                ->count();
        } elseif ($dealingPriodeType == 4) {
            $totalPanding = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('status', 1)
                ->count();
            $totalShiftMentProcess = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('status', 2)
                ->count();
            $totalSale = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->where('status', 3)
                ->count();
            $totalDeny = DB::table('orders')
                ->where('fk_merchant_id',$merchantId)
                ->whereIn('status', ['3','4','5'])
                ->count();
        }
        $result->totalSale = $totalSale;
        $result->totalShiftMentProcess = $totalShiftMentProcess;
        $result->totalPanding = $totalPanding;
        $result->totalDeny = $totalDeny;
        return $result;
    }

    public static function getProducts()
    {
        return DB::table('products')
            ->select(
                'products.*', 'pwi.path'
            )
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('products.fk_merchant_id', Session::get('merchant.id'))
            ->where('pwi.type', 1)
            ->orderBy('products.id', 'DESC')
            ->get();

    }

    public static function merchantStockStatus($productId = null, $stockstatus = null)
    {
        try{
            DB::table('products')
                ->where('id',$productId)
                ->update([
                    'status' => $stockstatus,
                ]);
            return true;
        }catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getTotalProduct()
    {
        return DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('fk_merchant_id', Session::get('merchant.id'))
            ->where('pwi.type', 1)
            ->orderBy('products.id', 'DESC')
            ->count();
    }

    public static function getSearchProducts($data)
    {
        $result = DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->select(
                'products.*', 'pwi.path'
            )
            ->where('fk_merchant_id', Session::get('merchant.id'))
            ->where('pwi.type', 1)
            ->where(function ($query) use ($data) {
                if (!empty($data['product_type']) && !empty($data['product_name']) && !empty($data['product_code'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name'])
                        ->where('products.product_code', $data['product_code'])
                        ->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_type']) && !empty($data['product_code'])) {
                    $query->where('products.product_code', $data['product_code'])
                        ->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_type']) && !empty($data['product_name'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name'])
                        ->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_code']) && !empty($data['product_name'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name'])
                        ->where('products.product_code', $data['product_code']);
                } elseif (!empty($data['product_type']) || $data['product_type'] == 0) {
                    $query->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_name'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name']);
                } elseif (!empty($data['product_code'])) {
                    $query->where('products.product_code', $data['product_code']);
                }
            })
            ->get();

        return $result;
    }

    public static function getSearchTotalProduct($data)
    {
        $result = DB::table('products')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->select(
                'products.*', 'pwi.path'
            )
            ->where('fk_merchant_id', Session::get('merchant.id'))
            ->where('pwi.type', 1)
            ->where(function ($query) use ($data) {
                if (!empty($data['product_type']) && !empty($data['product_name']) && !empty($data['product_code'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name'])
                        ->where('products.product_code', $data['product_code'])
                        ->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_type']) && !empty($data['product_code'])) {
                    $query->where('products.product_code', $data['product_code'])
                        ->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_type']) && !empty($data['product_name'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name'])
                        ->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_code']) && !empty($data['product_name'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name'])
                        ->where('products.product_code', $data['product_code']);
                } elseif (!empty($data['product_type']) || $data['product_type'] == 0) {
                    $query->where('products.status', $data['product_type']);
                } elseif (!empty($data['product_name'])) {
                    $query->where('products.product_name_lang1', 'like', $data['product_name']);
                } elseif (!empty($data['product_code'])) {
                    $query->where('products.product_code', $data['product_code']);
                }
            })
            ->count();

        return $result;
    }

    public static function getActiveSizes()
    {
        return DB::table('sizes')->where('status', 1)->get();
    }

    public static function getActiveColors()
    {
        return DB::table('colors')->where('status', 1)->get();
    }

    public static function getProductById($productId = null)
    {
        $products = DB::table('products')
            ->select([
                'products.id as product_id',
                'products.status as product_status',
                'products.*',
                'c.id as category_id',
                'c.*',
                'sc.id as sub_category_id',
                'sc.*',
                'ssd.id as sub_sub_category_id',
                'ssd.*',
            ])
            ->leftjoin('categories as c', 'products.fk_category_id', '=', 'c.id')
            ->leftjoin('sub_categories as sc', 'products.fk_sub_category_id', '=', 'sc.id')
            ->leftjoin('sub_sub_categories as ssd', 'products.fk_sub_sub_category_id', '=', 'ssd.id')
            ->where('products.id', $productId)
            ->first();

        $colors = DB::table('product_wise_color')
            ->join('colors', 'product_wise_color.fk_color_id', '=', 'colors.id')
            ->where('fk_product_id', $productId)
            ->where('product_wise_color.status', 1)
            ->get([
                'product_wise_color.id as product_wise_color_id',
                'colors.id as color_id',
                'colors.*'
            ]);

        $images = DB::table('product_wise_image')
            ->where('fk_product_id', $productId)
            ->get();

        $sizes = DB::table('product_wise_size')
            ->join('sizes', 'product_wise_size.fk_size_id', '=', 'sizes.id')
            ->where('fk_product_id', $productId)
            ->where('product_wise_size.status', 1)
            ->get([
                'product_wise_size.id as product_wise_size_id',
                'sizes.id as size_id',
                'sizes.*'
            ]);
        $products->colors = $colors;
        $products->images = $images;
        $products->sizes = $sizes;
        return $products;
    }
// ============= Code by Azim ===============//

//================ Marcent Information Update ===========//

    public static function getMerchantInfoById($id = null)
    {
        return DB::table('merchants')
            ->where('id', $id)
            ->first();
    }

    public static function updateAccountInformation($data = null)
    {
        try {
            DB::table('merchants')
                ->where('id', $data['merchant_id'])
                ->update([
                    'full_name'           => $data['merchant_name'],
                    'mobile_no'           => $data['mobile_no'],
                    'address'             => $data['address'],
                    'bank_ac_holder_name' => $data['bank_ac_holder_name'],
                    'bank_ac_number'      => $data['bank_ac_number'],
                    'bank_name'           => $data['bank_name'],
                    'branch_name'         => $data['branch_name'],
                    'routing_number'      => $data['routing_number'],
                    'web_address'         => $data['website'],
                    'business_type'       => $data['business_type'],
                    'location'            => $data['location']
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $e;
        }
    }
    
    public static function updateEmailAndPass($data = null)
    {
        try {
            $result = DB::table('merchants')
                ->where('id', $data['merchantId'])
                ->update([
                    'password' => bcrypt($data['newPassword']),
                    'updated_at' => date('Y-m-d h:m:s')
                ]);

            return true;

        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveEditMerchantImage($data = null)
    {
        try {
            DB::beginTransaction();
            $folderPath = '/images/merchants/';
            $merchantId = Session::get('merchant.id');
            $merchantDetails = self::getMerchantInfo();
            $imageUpdateFlag = null;
            if (isset($data['image'])) {
                $fileName = Helper::imageUpload($merchantId, $data['image'], $folderPath,100,100);
                if ($fileName == null) {
                    $fileName = $merchantDetails->logo;
                } else if ($fileName == 'tooLarge') {
                    return 'tooLarge';
                } else {
                    $imageUpdateFlag = 1;
                }
            } else {
                $fileName = $merchantDetails->logo;
            }

            $status = DB::table('merchants')
                ->where('id', $merchantDetails->id)
                ->update([
                    'logo' => $fileName,
                    'updated_at' => date("Y-m-d h-i-s"),
                ]);
            if ($status) {
                if ($imageUpdateFlag == 1) {
                    if ($merchantDetails->logo) {
                        if (file_exists(public_path('images/merchants/' . $merchantDetails->logo))) {
                            unlink(public_path('images/merchants/' . $merchantDetails->logo));
                        }
                    }
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getMerchantInfo()
    {
        return DB::table('merchants')
            ->where('id', Session::get('merchant.id'))
            ->first();
    }

    public static function getMerchantSaleAndCancleProduct($serach_priode = null, $serach_content = null)
    {
        $query = DB::table('orders')
            ->join('users', 'orders.fk_user_id', '=', 'users.id')
            ->leftJoin('order_condition as oc', 'orders.fk_order_condition_id', '=', 'oc.id')
            ->join('order_details as od', 'orders.id', '=', 'od.fk_order_id')
            ->join('products', 'od.fk_product_id', '=', 'products.id')
            ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->where('orders.fk_merchant_id', Session::get('merchant.id'))
            ->where('pwi.type', 1)
            ->where('orders.status','>',0);
        if ($serach_priode == 1) {
            $date = date('Y-m-d');
            $query->where('orders.updated_at', 'like', "$date%")
                ->where(function ($query1) use ($serach_content) {
                    if (empty($serach_content)) {
                        return true;
                    }
                    $query1->orWhere('products.product_name_lang1', 'like', "$serach_content%")
                        ->orWhere('products.product_name_lang2', 'like', "$serach_content%")
                        ->orWhere('products.product_code', $serach_content)
                        ->orWhere('orders.invoice_no', $serach_content)
                        ->orWhere('orders.shipping_mobile_no', $serach_content);
                });
        } elseif ($serach_priode == 2) {
            $query->whereRaw("orders.updated_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)")
                ->where(function ($query1) use ($serach_content) {
                    if (empty($serach_content)) {
                        return true;
                    }
                    $query1->orWhere('products.product_name_lang1', 'like', "$serach_content%")
                        ->orWhere('products.product_name_lang2', 'like', "$serach_content%")
                        ->orWhere('products.product_code', $serach_content)
                        ->orWhere('orders.invoice_no', $serach_content)
                        ->orWhere('orders.shipping_mobile_no', $serach_content);
                });
        } elseif ($serach_priode == 3) {
            $month = date('Y-m');
            $query->where('orders.updated_at', 'like', "$month%")
                ->where(function ($query1) use ($serach_content) {
                    if (empty($serach_content)) {
                        return true;
                    }
                    $query1->orWhere('products.product_name_lang1', 'like', "$serach_content%")
                        ->orWhere('products.product_name_lang2', 'like', "$serach_content%")
                        ->orWhere('products.product_code', $serach_content)
                        ->orWhere('orders.invoice_no', $serach_content)
                        ->orWhere('orders.shipping_mobile_no', $serach_content);
                });
        } elseif ($serach_priode == 4) {
            $query->where(function ($query1) use ($serach_content) {
                if (empty($serach_content)) {
                    return true;
                }
                $query1->orWhere('products.product_name_lang1', 'like', "$serach_content%")
                    ->orWhere('products.product_name_lang2', 'like', "$serach_content%")
                    ->orWhere('products.product_code', $serach_content)
                    ->orWhere('orders.invoice_no', $serach_content)
                    ->orWhere('orders.shipping_mobile_no', $serach_content);
            });
        }

        return $query
            ->orderBy('orders.status','ASC')
            ->orderBy('orders.id','DESC')
            ->get([
            'products.id as product_id', 'products.*', 'od.id as order_details_id','users.full_name',
            'oc.*', 'orders.*','orders.id as order_id', 'pwi.*','orders.status as order_status'
        ]);
    }

    public static function getOrderProductDetailsModal($orderDetailId = null)
    {
        return DB::table('orders')
            ->join('users', 'orders.fk_user_id', '=', 'users.id')
            ->leftJoin('order_condition as oc', 'orders.fk_order_condition_id', '=', 'oc.id')
            ->join('order_details as od', 'orders.id', '=', 'od.fk_order_id')
            ->join('products', 'od.fk_product_id', '=', 'products.id')
            ->where('orders.fk_merchant_id', Session::get('merchant.id'))
            ->where('orders.fk_merchant_id', Session::get('merchant.id'))
            ->where('od.id', $orderDetailId)
            ->first([
                'products.id as product_id', 'products.*', 'oc.*', 'orders.*', 'users.full_name'
            ]);
    }

    public static function getOrders()
    {
        $merchantId = Session::get('merchant.id');
        return DB::table('order_master')
            ->join('orders', 'orders.fk_order_master_id', '=', 'order_master.id')
            ->join('merchants', 'orders.fk_merchant_id', '=', 'merchants.id')
            ->join('users', 'users.id', '=', 'orders.fk_user_id')
            ->where('orders.fk_merchant_id', $merchantId)
            ->where('orders.status','>', 0)
            ->orderBy('orders.status','ASC')
            ->orderBy('orders.id','DESC')
            ->get([
                'users.full_name', 'users.email', 'users.id as user_id',
                'orders.id as order_id', 'orders.*', 'merchants.company_name',
                'order_master.master_invoice_no'
            ]);
    }

    public static function merchantApprovedOrders($id)
    {
        $updated_at = date('Y-m-d h:i:s', time());
        try {
            $result = DB::table('orders')
                ->where('id', $id)
                ->update([
                    'updated_at' => $updated_at,
                    'paid' => DB::raw('payable'),
                    'status' => 3
                ]);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function merchantShiftmentOrder($id)
    {
        $updated_at = date('Y-m-d h:i:s');
        try {
            $result = DB::table('orders')
                ->where('id', $id)
                ->update([
                    'status' => 2,
                    'updated_at' => $updated_at,
                ]);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getOrderConditions()
    {
        return DB::table('order_condition as oc')
            ->where('oc.status', 1)
            ->get();
    }

    public static function denyConfirm($data = null)
    {
        $updated_at = date('Y-m-d h:i:s');
        try {
            $result = DB::table('orders')
                ->where('orders.id', $data['orderId'])
                ->update([
                    'status' => 5,
                    'updated_at' => $updated_at,
                    'orders.fk_order_condition_id' => $data['select']
                ]);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

//================ Marcent Information Update ===========//

//======Reset Password========//
    public static function sendNewPassword($data = null)
    {
        $checkEmail = DB::table('merchants')
            ->where('email',$data['email'])
            ->first();
        if(count($checkEmail) > 0){
            $makePassword = substr(str_shuffle('#5Yi@%a7$2J&d6Xw!t#3Ag'), 0, 8);
            try{
                DB::table('merchants')
                    ->where('email',$data['email'])
                    ->update([
                        'password'          => bcrypt($makePassword),
                        'remember_token'    => $data['_token'],
                        'updated_at'        => date('Y-m-d h:m:s')
                    ]);

                Mail::send('frontend.mail.forgotePasswordMailBody', ['newPassword' => $makePassword,'userInformation' => $checkEmail], function($mail) use ($checkEmail){
                $mail->to($checkEmail->email,$checkEmail->full_name)
                ->from('eshopbd248@gmail.com')
                ->subject('Your Password is reset..!');
                });
                return true;
            }catch(\Exception $e){
                $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
                return $err_msg;
            }
        }else{
            return false;
        }

        
    }
}