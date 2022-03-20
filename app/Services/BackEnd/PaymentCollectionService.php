<?php
namespace App\Services\BackEnd;
use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;

class PaymentCollectionService{
	public static function getOrdersForPayment(){
		$result= DB::table('orders')
					->select(
							'users.mobile_no',
		 					'orders.invoice_no',
		 					'orders.discount',
		 					'orders.payable',
		 					'orders.discount',
		 					'orders.total_amount',
		 					'orders.payable',
		 					'orders.paid',
		 					'orders.shipping_cost',
		 					'orders.id as order_id',
		 					'order_wise_shipping.mobile_no as shipping_mobile_no',
		 					'cities.city_name_lng1',
		 					'cities.city_name_lng2'
							)
					->join ('users','users.id','=','orders.fk_user_id')
					->leftjoin('order_wise_shipping','order_wise_shipping.fk_order_id','=','orders.id')
					->leftjoin('cities','cities.id','=','order_wise_shipping.fk_city_id')
					->where('orders.status',2)
					->orWhere('orders.status',3)
					->orWhere('orders.status',4)
				    ->get();
		return $result;

	}

	public static function savePayment($data){

		try{

			$have_to_given_amount=($data['payable'] + $data['shippingCost'])-$data['paid'];
			if($data['now_pay']!=null && $data['now_pay']<=$have_to_given_amount){
				$now_total_paid_amount=$data['paid']+$data['now_pay'];
				$data['updated_at'] = date("Y-m-d h:m:s");
				$data['payment_date'] = date("Y-m-d");
				$result = DB::table('orders')
					  ->where('id',$data['orderId'])
					  ->update([
							'paid'  	 => $now_total_paid_amount,
							'updated_at' => $data['updated_at'],
							'payment_date' => $data['payment_date']
						]);	
				return true;
			}
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}

	public static function savePaymentByCheckBox($data){

		try{
			$have_to_given_amount=$data['payable']-$data['paid'];
			if($data['now_pay']!=null && $data['now_pay']<=$have_to_given_amount){
				$now_total_paid_amount=$data['paid']+$data['now_pay'];
				$data['updated_at'] = date("Y-m-d h:m:s");
				$status = DB::table('orders')
					  ->where('id',$data['orderId'])
					  ->update([
							'paid'  	 => $now_total_paid_amount,
							'updated_at' => $data['updated_at']
						]);	
				if ($status) {
					return true;
				}else{
					return false;
				}
			}
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}


	public static function viewAllInvoiceAjax($data){
		
		$result= DB::table('orders')
					->select(
							'users.full_name as user_name',
							'users.mobile_no',
		 					'orders.invoice_no',
		 					'orders.total_amount',
		 					'orders.shipping_cost',
		 					'orders.discount',
		 					'orders.payable',
		 					'orders.paid',
		 					'orders.payment_date',
		 					'orders.order_date',
		 					'orders.id as order_id'
							)
					->join('users','users.id','=','orders.fk_user_id')
					->whereBetween('orders.payment_date',array($data['start_date'], $data['end_date']))
					->where('orders.status', 2)
					->get();
		return $result;

	}

	public static function printInvoiceByOrderId($id){

		$result = DB::table('orders')
					->select(
							'users.full_name as user_name',
							'users.mobile_no',
							'users.email',
							'order_details.discount as order_wise_discount',
		 					'order_details.price',
		 					'order_details.quantity',
		 					'order_details.discount as order_details_wise_discount',
							'products.product_name_lng1',
		 					'products.discount as product_wise_discount',
		 					'colors.color_name_lng1',
		 					'sizes.size_title_lng1',
		 					'orders.invoice_no',
		 					'orders.id as order_id',
		 					'orders.total_amount',
		 					'orders.payable',
		 					'orders.paid',
		 					'orders.shipping_cost',
		 					'orders.payment_date',
		 					'orders.discount as order_wise_discount',
		 					'order_wise_shipping.address',
		 					'order_wise_shipping.mobile_no as shipping_mobile_no',
		 					'cities.city_name_lng1'	 					
							)
					->join('order_details','order_details.fk_order_id','=','orders.id')
					->join ('users','users.id','=','orders.fk_user_id')
					->join('products','products.id','=','order_details.fk_product_id')
					->leftjoin('order_wise_shipping','order_wise_shipping.fk_order_id','=','orders.id')
					->leftjoin('cities','cities.id','=','order_wise_shipping.fk_city_id')
					->leftjoin('product_wise_color','product_wise_color.id','=','order_details.fk_product_wise_color_id')
					->leftjoin('colors','colors.id','=','product_wise_color.fk_color_id')
					->leftjoin('product_wise_size','product_wise_size.id','=','order_details.fk_product_wise_size_id')
					->leftjoin('sizes','sizes.id','=','product_wise_size.fk_size_id')
					->where('orders.id','=',$id)
					->get();

		return $result;

	}

}





