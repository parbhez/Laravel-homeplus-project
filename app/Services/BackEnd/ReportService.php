<?php
namespace App\Services\BackEnd;

use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;

class ReportService
{

    public static function getAllMerchant()
    {
        return DB::table('merchants')
            ->orderBy('id', 'ASC')
            ->where('status', 1)
            ->get();
    }

    public static function getMerchantWiseIncomeReport($merchantId = null)
    {
        return DB::table('order_details')
            ->join('orders', 'order_details.fk_order_id', '=', 'orders.id')
            ->join('products', 'order_details.fk_product_id', '=', 'products.id')
            ->join('merchants', 'products.fk_merchant_id', '=', 'merchants.id')
            ->where('products.fk_merchant_id', $merchantId)
            ->where('orders.status', 3)
            ->first([
                'merchants.*',
                DB::raw('SUM(order_details.quantity) as total_quantity'),
                DB::raw('SUM(((products.sale_price * products.commission)/100) * order_details.quantity) as merchant_wise_income')
            ]);
    }

    public static function getMercahntSaleProduct($merchantId = null)
    {
        return DB::table('orders')
            ->join('order_details', 'orders.id','=','order_details.fk_order_id')
            ->join('order_master', 'orders.fk_order_master_id','=','order_master.id')
            ->join('products', 'order_details.fk_product_id', '=', 'products.id')
            ->leftJoin('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
            ->leftJoin('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
            ->leftJoin('sizes', 'pws.fk_size_id', '=', 'sizes.id')
            ->leftJoin('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
            ->leftJoin('colors', 'pwc.fk_color_id', '=', 'colors.id')
            ->where('pwi.type', 1)
            ->where('products.fk_merchant_id', $merchantId)
            ->where('orders.status', 3)
            ->groupBy('orders.id')
            ->get();
    }
    
}
