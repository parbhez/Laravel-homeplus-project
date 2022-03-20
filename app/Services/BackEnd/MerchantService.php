<?php
namespace App\Services\BackEnd;

use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;
use Hash;

class MerchantService
{


//=======@@ Start Brand Section  @@=======

    public static function getMerchant()
    {
        $result = DB::table('merchants')
            ->orderBy('id', 'DESC')
            ->get();
        return $result;
    }

    public static function getMerchantById($merchantId)
    {
        return DB::table('merchants')
            ->where('id',$merchantId)
            ->first();
    }

    public static function approvedMerchant($mercahntId = null)
    {
        try {
            $path = 'public/images/product/' . $mercahntId;
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            DB::table('merchants')
                ->where('id', $mercahntId)
                ->update([
                    'status' => 1,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function inactiveMerchant($mercahntId = null)
    {
        try {
            DB::table('merchants')
                ->where('id', $mercahntId)
                ->update([
                    'status' => 2,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function activeMerchant($mercahntId = null)
    {
        try {
            DB::table('merchants')
                ->where('id', $mercahntId)
                ->update([
                    'status' => 1,
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveMerchantAdminEdit($data = null)
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
            return $err_msg;
        }
    }

    public static function merchantAdminPasswordChange($data = null)
    {
        try {
            DB::table('merchants')
                ->where('id', $data['merchant_id'])
                ->update([
                    'password' => Hash::make($data['password'])
                ]);
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

//=======@@ End Brand Section  @@=======

//=========Start admins ============

    public static function getMerchantProduct($id = null)
    {
        $result = DB::table('products')
            ->select([
                'products.*',
                'merchants.full_name',
                'merchants.company_name',
                'categories.category_name_lang1',
                'sub_categories.sub_category_name_lang1',
                'sub_sub_categories.sub_sub_category_name_lang1',
                'product_wise_image.path as image_path'
            ])
            ->leftjoin('merchants', 'merchants.id', '=', 'products.fk_merchant_id')
            ->leftjoin('categories', 'categories.id', '=', 'products.fk_category_id')
            ->leftjoin('sub_categories', 'sub_categories.id', '=', 'products.fk_sub_category_id')
            ->leftjoin('sub_sub_categories', 'sub_sub_categories.id', '=', 'products.fk_sub_sub_category_id')
            ->leftjoin('product_wise_image', 'products.id', '=', 'product_wise_image.fk_product_id')
            ->where('products.fk_merchant_id', $id)
            //->whereIn('products.status', [1,3])
            ->where('product_wise_image.type', 1)
            ->orderBy('products.id','DESC')
            ->get();
        return $result;
    }

    
    public static function saveAdmin($data = null)
    {
        try {
            DB::beginTransaction();
            $data['date_time'] = date("Y-m-d H:i:s");
            $userId = DB::table('admins')
                ->insertGetId([
                    'full_name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'remember_token' => $data['_token'],
                    'status' => 1


                ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function saveEditAdmin($data = null)
    {
        try {
            $status = DB::table('admins')
                ->where('id', $data['admin_id'])
                ->update([
                    'full_name' => $data['name'],
                    'email' => $data['email'],
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

    public static function inactiveAdmin($id = null)
    {
        try {
            $status = DB::table('admins')
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

    public static function activeAdmin($id = null)
    {
        try {
            $status = DB::table('admins')
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

}
