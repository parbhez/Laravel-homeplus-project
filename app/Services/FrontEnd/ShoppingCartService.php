<?php
namespace App\Services\FrontEnd;

use DB;
use Session;
use Lang;
use App\Http\Helper;

class ShoppingCartService
{
    public static function checkProductSizeColorExists($data)
    {
        if (! isset($data['product_size_id']) && !isset($data['product_color_id'])) {
            $products = DB::table('products')
                ->join('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                ->join('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                ->where('products.id',$data['product_id'])
                ->get();
            if (count($products) > 0) {
                return 'both';
            }else{
                if (!isset($data['product_color_id'])) {
                    $products = DB::table('products')
                        ->join('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                        ->where('products.id',$data['product_id'])
                        ->get();
                    if (count($products) > 0) {
                        return 'color';
                    }else{
                        if (!isset($data['product_size_id'])) {
                            $products = DB::table('products')
                            ->join('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                            ->where('products.id',$data['product_id'])
                            ->get();
                            return (count($products) > 0) ? 'size' : '';
                        }
                        
                    }
                } elseif (!isset($data['product_size_id'])) {
                    $products = DB::table('products')
                        ->join('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                        ->where('products.id',$data['product_id'])
                        ->get();
                    if (count($products) > 0) {
                        return 'size';
                    }else{
                        if (!isset($data['product_size_id'])) {
                            $products = DB::table('products')
                                ->join('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                                ->where('products.id',$data['product_id'])
                                ->get();
                            return (count($products) > 0) ? 'color' : '';
                        }
                    }
                }
            }
        }  

    }


    public static function geProductDetails($data)
    {
        $products = [];
        if (isset($data['product_size_id']) && isset($data['product_color_id'])) {
            $products = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->join('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                ->join('colors', 'pwc.fk_color_id', '=', 'colors.id')
                ->join('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                ->join('sizes', 'pws.fk_size_id', '=', 'sizes.id')
                ->where('products.id', $data['product_id'])
                ->where('pws.id', $data['product_size_id'])
                ->where('pwc.id', $data['product_color_id'])
                ->where('pwi.type', 1)
                ->first([
                    'products.id as product_id',
                    'products.*',
                    'pwi.id as product_wise_image_id',
                    'pwi.*',
                    'pws.id as product_wise_size_id',
                    'sizes.*',
                    'pwc.id as product_wise_color_id',
                    'colors.*'
                ]);
        } elseif (isset($data['product_size_id'])) {
            $products = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->leftJoin('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                ->leftJoin('colors', 'pwc.fk_color_id', '=', 'colors.id')
                ->join('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                ->join('sizes', 'pws.fk_size_id', '=', 'sizes.id')
                ->where('products.id', $data['product_id'])
                ->where('pws.id', $data['product_size_id'])
                ->where('pwi.type', 1)
                ->first([
                    'products.id as product_id',
                    'products.*',
                    'pwi.id as product_wise_image_id',
                    'pwi.*',
                    'pws.id as product_wise_size_id',
                    'sizes.*',
                    'pwc.id as product_wise_color_id',
                    'colors.*'
                ]);
        } elseif (isset($data['product_color_id'])) {
            $products = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->join('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                ->join('colors', 'pwc.fk_color_id', '=', 'colors.id')
                ->leftJoin('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                ->leftJoin('sizes', 'pws.fk_size_id', '=', 'sizes.id')
                ->where('products.id', $data['product_id'])
                ->where('pwc.id', $data['product_color_id'])
                ->where('pwi.type', 1)
                ->first([
                    'products.id as product_id',
                    'products.*',
                    'pwi.id as product_wise_image_id',
                    'pwi.*',
                    'pws.id as product_wise_size_id',
                    'sizes.*',
                    'pwc.id as product_wise_color_id',
                    'colors.*'
                ]);
        } else {
            $products = DB::table('products')
                ->join('product_wise_image as pwi', 'products.id', '=', 'pwi.fk_product_id')
                ->leftJoin('product_wise_color as pwc', 'products.id', '=', 'pwc.fk_product_id')
                ->leftJoin('colors', 'pwc.fk_color_id', '=', 'colors.id')
                ->leftJoin('product_wise_size as pws', 'products.id', '=', 'pws.fk_product_id')
                ->leftJoin('sizes', 'pws.fk_size_id', '=', 'sizes.id')
                ->where('products.id', $data['product_id'])
                ->where('pwi.type', 1)
                ->first([
                    'products.id as product_id',
                    'products.*',
                    'pwi.id as product_wise_image_id',
                    'pwi.*',
                    'pws.id as product_wise_size_id',
                    'sizes.*',
                    'pwc.id as product_wise_color_id',
                    'colors.*'
                ]);
        }
        return $products;
    }

    public static function getProductQuantity($productId = null)
    {
        return DB::table('products')
            ->where('id', $productId)
            ->first();
    }

    public static function getMarcentWiseCityCost($cityId = null)
    {
        $merchantArr = [];
        foreach (Session::get('cartInfo') as $cartProduct) {
            $merchantArr[] = $cartProduct->fk_merchant_id;
        }
        $merchantArr = array_unique($merchantArr);
        $result = DB::table('merchant_shipment_info')
            ->where('fk_city_id', $cityId)
            ->whereIn('fk_merchant_id', $merchantArr)
            ->first([
                DB::raw("sum(cost) as cost")
            ]);
        return $result;

    }

    /*public static function saveShoopingCartItem($data = null)
    {
        $invoice_id = DB::table('orders')->max('invoice_no');
        $invoice_id = ($invoice_id) ? $invoice_id : 1000;
        $master_invoice_no = DB::table('order_master')->max('master_invoice_no');
        $master_invoice_no = ($master_invoice_no) ? $master_invoice_no : 1000;
        try {
            DB::beginTransaction();
            $master_invoice_no +=1;
            $orderMasterId = DB::table('order_master')
                ->insertGetId([
                    'master_invoice_no' => $master_invoice_no,
                    'fk_user_id'        => Session::get('frontendUser.id')
                ]);

            $merchantArr = [];
            foreach (Session::get('cartInfo') as $cartProduct) {
                $merchantArr[] = $cartProduct->fk_merchant_id;
            }
            $merchantArr = array_unique($merchantArr);
            foreach ($merchantArr as $merchant) {
                $invoice_id += 1;
                $orderId = DB::table('orders')
                    ->insertGetId([
                        'fk_order_master_id' => $orderMasterId,
                        'fk_merchant_id'     => $merchant,
                        'fk_user_id'         => Session::get('frontendUser.id'),
                        'fk_city_id'         => $data['city_name_id'],
                        'invoice_no'         => $invoice_id,
                        'address'            => $data['address'],
                        'shipping_mobile_no' => $data['mobile_no'],
                        'total_amount'       => 0,
                        'payable'            => 0,
                        'paid'               => 0,
                        'order_date'         => date("y-m-d"),
                        'discount'           => 0,
                        'status'             => 0, //0 = pending, 1 = approved, 2 = shiftment, 3 = complete sale,4=cancel by admin,5=cancel by merchant
                        'created_at'         => date('Y-m-d h:i:s')
                    ]);
                //DB::commit();return;
                $merchantWiseCost = DB::table('cities')
                    ->where('id', $data['city_name_id'])
                    ->first();

                if ($orderId) {
                    foreach (Session::get('cartInfo') as $product) {
                        if ($product->fk_merchant_id == $merchant) {
                            $product_wise_size = (isset($product->product_wise_size_id)) ? $product->product_wise_size_id : null;
                            $product_wise_color = (isset($product->product_wise_color_id)) ? $product->product_wise_color_id : null;
                            DB::table('order_details')
                                ->insert([
                                    'fk_order_id'             => $orderId,
                                    'fk_product_id'           => $product->product_id,
                                    'fk_merchant_id'          => $merchant,
                                    'fk_product_wise_size_id' => $product_wise_size,
                                    'fk_product_wise_color_id'=> $product_wise_color,
                                    'quantity'                => $product->quantity,
                                    'discount'                => $product->quantity * 0,
                                    'sale_price'              => $product->quantity * $product->sale_price,
                                    'purchase_price'          => $product->quantity * $product->market_price,
                                    'vat'                     => 0,
                                    'create_at'               => date('Y-m-d h:i:s')
                                ]);
                        }
                    }
                }
                $result = DB::table('order_details')
                    ->where('fk_order_id', $orderId)
                    ->groupBy('fk_order_id')
                    ->first([
                        DB::raw('SUM(discount) as total_discount'),
                        DB::raw('SUM(sale_price) as total_sale_price'),
                        DB::raw('SUM(vat) as total_vat')
                    ]);
                DB::table('orders')
                    ->where('id', $orderId)
                    ->update([
                        'shipping_cost' => $merchantWiseCost->cost,
                        'total_amount'  => $result->total_sale_price,
                        'payable'       => ($result->total_sale_price + $merchantWiseCost->cost + $result->total_vat) - $result->total_discount,
                        'discount'      => $result->total_discount,
                        'vat'           => $result->total_vat,
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            $err_msg = \Lang::get("mysqlError." . $e->errorInfo[1]);
            return $err_msg;
        }
    }*/

    public static function saveShoopingCartItem($data = null)
    {
        $invoice_id = DB::table('orders')->max('invoice_no');
        $invoice_id = ($invoice_id) ? $invoice_id : 1000;
        $master_invoice_no = DB::table('order_master')->max('master_invoice_no');
        $master_invoice_no = ($master_invoice_no) ? $master_invoice_no : 1000;
        $mobile_no = (strlen($data['mobile_no']) > 10) ? $data['mobile_no'] : Session::get('frontendUser.mobile_no');
        try {
            DB::beginTransaction();
            $master_invoice_no +=1;
            $orderMasterId = DB::table('order_master')
                ->insertGetId([
                    'master_invoice_no' => $master_invoice_no,
                    'fk_user_id'        => Session::get('frontendUser.id')
                ]);
                
                //DB::commit();return;
                $merchantWiseCost = DB::table('cities')
                    ->where('id', $data['city_name_id'])
                    ->first();

                if ($orderMasterId) {
                    foreach (Session::get('cartInfo') as $product) {
                    	$invoice_id += 1;
		                $orderId = DB::table('orders')
		                    ->insertGetId([
		                        'fk_order_master_id' => $orderMasterId,
		                        'fk_merchant_id'     => $product->fk_merchant_id,
		                        'fk_user_id'         => Session::get('frontendUser.id'),
		                        'fk_city_id'         => $data['city_name_id'],
		                        'invoice_no'         => $invoice_id,
		                        'address'            => $data['address'],
		                        'shipping_mobile_no' => $mobile_no,
		                        'shipping_cost'      => $merchantWiseCost->cost,
		                        'total_amount'       => $product->quantity * $product->sale_price,
		                        'payable'            => $product->quantity * $product->sale_price + $merchantWiseCost->cost ,
		                        'paid'               => 0,
		                        'order_date'         => date("y-m-d"),
		                        'discount'           => $product->quantity * 0,
		                        'vat'                => 0,
		                        'status'             => 0, //0 = pending, 1 = approved, 2 = shiftment, 3 = complete sale,4=cancel by admin,5=cancel by merchant
		                        'created_at'         => date('Y-m-d h:i:s')
		                    ]);
                        $product_wise_size = (isset($product->product_wise_size_id)) ? $product->product_wise_size_id : null;
                        $product_wise_color = (isset($product->product_wise_color_id)) ? $product->product_wise_color_id : null;
                        DB::table('order_details')
                            ->insert([
                                'fk_order_id'             => $orderId,
                                'fk_product_id'           => $product->product_id,
                                'fk_merchant_id'          => $product->fk_merchant_id,
                                'fk_product_wise_size_id' => $product_wise_size,
                                'fk_product_wise_color_id'=> $product_wise_color,
                                'quantity'                => $product->quantity,
                                'discount'                => $product->quantity * 0,
                                'sale_price'              => $product->quantity * $product->sale_price,
                                'purchase_price'          => $product->quantity * $product->market_price,
                                'vat'                     => 0,
                                'create_at'               => date('Y-m-d h:i:s')
                            ]);
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

}