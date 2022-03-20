<?php
namespace App\Services\BackEnd;

use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;
use Mail;

class OrderService
{
    public static function getAllOrder()
    {
        return DB::table('orders')
            ->join('users','users.id', '=', 'orders.fk_user_id')
            ->orderBy('orders.status','ASC')
            ->orderBy('orders.id','DESC')
            ->groupBy('orders.id')
            ->get([
                'users.name','users.email', 'users.id as user_id',
                'orders.id as order_id','orders.*'
            ]);
    }

    public static function getOrderDetailsByIdForEdit($id)
    {
        $result = DB::table('orders')
            ->select(
                'users.full_name as user_name',
                'users.mobile_no',
                'users.email',
                'order_details.id as order_details_id',
                'order_details.discount as order_wise_discount',
                'order_details.sale_price',
                'order_details.quantity',
                'order_details.discount as order_details_wise_discount',
                'products.product_name_lang1',
                'products.product_name_lang2',
                'products.product_code',
                'products.id as product_id',
                'products.quantity as available_quantity',
                'products.sale_price as product_price',
                'products.discount as product_wise_discount',
                'product_wise_color.fk_color_id',
                'product_wise_color.id as product_wise_color_id',
                'colors.color_name_lang1',
                'colors.color_name_lang2',
                'product_wise_size.fk_size_id',
                'product_wise_size.id as product_wise_size_id',
                'sizes.size_title_lang1',
                'sizes.size_title_lang2',
                'product_wise_image.path',
                'product_wise_image.type',
                'orders.invoice_no',
                'orders.id as order_id',
                'orders.total_amount',
                'orders.payable',
                'orders.shipping_cost',
                'orders.*',
                'orders.discount as order_wise_discount',
                'cities.city_name_lang1',
                'cities.city_name_lang2'
            )
            ->join('order_details', 'order_details.fk_order_id', '=', 'orders.id')
            ->join('users', 'users.id', '=', 'orders.fk_user_id')
            ->join('cities', 'cities.id', '=', 'orders.fk_city_id')
            ->join('products', 'products.id', '=', 'order_details.fk_product_id')
            ->leftjoin('product_wise_color', 'product_wise_color.id', '=', 'order_details.fk_product_wise_color_id')
            ->leftjoin('colors', 'colors.id', '=', 'product_wise_color.fk_color_id')
            ->leftjoin('product_wise_size', 'product_wise_size.id', '=', 'order_details.fk_product_wise_size_id')
            ->leftjoin('sizes', 'sizes.id', '=', 'product_wise_size.fk_size_id')
            ->leftjoin('product_wise_image', 'product_wise_image.fk_product_id', '=', 'products.id')
            ->orderBy('order_details.fk_product_id', 'ASC')
            ->where('product_wise_image.type', 1)
            ->where('order_details.fk_order_id', '=', $id)
            ->get();
        return $result;
    }

    public static function getAllSizeByProductId($productId)
    {
        $result = DB::table('products')
            ->select(
                'products.id as product_id',
                'product_wise_size.fk_size_id',
                'product_wise_size.id as product_wise_size_id',
                'sizes.size_title_lang1',
                'sizes.size_title_lang2'
            )
            ->leftjoin('product_wise_size', 'product_wise_size.fk_product_id', '=', 'products.id')
            ->leftjoin('sizes', 'product_wise_size.fk_size_id', '=', 'sizes.id')
            ->where('products.id', $productId)
            ->get();
        return $result;
    }

    public static function getAllColorByProductId($productId)
    {
        $result = DB::table('products')
            ->select(
                'products.id as product_id',
                'product_wise_color.fk_color_id',
                'product_wise_color.id as product_wise_color_id',
                'colors.color_name_lang1',
                'colors.color_name_lang2'
            )
            ->leftjoin('product_wise_color', 'product_wise_color.fk_product_id', '=', 'products.id')
            ->leftjoin('colors', 'product_wise_color.fk_color_id', '=', 'colors.id')
            ->where('products.id', $productId)
            ->get();
        return $result;
    }

    public static function approveOrder($orderId)
    {
        try {
            $result = DB::table('orders')
                ->where('id', $orderId)
                ->update([
                    'status'        => 1,
                    'approved_date' => date('Y-m-d h:i:S'),
                    'updated_at' => date('Y-m-d h:i:S'),
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

    public static function orderApproveCustomerMailSend($orderId = null)
    {
        $order = DB::table('orders')
            ->join('order_master','orders.fk_order_master_id','=','order_master.id')
            ->join('users','orders.fk_user_id','=','users.id')
            ->join('merchants','orders.fk_merchant_id','=','merchants.id')
            ->where('orders.id',$orderId)
            ->first([
                'orders.*','orders.address as order_address','order_master.master_invoice_no',
                'merchants.company_name','merchants.email as merchants_email','users.*',
            ]);
        $orderArr = DB::table('order_master as om')
            ->join('orders as o','om.id','=','o.fk_order_master_id')
            ->join('merchants','o.fk_merchant_id','=','merchants.id')
            ->join('order_details as od','o.id','=','od.fk_order_id')
            ->join('products','od.fk_product_id','=','products.id')
            ->where('om.id',$order->fk_order_master_id)
            ->where('o.status',1)
            ->get([
                'om.*','od.*','merchants.*','products.product_name_lang1',
                'o.shipping_cost'
            ]);
            //=========@@ Mail to User or Customer @@ =============
            Mail::send('backend.mail.userMailBody', ['orderArr' => $orderArr,'order'=>$order], function($mail) use ($order){
            $mail->to($order->email,$order->full_name)
                ->from('eshoppingbd24@gmail.com')
                ->subject('Your Recent E-Shopping Order!');
            });
    }

    public static function orderApproveMerchantMailSend($orderId = null)
    {
        $order = DB::table('orders')
            ->join('order_master','orders.fk_order_master_id','=','order_master.id')
            ->join('users','orders.fk_user_id','=','users.id')
            ->join('merchants','orders.fk_merchant_id','=','merchants.id')
            ->where('orders.id',$orderId)
            ->first([
                'orders.*','orders.address as order_address','order_master.master_invoice_no',
                'merchants.company_name','merchants.email as merchants_email','users.*',
            ]);
        $orderArr = DB::table('order_master as om')
            ->join('orders as o','om.id','=','o.fk_order_master_id')
            ->join('merchants','o.fk_merchant_id','=','merchants.id')
            ->join('order_details as od','o.id','=','od.fk_order_id')
            ->join('products','od.fk_product_id','=','products.id')
            ->where('o.id',$orderId)
            ->where('o.status',1)
            ->get([
                'om.*','od.*','merchants.*','products.product_name_lang1',
                'o.shipping_cost'
            ]);
        //=========@@ Mail to User or Customer @@ =============
        Mail::send('backend.mail.merchantMailBody', ['orderArr' => $orderArr,'order'=>$order], function($mail) use ($order){
            $mail->to($order->merchants_email,$order->company_name)
                ->from('eshoppingbd24@gmail.com')
                ->subject('Your Recent E-Shopping Order! Merchant');
        });
    }

    public static function saleConfirm($orderId)
    {
        try {
            $result = DB::table('orders')
                ->where('id', $orderId)
                ->update([
                    'status'        => 3,
                    'updated_at' => date('Y-m-d h:i:S'),
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

    public static function denyOrder($orderId)
    {
        $result = DB::table('orders')
            ->where('id', $orderId)
            ->update([
                'status'      => 4,
                'cancel_date' => date('Y-m-d h:i:S'),
                'updated_at' => date('Y-m-d h:i:S'),
            ]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateEditOrdersInfo($data = null)
    {
        try {
            DB::beginTransaction();
            $orderDetails = DB::table('order_details')
                ->where('id',$data['orderDetailsId'])
                ->first();
            if (count($orderDetails) < 1) {
                return true;
            }else{
                $order = DB::table('orders')->where('id',$orderDetails->fk_order_id)->first();
                $unitPrice = $orderDetails->sale_price / $orderDetails->quantity;
                $unitPurchasePrice = $orderDetails->purchase_price / $orderDetails->quantity;
                DB::table('order_details')
                    ->where('id',$orderDetails->id)
                    ->update([
                        'discount' => 0,
                        'sale_price' => $unitPrice * $data['quantity'],
                        'purchase_price' => $unitPurchasePrice * $data['quantity'],
                        'quantity' => $data['quantity'],
                    ]);
                $details = DB::table('order_details')
                    ->where('fk_order_id',$orderDetails->fk_order_id)
                    ->first([
                        DB::raw("sum(sale_price) as total_amount"),
                    ]);
                $totalAmount = $details->total_amount;
                DB::table('orders')
                    ->where('id',$order->id)
                    ->update([
                        'total_amount' => $totalAmount,
                        'payable' =>  $totalAmount + $order->shipping_cost,
                        'paid' => $totalAmount + $order->shipping_cost,
                    ]);
            }

            DB::commit();  
            return true;             
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
            return $e;
        }
    }

    public static function updateShippingCost($data = null)
    {
        try {
            if ($data['shipping_cost'] != $data['ex_shipping_cost']) {
                $result = DB::table('orders')
                    ->where('id', $data['order_id'])
                    ->update([
                        'shipping_cost' => $data['shipping_cost']
                    ]);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

    public static function deleteOrderDetails($data = null)
    {
        try {
            DB::beginTransaction();
            $orderDetails = DB::table('order_details')
                ->where('id', $data['orderDetailsId'])
                ->first();
            $status = DB::table('order_details')
                ->where('id', $data['orderDetailsId'])
                ->delete();
            if ($status) {
                $order = DB::table('orders')->where('id',$data['order_id'])->first();
                DB::table('orders')
                    ->where('id', $order->id)
                    ->update([
                        'total_amount' => $order->total_amount - ($orderDetails->sale_price * $orderDetails->quantity),
                        'payable' => $order->payable - ($orderDetails->sale_price * $orderDetails->quantity),
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }

}