<?php
namespace App\Services\BackEnd;

use DB;
use Session;
use Lang;
use App\Http\Helper;

class ProductService
{

    public static function getAllMerchantsProduct(){
        $result = DB::table('products')
            // ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
            ->leftJoin('categories', 'categories.id', '=', 'products.fk_category_id')
            ->leftJoin('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
            ->where('product_wise_image.type',1)
            ->orderBy('products.id','DESC')
            ->orderBy('products.status',0)
            ->get([
                'products.*',
                'categories.category_name_lang1',
                'product_wise_image.path as image_path',
            ]);
        return $result;
    }
    public static function getProductsByMerchantId($merchantId = null)
    {
        $result = DB::table('products')
            ->select([
                'products.*',
                'categories.category_name_lang1',
                'product_wise_image.path as image_path',
            ])
            ->leftJoin('categories', 'categories.id', '=', 'products.fk_category_id')
            ->leftJoin('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
            //->whereIn('products.status', [0,2])
            ->where('products.fk_merchant_id',$merchantId)
            ->where('product_wise_image.type',1)
            ->orderBy('products.id','DESC')
            ->get();
        return $result;
    }

    public static function singelItemProductView($productId = null)
    {
        return DB::table('products')
            ->select([
                'products.id as product_id',
                'products.fk_merchant_id as product_merchant_id',
                'products.*',
                'merchants.company_name',
                'products.status as product_status',
                'categories.category_name_lang1',
                'categories.category_name_lang2',
                'sub_categories.sub_category_name_lang1',
                'sub_categories.sub_category_name_lang2',
                'sub_sub_categories.sub_sub_category_name_lang1',
                'sub_sub_categories.sub_sub_category_name_lang2',
            ])
            ->leftJoin('categories', 'categories.id', '=', 'products.fk_category_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.fk_sub_category_id')
            ->leftJoin('sub_sub_categories', 'sub_sub_categories.id', '=', 'products.fk_sub_sub_category_id')
            ->leftJoin('merchants', 'merchants.id', '=', 'products.fk_merchant_id')
            ->where('products.id', $productId)
            ->first();
    }

    public static function productEditView($productId = null)
    {
        $products = DB::table('products')
            ->select([
                'products.id as product_id',
                'products.*',
                'c.id as category_id',
                'c.*',
                'sc.*',
                'sc.id as sub_category_id',
                'scd.id as sub_sub_category_id',
                'scd.*',
            ])
            ->leftJoin('categories as c', 'products.fk_category_id', '=', 'c.id')
            ->leftJoin('sub_categories as sc', 'products.fk_sub_category_id', '=', 'sc.id')
            ->leftJoin('sub_sub_categories as scd', 'products.fk_sub_sub_category_id', '=', 'scd.id')
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

        /*$images = DB::table('product_wise_image')
                  ->where('fk_product_id',$productId)
                  ->get();*/

        $sizes = DB::table('product_wise_size')
            ->join('sizes', 'product_wise_size.fk_size_id', '=', 'sizes.id')
            ->where('fk_product_id', $productId)
            ->where('product_wise_size.status', 1)
            ->get([
                'product_wise_size.id as product_wise_size_id',
                'sizes.id as size_id',
                'sizes.*'
            ]);

        $images = DB::table('product_wise_image')
            ->join('products', 'product_wise_image.fk_product_id', '=', 'products.id')
            ->where('product_wise_image.fk_product_id', $productId)
            ->where('product_wise_image.status', 1)
            ->get([

                'product_wise_image.*',
            ]);


        $result = array(
            'product' => $products,
            'colors' => $colors,
            'images' => $images,
            'sizes' => $sizes,

        );
        return $result;
    }

    public static function getCategoryWiseSubCategory($categoryId = null)
    {
        $result = DB::table('sub_categories')
            ->where('fk_category_id', $categoryId)
            ->get();
        return $result;
    }

    public static function getSubCategoryWiseSubCategoryDetails($subCategoryId = null)
    {
        $result = DB::table('sub_sub_categories')
            ->where('fk_sub_category_id', $subCategoryId)
            ->get();
        return $result;
    }

    public static function saveProduct($data = null)
    {
        $subcategoryname = (isset($data['sub_category_name_id'])) ? $data['sub_category_name_id'] : null;
        $subSubcategoryname = (isset($data['sub_sub_category_name_id'])) ? $data['sub_sub_category_name_id'] : null;
        $productSlug = str_slug($data['product_name_english']);
        try {
            $productId = DB::table('products')
                ->insertGetId([
                    'fk_category_id' => $data['category_name_id'],
                    'fk_sub_category_id' => $subcategoryname,
                    'fk_sub_sub_category_id' => $subSubcategoryname,
                    'product_name_lang1' => $data['product_name_english'],
                    'product_name_lang2' => $data['product_name_bangla'],
                    'details_lang1' => $data['product_details_en'],
                    'details_lang2' => $data['product_details_bn'],
                    'slug' => $productSlug ,
                    'product_code' => $data['product_code'],
                    'market_price' => $data['product_market_price'],
                    'quantity' => $data['product_quantity'],
                    'discount' => $data['product_discount'],
                    'sale_price' => $data['product_sale_price'],
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
               $folderPath = '/images/product/';
                for ($i = 0; $i < count($data['image_title']); $i++) {
                    ($i == 0) ? $imageType = 1 : $imageType = 2;
                    $fileName = Helper::imageUpload($productId.$i, $data['image'][$i], $folderPath);
                    if ($fileName == 'tooLarge'){
                        return 'tooLarge';
                    }
                    DB::table('product_wise_image')
                        ->insert([
                            'fk_product_id' => $productId,
                            'path' => $fileName,
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
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }
    

    public static function saveEditProductDetails($data = null)
    {
        $subcategoryId = (isset($data['sub_category_name_id'])) ? $data['sub_category_name_id'] : null;
        $subSubcategoryId = (isset($data['sub_sub_category_name_id'])) ? $data['sub_sub_category_name_id'] : null;
        try {
            DB::table('products')
                ->where('id', $data['product_id'])
                ->update([
                    'fk_category_id'            => $data['category_name_id'],
                    'fk_sub_category_id'        => $subcategoryId,
                    'fk_sub_sub_category_id'    => $subSubcategoryId,
                    'placement_type'            => $data['product_placement'],
                    'details_lang1'             => $data['details_lang1'],
                    'details_lang2'             => $data['details_lang2'],
                    'product_name_lang1'        => $data['product_name_lang1'],
                    'product_name_lang2'        => $data['product_name_lang2'],
                    'market_price'              => $data['market_price'],
                    'discount'                  => $data['discount'],
                    'sale_price'                => $data['sale_price'],
                    'quantity'                  => $data['quantity'],
                    'commission'                => $data['commission'],
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveEditProductProperties($data = null)
    {
        try {
            //  DB::beginTransaction();
            //===========@@ Start Color Edit Section @@=========
            $deleteColorArr = array();
            $updateColorArr = array();
            $insertColorArr = array();
            $existscolorArr = array();
            if (isset($data['color_id']) && !empty($data['color_id'])) {
                $productWiseColors = DB::table('product_wise_color')
                    ->where('fk_product_id', $data['product_id'])
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

            $deleteSizeArr = array();
            $updateSizeArr = array();
            $insertSizeArr = array();
            $existsSizeArr = array();
            if (isset($data['size_id']) && !empty($data['size_id'])) {

                $productWiseSizes = DB::table('product_wise_size')
                    ->where('fk_product_id', $data['product_id'])
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
                            'fk_size_id' => $insertSize,
                            'status' => 1
                        ]);
                }
            }

            //===========@@ End Size Edit Section @@=========

            //DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveEditProductImage($data = null)
    {
        try {
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
            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e;
            DB::rollBack();
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getProductImageById($productId = null)
    {
        $result = DB::table('product_wise_image')
            ->where('fk_product_id', $productId)
            ->where('type', 1)
            ->first();
        return $result;
    }

    public static function removeImage($data = null)
    {
        $status = DB::table('product_wise_image')
            ->where('id', $data['image_id'])
            ->delete();
        if ($status) {
            unlink(public_path('images/product/' . $data['image_path']));
            return true;
        }
    }

    public static function productInactive($id = null)
    {
        //return $id;
        try {
            $status = DB::table('products')
                ->where('id', $id)
                ->update([
                    'status' => 3,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }
    public static function denyProduct($id = null)
    {
        try {
            $status = DB::table('products')
                ->where('id', $id)
                ->update([
                    'status' => 2,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function productActive($id = null)
    {
        //return $id;
        try {
            $status = DB::table('products')
                ->where('id', $id)
                ->update([
                    'status' => 1,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    //
}