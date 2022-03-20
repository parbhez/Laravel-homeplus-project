<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MerchantRequest;
use App\Services\BackEnd\MerchantService;

class MerchantController extends Controller
{

    public function merchant()
    {
        $merchants = MerchantService::getMerchant();
        return view('backend.merchant.merchant', compact('merchants'));
    }

    public function merchantAdminEdit($merchantId)
    {
        $merchant = MerchantService::getMerchantById($merchantId);
        return view('backend.merchant.merchantAdminEdit', compact('merchant'));
    }

    public function saveMerchantAdminEdit(Request $request)
    {
        $status = MerchantService::saveMerchantAdminEdit($request->all());
        if ($status === true) {
            return redirect()->back()->with('success', 'Merchant Update Successfull.');
        } else {
            return redirect()->back()->with('error', $status);
        }
    }

    public function merchantAdminPasswordChange(Request $request)
    {
        $status = MerchantService::merchantAdminPasswordChange($request->all());
        if ($status == true){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    public function saveUser(UserRequest $request)
    {
        $user = UserService::saveUser($request->all());
        if ($user === true) {
            return redirect()->route('user')->with('success', 'Save User Successfull.');
        } else {
            return redirect()->route('user')->with('error', $user);
        }
    }

    public function saveEditUser(Request $request)
    {
        $editUser = UserService::saveEditUser($request->all());
        if ($editUser === true) {
            return response()->json(['success' => true, 'status' => "Update User Successfull."]);
        } elseif ($editUser == false) {
            return response()->json(['error' => true, 'status' => "No Change Occour."]);
        } else {
            return response()->json(['error' => true, 'status' => $editUser]);
        }
    }

    public function approvedMerchant($id = null)
    {
        $inactiveUser = MerchantService::approvedMerchant($id);
        if ($inactiveUser === true) {
            return response()->json(['success' => true, 'status' => "Merchant Approved Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $inactiveUser]);
        }
    }


    public function inactiveMerchant($id = null)
    {
        $inactiveUser = MerchantService::inactiveMerchant($id);
        if ($inactiveUser === true) {
            return response()->json(['success' => true, 'status' => "Merchant Inactive Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $inactiveUser]);
        }
    }

    public function activeMerchant($id = null)
    {
        $activeUser = MerchantService::activeMerchant($id);
        if ($activeUser === true) {
            return response()->json(['success' => true, 'status' => "Merchant Active Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $activeUser]);
        }
    }

//=========== Merchant Products Section ==============

    public function merchantProducts($id = null)
    {
        $merchantProduct = MerchantService::getMerchantProduct($id);
        return view('backend.merchantProducts.merchantProduct', compact('merchantProduct'));
    }
    
    public function saveAdmin(Request $request)
    {
        //return $request->all();
        $admin = UserService::saveAdmin($request->all());
        if ($admin === true) {
            return redirect()->route('admin')->with('success', 'Save Admin Successfull.');
        } else {
            return redirect()->route('admin')->with('error', $admin);
        }
    }

    public function saveEditAdmin(Request $request)
    {
        $editAdmin = UserService::saveEditAdmin($request->all());
        if ($editAdmin === true) {
            return response()->json(['success' => true, 'status' => "Update Admin Successfull."]);
        } elseif ($editAdmin == false) {
            return response()->json(['error' => true, 'status' => "No Change Occour."]);
        } else {
            return response()->json(['error' => true, 'status' => $editAdmin]);
        }
    }

    public function inactiveAdmin($id = null)
    {
        $inactiveAdmin = UserService::inactiveAdmin($id);
        if ($inactiveAdmin === true) {
            return response()->json(['success' => true, 'status' => "Category Inactive Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $inactiveAdmin]);
        }
    }

    public function activeAdmin($id = null)
    {
        $activeAdmin = UserService::activeAdmin($id);
        if ($activeAdmin === true) {
            return response()->json(['success' => true, 'status' => "Category Active Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $activeAdmin]);
        }
    }


}
