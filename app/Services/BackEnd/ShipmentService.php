<?php
namespace App\Services\BackEnd;
use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;

class ShipmentService{
	public static function getShipment(){
		$result= DB::table('orders')
					->select([
							'order_wise_shipping.address',
							'order_wise_shipping.shipping_date',
				  			'users.full_name',
				  			'users.email',
				  			'cities.city_name_lng1',
				  			'orders.invoice_no',
				  			'orders.total_amount',
				  			'orders.id',
				  			])
				    ->leftjoin('order_wise_shipping', 'orders.id', '=', 'order_wise_shipping.fk_order_id')
				    ->leftjoin('users', 'users.id', '=', 'orders.fk_user_id')
				    ->leftjoin('cities', 'cities.id', '=', 'order_wise_shipping.fk_city_id')
				    ->where('orders.status', 2)
				    ->get();
				return $result;

	}

public static function getDeliveryOrders(){
		$result= DB::table('orders')
					->select([
							'order_wise_shipping.address',
							'order_wise_shipping.mobile_no',
				  			'users.full_name',
				  			'users.email',
				  			'cities.city_name_lng1',
				  			'orders.invoice_no',
				  			'orders.total_amount',
				  			'orders.id',

				  			])
				    ->leftjoin('order_wise_shipping', 'orders.id', '=', 'order_wise_shipping.fk_order_id')
				    ->leftjoin('users', 'users.id', '=', 'orders.fk_user_id')
				    ->leftjoin('cities', 'cities.id', '=', 'order_wise_shipping.fk_city_id')
				    ->where('orders.status', 3)
				    ->get();
				return $result;

	}


		public static function shipmentSent($ordersId=null,$date){

			foreach($ordersId as $orderId){

			try{
				DB::beginTransaction();
		$result = DB::table('orders')
				  	->where('id',$orderId)
					->update([
						'status' => 3
						]);

		$date = DB::table('order_wise_shipping')
				  	->where('fk_order_id',$orderId)
					->update([
						'shipping_date' => $date
						]);
					DB::commit();
			} catch(\Exception $e){
				return $e;
             	$err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             	return $err_msg;
				}
			}	
			return true;		
	}

	public static function denyShipment($id){
		//return $id;
		$result = DB::table('orders')
				  	->where('id',$id)
					->update([
						'status' => 0
						]);
			if($result){
				return true;
			} else{
				return false;
			}
	}

	public static function completeDelivery($ordersId=null,$date){
		//return $date;
		foreach($ordersId as $orderId){
			

			try{
				DB::beginTransaction();
		$result = DB::table('orders')
				  	->where('id',$orderId)
					->update([
						'status' => 4
						]);

		$date = DB::table('order_wise_shipping')
				  	->where('fk_order_id',$orderId)
					->update([
						'delivery_date' => $date
						]);
				DB::commit();
			} catch(\Exception $e){
				//return $e;
             	$err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             	return $err_msg;
			}
		}
			return true;			
	}

	public static function deliveryReturn($id){
		
		try{
		$result = DB::table('orders')
				  	->where('id',$id)
					->update([
						'status' => 5
						]);
				}
		catch(\Exception $e){
				//return $e;
             	$err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             	return $err_msg;
			}
			return true;	
	}

	public static function getReturnedOrder(){
		$result= DB::table('orders')
					->select([
							'order_wise_shipping.address',
							'order_wise_shipping.mobile_no',
				  			'users.full_name',
				  			'users.email',
				  			'cities.city_name_lng1',
				  			'orders.invoice_no',
				  			'orders.total_amount',
				  			'orders.id',

				  			])
				    ->leftjoin('order_wise_shipping', 'orders.id', '=', 'order_wise_shipping.fk_order_id')
				    ->leftjoin('users', 'users.id', '=', 'orders.fk_user_id')
				    ->leftjoin('cities', 'cities.id', '=', 'order_wise_shipping.fk_city_id')
				    ->where('orders.status', 5)
				    ->get();
				return $result;

	}

}





