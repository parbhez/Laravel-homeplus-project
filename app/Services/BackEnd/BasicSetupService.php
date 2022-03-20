<?php
namespace App\Services\BackEnd;

use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;
use Auth;

class BasicSetupService
{

//=======@@ Start Category Section  @@=======

    public static function getCategory()
    {
        $result = DB::table('categories')
            ->orderBy('id', 'DESC')
            ->get();
        return $result;
    }

    public static function getCategoryByid($categoryId)
    {
        $result = DB::table('categories')
            ->where('id', $categoryId)
            ->first();
        return $result;
    }

    public static function saveCategory($data = null)
    {
        try {
            $created_by = Session::get('admin.id');
            DB::beginTransaction();
            $categoryId = DB::table('categories')
                ->insertGetId([
                    'category_name_lang1' => $data['category_name_lang1'],
                    'category_name_lang2' => $data['category_name_lang2'],
                    'is_selected'         => $data['is_selected'],
                    'view_order'          => $data['view_order'],
                    'created_by'          => $created_by,
                    'status'              => 1
                ]);
            if ($categoryId) {
                $fileName1 = Helper::imageUpload($categoryId, $data['featured_image'], '/images/category/featured_image/', 211, 848);
                $fileName2 = Helper::imageUpload($categoryId, $data['icon_image'], '/images/category/icon/', 20, 20);
                $status = DB::table('categories')
                    ->where('id', $categoryId)
                    ->update([
                        'featured_image' => $fileName1,
                        'icon' => $fileName2
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            //return $e;
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveEditCategory($data = null)
    {
        try {
            $updated_by = Session::get('admin.id');
            $imageUpdateFlag1 = null;
            $imageUpdateFlag2 = null;
            $category = self::getCategoryByid($data['category_name_id']);
            if (isset($data['icon_image'])) {
                $fileName1 = Helper::imageUpload($category->id, $data['icon_image'], '/images/category/icon/', 20, 20);
                if ($fileName1 == null) {
                    $fileName1 = $category->icon;
                } else if ($fileName1 == 'tooLarge') {
                    return 'tooLarge';
                } else {
                    $imageUpdateFlag1 = 1;
                }
            } else {
                $fileName1 = $category->icon;
            }

            if (isset($data['featured_image'])) {
                $fileName2 = Helper::imageUpload($category->id, $data['featured_image'], '/images/category/featured_image/', 211, 848);
                if ($fileName2 == null) {
                    $fileName2 = $category->featured_image;
                } else if ($fileName2 == 'tooLarge') {
                    return 'tooLarge';
                } else {
                    $imageUpdateFlag2 = 1;
                }
            } else {
                $fileName2 = $category->featured_image;
            }

            $status = DB::table('categories')
                ->where('id', $data['category_name_id'])
                ->update([
                    'category_name_lang1' => $data['category_name_lang1'],
                    'category_name_lang2' => $data['category_name_lang2'],
                    'view_order'          => $data['view_order'],
                    'is_selected'         => $data['is_selected'],
                    'icon'                => $fileName1,
                    'featured_image'      => $fileName2,
                    'updated_by'          => $updated_by,
                    'updated_at'          => date("Y-m-d h-i-s")
                ]);
            if ($status) {
                if ($imageUpdateFlag1 == 1) {
                    if ($category->icon) {
                        unlink(public_path('images/category/icon/' . $category->icon));
                    }
                }
                if ($imageUpdateFlag2 == 1) {
                    if ($category->featured_image) {
                        unlink(public_path('images/category/featured_image/' . $category->featured_image));
                    }
                }
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            //return $e;
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactiveCategory($id = null)
    {
        try {
            $status = DB::table('categories')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeCategory($id = null)
    {
        try {
            $status = DB::table('categories')
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

//=======@@ End Category Section  @@=======

//=======@@ Start Sub Category Section  @@=======
    public static function getActiveCategory()
    {
        $result = DB::table('categories')
            ->where('status', 1)
            ->get();
        return $result;
    }

    public static function saveSubCategory($data = null)
    {
        try {
            DB::beginTransaction();
            $subCategoryId = DB::table('sub_categories')
                ->insertGetId([
                    'fk_category_id' => $data['category_name_id'],
                    'sub_category_name_lang1' => $data['sub_category_name_lang1'],
                    'sub_category_name_lang2' => $data['sub_category_name_lang2'],
                    'view_order' => $data['view_order'],
                    'status' => 1
                ]);
            if ($subCategoryId && isset($data['sub_category_icon'])) {
                $fileName = Helper::imageUpload($subCategoryId, $data['sub_category_icon'], '/images/subCategory/');
                $status = DB::table('sub_categories')
                    ->where('id', $subCategoryId)
                    ->update(['featured_image' => $fileName]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getSubCategoryByid($subCategoryId = null)
    {
        $result = DB::table('sub_categories as sc')
            ->select([
                'sc.id as id',
                'sc.sub_category_name_lang1',
                'sc.sub_category_name_lang2',
                'sc.view_order',
                'sc.featured_image',
                'sc.status',
                'c.category_name_lang1',
                'c.id as category_id',
            ])
            ->join('categories as c', 'sc.fk_category_id', '=', 'c.id')
            ->where('sc.id', $subCategoryId)
            ->first();
        return $result;
    }

    public static function getSubCategory()
    {
        $result = DB::table('sub_categories as sc')
            ->join('categories as c', 'sc.fk_category_id', '=', 'c.id')
            ->orderBy('sc.id', 'DESC')
            ->get([
                'sc.id as id',
                'sc.sub_category_name_lang1',
                'sc.sub_category_name_lang2',
                'sc.view_order',
                'sc.featured_image',
                'sc.status',
                'c.category_name_lang1',
                'c.id as category_id',
            ]);
        return $result;
    }

    public static function saveEditSubCategory($data = null)
    {
        try {
            $imageUpdateFlag = null;
            $subCategory = self::getSubCategoryByid($data['sub_category_name_id']);
            if (isset($data['icon_image'])) {
                $fileName = Helper::imageUpload($subCategory->id, $data['icon_image'], '/images/subCategory/');
                if ($fileName == null) {
                    $fileName = $subCategory->icon_image;
                } else if ($fileName == 'tooLarge') {
                    return 'tooLarge';
                } else {
                    $imageUpdateFlag = 1;
                }
            } else {
                $fileName = $subCategory->featured_image;
            }

            $status = DB::table('sub_categories')
                ->where('id', $data['sub_category_name_id'])
                ->update([
                    'fk_category_id' => $data['category_name_id'],
                    'sub_category_name_lang1' => $data['sub_category_name_lang1'],
                    'sub_category_name_lang2' => $data['sub_category_name_lang2'],
                    'view_order' => $data['view_order'],
                    'featured_image' => $fileName,
                    'updated_at' => date("Y-m-d h-i-s")
                ]);
            if ($status) {
                if ($imageUpdateFlag == 1) {
                    if ($subCategory->icon) {
                        unlink(public_path('images/subCategory/' . $subCategory->icon));
                    }
                }
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $e;
        }
    }

    public static function inactiveSubCategory($id = null)
    {
        try {
            $status = DB::table('sub_categories')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeSubCategory($id = null)
    {
        try {
            $status = DB::table('sub_categories')
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

//=======@@ End Sub Category Section  @@=======

//=======@@  Start Sub Cetagory Details Section  @@======= SERVICE

    public static function getActiveSubCategory()
    {
        $result = DB::table('sub_categories')
            ->where('status', 1)
            ->get();
        return $result;
    }

    public static function subCategoryDetailsSave($data = null)
    {
        try {
            DB::beginTransaction();
            $created_by = Session::get('admin.id');
            $subCategoryDetailsId = DB::table('sub_sub_categories')
                ->insertGetId([
                    'fk_category_id' => $data['category_name_id'],
                    'fk_sub_category_id' => $data['sub_category_name_id'],
                    'sub_sub_category_name_lang1' => $data['sub_category_details_lng1'],
                    'sub_sub_category_name_lang2' => $data['sub_category_details_lng2'],
                    'created_by' => $created_by,
                    'status' => 1,
                ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getSubCategoryDetails()
    {
        $result = DB::table('sub_sub_categories as scd')
            ->join('sub_categories as sc', 'scd.fk_sub_category_id', '=', 'sc.id')
            ->join('categories as c', 'scd.fk_category_id', '=', 'c.id')
            ->orderBy('scd.id', 'DESC')
            ->get([
                'scd.id',
                'scd.sub_sub_category_name_lang1',
                'scd.sub_sub_category_name_lang2',
                'scd.status',
                'c.category_name_lang1',
                'c.id as category_id',
                'sc.id as sub_category_id',
                'sc.sub_category_name_lang1',
            ]);
        return $result;
    }

    public static function saveEditSubCategoryDetails($data = null)
    {
        try {
            $updated_by = Session::get('admin.id');
            $status = DB::table('sub_sub_categories')
                ->where('id', $data['sub_category_details_id'])
                ->update([
                    'fk_category_id' => $data['category_id'],
                    'fk_sub_category_id' => $data['sub_category_id'],
                    'sub_sub_category_name_lang1' => $data['sub_category_details_lng1'],
                    'sub_sub_category_name_lang2' => $data['sub_category_details_lng2'],
                    'updated_by' => $updated_by,
                    'updated_at' => date("Y-m-d h-i-s"),
                ]);
            if ($status) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactiveSubCategoryDetails($id = null)
    {
        try {
            $status = DB::table('sub_sub_categories')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeSubCategoryDetails($id = null)
    {
        try {
            $status = DB::table('sub_sub_categories')
                ->where('id', $id)
                ->update([
                    'status' => 1,
                ]);
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
        return true;
    }

//=======@@ End Sub Category Details Section  @@=======


//=======@@ Start Color Section  @@=======

    public static function saveColor($data = null)
    {
        try {
            $status = DB::table('colors')
                ->insert([
                    'color_name_lang1' => $data['color_name_lang1'],
                    'color_name_lang2' => $data['color_name_lang2'],
                    'color_code' => $data['color_code'],
                    'status' => 1
                ]);
            if ($status) {
                return true;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getColor()
    {
        $result = DB::table('colors')
            ->where('status', 1)
            ->get();
        return $result;
    }

    public static function saveEditColor($data = null)
    {
        try {
            $updated_by = Session::get('admin.id');
            $status = DB::table('colors')
                ->where('id', $data['color_name_id'])
                ->update([
                    'color_name_lang1' => $data['color_name_lang1'],
                    'color_name_lang2' => $data['color_name_lang2'],
                    'color_code' => $data['color'],
                    'updated_by' => $updated_by,
                    'updated_at' => date("Y-m-d h-i-s"),
                ]);
            if ($status) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactiveColor($id = null)
    {
        try {
            $status = DB::table('colors')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeColor($id = null)
    {
        try {
            $status = DB::table('colors')
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

//=======@@ End Color Section  @@=======

//=======@@ Start Size Section  @@=======
    public static function getSize()
    {
        $result = DB::table('sizes')
            ->orderBy('id', 'DESC')
            ->get();
        return $result;
    }

    public static function saveSize($data = null)
    {
        try {
            DB::beginTransaction();
            $sizeId = DB::table('sizes')
                ->insert([
                    'size_title_lang1' => $data['size_title_lang1'],
                    'size_title_lang2' => $data['size_title_lang2'],
                    'status' => 1
                ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveEditSize($data = null)
    {
        try {
            $status = DB::table('sizes')
                ->where('id', $data['size_id'])
                ->update([
                    'size_title_lang1' => $data['size_title_lang1'],
                    'size_title_lang2' => $data['size_title_lang2'],
                    'updated_at' => date("Y-m-d h-i-s")
                ]);
            if ($status) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactiveSize($id = null)
    {
        try {
            $status = DB::table('sizes')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeSize($id = null)
    {
        try {
            $status = DB::table('sizes')
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
//=======@@ End Size Section  @@=======


//=======@@ Start City Section  @@=======

    public static function saveCity($data = null)
    {
        try {
            $status = DB::table('cities')
                ->insert([
                    'city_name_lang1' => $data['city_name_lang1'],
                    'city_name_lang2' => $data['city_name_lang2'],
                    'cost' => $data['cost'],
                    'status' => 1
                ]);
            if ($status) {
                return true;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getCity()
    {
        $result = DB::table('cities')
            ->orderBy('id', 'DESC')
            ->get();
        return $result;
    }

    public static function saveEditCity($data = null)
    {
        try {
            $status = DB::table('cities')
                ->where('id', $data['city_name_id'])
                ->update([
                    'city_name_lang1' => $data['city_name_lang1'],
                    'city_name_lang2' => $data['city_name_lang2'],
                    'cost' => $data['city_wise_cost']
                ]);
            if ($status) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactiveCity($id = null)
    {
        try {
            $status = DB::table('cities')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeCity($id = null)
    {
        try {
            $status = DB::table('cities')
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
//=======@@ End City Section  @@=======


    //=======@@ Start Income Expense Head Section  @@=======

    public static function saveIncomeExpenseHead($data = null)
    {
        try {
            $status = DB::table('income_expense_head')
                ->insert([
                    'title_lng1' => $data['title_lng1'],
                    'title_lng2' => $data['title_lng2'],
                ]);
            if ($status) {
                return true;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function getIncomeExpenseHead()
    {
        $result = DB::table('income_expense_head')
            ->orderBy('id', 'DESC')
            ->get();
        return $result;
    }

    public static function saveEditIncomeExpenseHead($data = null)
    {
        try {
            $status = DB::table('income_expense_head')
                ->where('id', $data['incomeExpenseHeadId'])
                ->update([
                    'title_lng1' => $data['title_lng1'],
                    'title_lng2' => $data['title_lng2'],
                ]);
            if ($status) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    //=======@@ End Income Expense Head Section  @@=======
}