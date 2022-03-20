<?php
namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\FrontendUserRequest;
use App\Http\Requests\ShoopingCartSaveRequest;
use App\Services\FrontEnd\FrontEndUserService;
use App\Services\FrontEnd\HomeService;
use Session;
use Auth;
use DB;
use Hash;
use Input;

class FrontEndUserController extends Controller{

	public function frontendUser()
    {
        if(!(Session::has('top_menus'))){
            $top_menus = HomeService::getMenuForTopNavigation();
            Session::set('top_menus',$top_menus);
        }
        if(!(Session::has('menus'))){
            $menus = HomeService::getMenu();
            Session::set('menus',$menus);
        }
		return view('frontend.userRegistration');
	}

    public function saveFrontendUserRegistration(Request $request)
    {
        $mobile = str_split($request->mobile_no);
        $mobileStr = '';
        for ($i=0; $i < count($mobile); $i++) { 
            if ($mobile[$i] != '_' && $mobile[$i] != '-') {
                $mobileStr .= $mobile[$i];
            }          
        }
        if (strlen($mobileStr) < 11) {
            return redirect()->back()
                ->with('flash_error',"Mobile Number Must Be Length 11.")
                ->withInput();
        }
        $this->validate($request, [
            'full_name' => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'mobile_no' => 'required | min:12 | max:12',
            'gender'    => 'required',
            'address'   => 'required',
        ]);
        $saveStatus = FrontEndUserService::saveFrontendUserRegistration($request->all());
        if ($saveStatus === true){
            return $this->checkUserLogin($request);
        }else{
            return redirect()->back()->with('flash_error',$saveStatus);
        }
	}

    public function forgotePassword()
    {
        /*if(!(Session::has('top_menus'))){
            $top_menus = HomeService::getMenuForTopNavigation();
            Session::set('top_menus',$top_menus);
        }
        if(!(Session::has('menus'))){
            $menus = HomeService::getMenu();
            Session::set('menus',$menus);
        }*/
        return view('frontend.forgotePassword');
    }
    public function sendNewPassword(Request $request)
    {
        $sendPassword = FrontEndUserService::sendNewPassword($request->all());
        if ($sendPassword === true){
            Session::flash('flash_success', 'An email with a new password is send to your email.. Please check and confirm.');
            return redirect()->route('forgotePassword');
        }else{
            return redirect()->back()->with('flash_error',$sendPassword);
        }
    }

    public function userLogin()
    {
        return view('frontend.userLogin');
    }

    public function checkUserLogin(Request $request)
    {
    	$credential = ['email' => $request->email,'password' => $request->password];
    	if (Auth::guard('user')->attempt($credential)) {
            Session::set('frontendUser',Auth::guard('user')->user());
            Session::set('last_login_lang',Auth::guard('user')->user()->last_login_lang);
    		return redirect()->route('userDashboard');
    	}else{
    		Session::flash('flash_error', 'Your Given Credential Is Wrong.');
    		return redirect()->route('userLogin');
    	}
    }

    public function userLogout()
    {
    	Auth::guard('user')->logout();
    	Session::forget('frontendUser');
    	Session::flash('flash_success', 'You Are Successfully Logout.');
    	return redirect()->route('userLogin');
    }

    public function userDashboard()
    {
    	$cities      = FrontEndUserService::getCityWiseCost();
        $user        = FrontEndUserService::getUserDetails();
        $orderLists  = FrontEndUserService::getOrderList();
        return view('frontend.manageUserProfile',compact('user','orderLists','cities'));
        //return view('frontend.userDashboard',compact('cities'));
    }

    public function manageUserProfile()
    {
        $cities   = FrontEndUserService::getCityWiseCost();
        $user        = FrontEndUserService::getUserDetails();
    	$orderLists  = FrontEndUserService::getOrderList();
    	return view('frontend.manageUserProfile',compact('user','orderLists','cities'));
    }

    public function updateUserProfile(Request $request)
    {
        $status = FrontEndUserService::updateUserProfile($request->all());
        if ($status === true){
            return response()->json(['success' => true, 'status' => 'Profile Update Successfull']);
        }else{
            return response()->json(['success' => false, 'status' => $status]);
        }
    }

    public function checkUserPassword(Request $request)
    {
        $data = DB::table('users')
            ->where('id',Session::get('frontendUser.id'))
            ->first();
        if (Hash::check($request->prev_password,$data->password)){
            return response()->json(['success' => true]);
        }else{
            return response()->json(['error' => true]);
        }
    }

    public function saveUserPassword(Request $request)
    {
        $status = DB::table('users')
            ->where('id',Session::get('frontendUser.id'))
            ->update([
                'password' => Hash::make($request->new_password)
            ]);
        if ($status) {
            return redirect()->route('userDashboard')->with('success','Password Update Succesfull.');
        }else{
            return redirect()->route('userDashboard')->with('error','Password Update Fail...!');
        }
    }
}