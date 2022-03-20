<?php
namespace App\Services\BackEnd;
use DB;
use Session;
use Lang;
use Image;
use App\Http\Helper;

class IncomeExpenseService{


//=======@@ Start Income Section  @@=======

	public static function getIncomeExpense(){
		$result = DB::table('income_expense_head')
				  ->orderBy('id','DESC')
				  ->get();
		return $result;
	}

	public static function getIncome(){
		$result = DB::table('income_history')
				  ->join('income_expense_head','income_expense_head.id','=','income_history.fk_income_expense_head_id')
				  ->orderBy('income_history.id','DESC')
				  ->get([
				  		'income_history.id as income_id',
				  		'income_history.*',
				  		'income_expense_head.id as income_head_id',
				  		'income_expense_head.*',
				  	]);
		return $result;
	}

		
	public static function saveIncome($data = null){
		try{
		DB::beginTransaction();
			$inComeId = DB::table('income_history')
						->insertGetId([
								'fk_income_expense_head_id'     => $data['incomeHead'],
								'comments'                      => $data['note'],
								'amount'                        => $data['amount'],
								'transection_date'              => $data['date'],
								'fk_created_by'                 => $data['username']
								
							]);
		
		DB::commit();
			return true;
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}

	public static function saveEditIncome($data = null){
		try{
			$status = DB::table('income_history')
				  ->where('id',$data['income_id'])
				  ->update([
						'fk_income_expense_head_id' => $data['income_expense_head_id'],
						'comments'                  => $data['comments'],
						'amount'                    => $data['amount'],
						'fk_updated_by'             => Session::get('admin.id'),
						'updated_at'                => date("Y-m-d h-i-s")
					]);	
			if ($status) {
				return true;
			}else{
				return false;
			}
		}
		
		catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
        
	}
	public static function inactiveIncome($id = null){
		try{
			$status = DB::table('income_history')
				  ->where('id',$id)
				  ->update([
						'status' => 0,
					]);	
			return true;
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}

public static function activeIncome($id = null){
		try{
			$status = DB::table('income_history')
				  ->where('id',$id)
				  ->update([
						'status' => 1,
					]);	
			return true;
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}

//=======@@ End Income Section  @@=======

	public static function getExpense(){
		$result = DB::table('expense_history')
				  ->join('income_expense_head','income_expense_head.id','=','expense_history.fk_income_expense_head_id')
				  ->orderBy('expense_history.id','DESC')
				  ->get([
                      
                        'expense_history.id as expense_id',
				  		'expense_history.*',
				  		'income_expense_head.id as expense_head_id',
				  		'income_expense_head.*',

				  	]);
		return $result;
	}

	public static function saveExpense($data = null){
		try{
		DB::beginTransaction();
			$exPenseId = DB::table('expense_history')
						->insertGetId([
								'fk_income_expense_head_id'     => $data['expenseHead'],
								'comments'                      => $data['note'],
								'amount'                        => $data['amount'],
								'transection_date'              => $data['date'],
								'fk_created_by'                 => $data['username']								
								
							]);
		
		DB::commit();
			return true;
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}

	public static function saveEditExpense($data = null){
		try{
			$status = DB::table('expense_history')
				  ->where('id',$data['expense_id'])
				  ->update([
						'fk_income_expense_head_id' => $data['income_expense_head_id'],
						'comments'                  => $data['comments'],
						'amount'                    => $data['amount'],
						'fk_updated_by'             => Session::get('admin.id'),
						'updated_at'                => date("Y-m-d h-i-s")
					]);	
			if ($status) {
				return true;
			}else{
				return false;
			}
		}
		
		catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
        
	}
	public static function inactiveExpense($id = null){
		try{
			$status = DB::table('expense_history')
				  ->where('id',$id)
				  ->update([
						'status' => 0,
					]);	
			return true;
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}

public static function activeExpense($id = null){
		try{
			$status = DB::table('expense_history')
				  ->where('id',$id)
				  ->update([
						'status' => 1,
					]);	
			return true;
		}catch(\Exception $e){
             $err_msg = \Lang::get("mysqlError.".$e->errorInfo[1]);
             return $err_msg;
        }
	}


/*
	public static function getIncomeHeadByid($subCategoryId = null){
		$result = DB::table('income_history as ih')
				  ->select([
				  		'ih.id as id',
				  		'ih.fk_income_expense_head_id',
				  		'c.category_name_lng1',
				  		'c.id as category_id',
				  	])
				  ->join('categories as c','sc.fk_category_id','=','c.id')
				  ->where('sc.id' , $subCategoryId)
				  ->first();
		return $result;
	}

	public static function getIncomeHead(){
		$result = DB::table('sub_categories as sc')
				  ->join('categories as c','sc.fk_category_id','=','c.id')
				  ->orderBy('sc.id','DESC')
				  ->get([
				  		'sc.id as id',
				  		'sc.sub_category_name_lng1',
				  		'sc.sub_category_name_lng2',
				  		'sc.icon',
				  		'sc.status',
				  		'c.category_name_lng1',
				  		'c.id as category_id',
				  	]);
		return $result;
	}
*/
//=======@@ End Sub Category Section  @@=======



	
}