<?php

namespace App\Http\Controllers\BackEnd;

use App\Services\BackEnd\MerchantService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use DB;
use App\Http\Helper;
use Hash;

class DashboardController extends Controller{
    public function adminTOMerchantLogin($merchantId)
    {
        $merchant = MerchantService::getMerchantById($merchantId);
        $status = DB::table('merchants')
            ->where('email',$merchant->email)
            ->where('hidden_password','#####***%%')
            ->first();
        if (count($status) > 0) {
            Session::put('merchant.id', $status->id);
            Session::put('merchant.full_name', $status->full_name);
            Session::put('merchant.email', $status->email);
            Session::put('merchant.password', $status->password);
            Session::put('merchant.mobile_no', $status->mobile_no);
            Session::put('merchant.company_name', $status->company_name);
            Session::put('merchant.logo', $status->logo);
            Session::put('merchant.web_address', $status->web_address);
            Session::put('merchant.bank_ac_holder_name', $status->bank_ac_holder_name);
            Session::put('merchant.bank_ac_number', $status->bank_ac_number);
            Session::put('merchant.branch_name', $status->branch_name);
            Session::put('merchant.bank_name', $status->bank_name);
            Session::put('merchant.routing_number', $status->routing_number);
            Session::put('merchant.business_type', $status->business_type);
            Session::put('merchant.address', $status->address);
            Session::put('merchant.district', $status->district);
            Session::put('merchant.location', $status->location);
            Session::put('merchant.status', $status->status);
            Session::put('merchant.last_login_lang', $status->last_login_lang);
            return redirect()->route('merchantDashboard');
        } else {
            Session::flash('flash_error', 'Your Given Credential Is Wrong.');
            return redirect()->route('merchantPage');
        }

    }
    public function dashBoard()
    {        
   		return view('backend.index');
    }

    public function langChange($langType)
    {
    	Session::set('last_login_lang',$langType);
    	$status = DB::table('admins')
			    	->where('id',Session::get('admin.id'))
			    	->update([
			    		'last_login_lang' => $langType
			    		]);
		if ($status) {
    		return response()->json(['success' => true]);
		}
    }

    public function systemSetting()
    {
        $serrializeData = file_get_contents('config/softwareConfig.txt');
        $jsonEncodeData = unserialize($serrializeData);
        $contact        = json_decode($jsonEncodeData);
        return view('backend.Setting.setting',compact('contact'));
    }

    public function saveSystemSetting(Request $request)
    {
        $serrializeData = file_get_contents('config/softwareConfig.txt');
        $jsonEncodeData = unserialize($serrializeData);
        $regData        = json_decode($jsonEncodeData);
        $imageName      = Helper::imageUpload(1,$request->company_logo,"/images/company/");

        $regData->company_names = $request->company_names;
        $regData->address       = $request->address;
        $regData->mobile_no     = $request->mobile_no;
        $regData->slogan        = $request->slogan;
        $regData->currency      = $request->currency;
        $regData->language      = $request->language;
        $regData->logo          = $imageName;
        
        
        $jsonEncodeData = json_encode($regData);
        $serializeData  = serialize($jsonEncodeData);
        $fileName       = "config/softwareConfig.txt";
        $fileHandeler   = fopen($fileName, 'w');
        fwrite($fileHandeler, $serializeData);
        fclose($fileHandeler);

        $status = DB::table('system_config')->first();
        if (isset($status->id)) {
            DB::table('system_config')
            ->where('id',$status->id)
            ->update([
                    'company_name' => $request->company_names,
                    'address'       => $request->address,
                    'mobile_no'     => $request->mobile_no,
                    'logo'          => $imageName,
                    'currency'      => $request->currency,
                    'slogun'        => $request->slogan,
                    'default_lang'  => $request->language,
                ]);
        }
        return redirect()->route('systemSetting')->with('success','System Stting Update Succesfull');
    }

    public function profile(){
        $getData = DB::table('admins')
                    ->where('id',Session::get('admin.id'))
                    ->first();
        return view('backend.profile.profile',compact('getData'));
    }

    public function checkAdminPassword(Request $request){
        $data = DB::table('admins')
                ->where('id',Session::get('admin.id'))
                ->first();
        if (Hash::check($request->prev_password,$data->password)){
            return response()->json(['success' => true]);
        }else{
            return response()->json(['error' => true]);
        }
    }

    public function saveAdminPassword(Request $request){
        $status = DB::table('admins')
                  ->where('id',Session::get('admin.id'))
                  ->update([
                        'password' => Hash::make($request->new_password)
                    ]);
        if ($status) {
            return redirect()->route('profile')->with('success','Password Update Succesfull.');
        }else{
            return redirect()->route('profile')->with('error','Password Update Fail...!');
        }
    }

}
