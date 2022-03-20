<?php
namespace App\Services\FrontEnd;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Lang;
use App\Http\Helper;
use Mail;

class FrontEndUserService{
	public static function getUserDetails()
	{
		return DB::table('users')
			->where('id',Session::get('frontendUser.id'))
			->first();
	}
	public static function getOrderList()
	{
		return DB::table('orders')
			->join('order_details as od','od.fk_order_id','=','orders.id')
			->join('users','orders.fk_user_id','=','users.id')
			->join('products','od.fk_product_id','=','products.id')
			->join('merchants','products.fk_merchant_id','=','merchants.id')
			->leftJoin('product_wise_size as pws','od.fk_product_wise_size_id','=','pws.id')
			->leftJoin('product_wise_image as pwi','products.id','=','pwi.fk_product_id')
			->leftJoin('sizes','pws.fk_size_id','=','sizes.id')
			->leftJoin('product_wise_color as pwc','od.fk_product_wise_color_id','=','pwc.id')
			->leftJoin('colors','pwc.fk_color_id','=','colors.id')
			->where('orders.fk_user_id',Session::get('frontendUser.id'))
			->where('pwi.type',1)
			->orderBy('orders.status','ASC')
			->orderBy('orders.id','DESC')
			->get([
				'od.quantity','od.sale_price','od.purchase_price','od.discount','od.vat',
				'orders.order_date','pwi.path','products.product_name_lang1','products.slug',
				'products.product_code','products.id as product_id','merchants.company_name',
				'users.address','products.product_name_lang2','orders.status'
			]);
	}

	public static function updateUserProfile($data = null)
	{
		try{
			DB::table('users')
				->where('id',Session::get('frontendUser.id'))
				->update([
					'full_name' => $data['full_name'],
					'email'     => $data['email'],
					'mobile_no' => $data['mobile_no'],
					'gender'    => $data['gender'],
					'address'   => $data['address']
				]);
			return true;
		}catch(\Exception $e){
			$err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
			return $err_msg;
		}
	}

	public static function getCityWiseCost()
	{
		$result = DB::table('cities')
				  ->get();
		return $result;
	}

	public static function getLastOrderDetails()
	{
		$maxOrderId = DB::table('orders')->max('id');
		$result = DB::table('orders')
		          ->join('order_details as od','orders.id','=','od.fk_order_id')
		          ->join('users','orders.fk_user_id','=','users.id')
		          ->join('products','products.id','=','od.fk_product_id')
		          ->join('product_wise_image as pwi','products.id','=','pwi.fk_product_id')
		          ->join('product_wise_size as pws','pws.id','=','od.fk_product_wise_size_id')
		          ->join('sizes','pws.fk_size_id','=','sizes.id')
		          ->join('product_wise_color as pwc','pwc.id','=','od.fk_product_wise_color_id')
		          ->join('colors','pwc.fk_color_id','=','colors.id')
		          ->where('users.id',Session::get('user.id'))
		          ->where('pwi.image_type',1)
		          ->where('orders.id', $maxOrderId)
			  ->get();
		return $result;
	}

	public static function saveFrontendUserRegistration($data = null)
	{
		try{
			$status=DB::table('users')
				->insert([
					'full_name'    		=> $data['full_name'],
					'email'        		=> $data['email'],
					'password'    		=> bcrypt($data['password']),
					'mobile_no'    		=> $data['mobile_no'],
					'address'    		=> $data['address'],
					'gender'    		=> $data['gender'],
					'remember_token'    => $data['_token'],
					'created_at'        => date('Y-m-d h:m:s'),
					'status'            => 1
				]);
			return true;
		}catch(\Exception $e){
			$err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
		}
	}

	public static function sendNewPassword($data = null)
	{
		$checkEmail = DB::table('users')
			->where('email',$data['email'])
			->first();
		if(count($checkEmail) > 0){
			$makePassword = substr(str_shuffle('#5Yi@%a7$2J&d6Xw!t#3Ag'), 0, 8);
			try{
				DB::table('users')
					->where('email',$data['email'])
					->update([
						'password'   		=> bcrypt($makePassword),
						'remember_token'	=> $data['_token'],
						'updated_at'		=> date('Y-m-d h:m:s')
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
		}

		
	}



}