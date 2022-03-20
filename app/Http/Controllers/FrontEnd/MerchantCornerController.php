<?php

namespace App\Http\Controllers\FrontEnd;

use App\Services\BackEnd\ReportService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\MerchantCorner\ MerchantCornerService;
use App\Services\BackEnd\OrderService;
use App\Services\FrontEnd\HomeService;
use App\Http\Requests\MerchantRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\MerchantProductRequest;
use Auth;
use Session;
use DB;
use Hash;

class MerchantCornerController extends Controller
{
    public function merchantPage()
    {
        return view('merchantCorner.merchantRegistration');
    }

    public function merchantForgotPassword()
    {
        return view('merchantCorner.merchantForgotPassword');
    }

    public function sendNewPassword(Request $request)
    {
        $sendPassword = MerchantCornerService::sendNewPassword($request->all());
        if ($sendPassword === true) {
            Session::flash('flash_success', 'An email with a new password is send to your email.. Please check and confirm.');
            return redirect()->route('forgotePassword');
        } else if ($sendPassword === false) {
            Session::flash('flash_success', 'The Mail Dose Not Exist');
            return redirect()->route('forgotePassword');
        } else {
            Session::flash('flash_success', 'The Mail Dose Not Existd asfsdfsdf');
            return redirect()->back()->with('flash_error', $sendPassword);
        }
    }

    public function saveMerchant(MerchantRequest $request)
    {
        $saveStatus = MerchantCornerService::saveMerchantRegistration($request->all());
        if ($saveStatus === true) {
            return redirect()->route('merchantPage')->with('success', 'Save Category Successfull.');
        } elseif ($saveStatus == 'tooLarge') {
            return redirect()->route('merchantPage')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('merchantPage')->with('error', $saveStatus);
        }
    }

    public function checkMerchantLogin(LoginRequest $request)
    {
        $credential = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('merchant')->attempt($credential)) {
            Session::set('merchant', Auth::guard('merchant')->user());
            return redirect()->route('merchantDashboard');
        } else {
            Session::flash('flash_error', 'Your Given Credential Is Wrong.');
            return redirect()->route('merchantPage');
        }
    }

    public function merchantLogout()
    {
        Auth::guard('merchant')->logout();
        Session::forget('merchant');
        Session::flash('flash_success', 'You Are Successfully Logout.');
        return redirect()->route('merchantPage');
    }

    public function merchantDashboard()
    {
        $dailyDelingStatus = MerchantCornerService::getDealingStatus(1); //today
        $weeklyDealingStatus = MerchantCornerService::getDealingStatus(2); //weekly
        $monthlyDealingStatus = MerchantCornerService::getDealingStatus(3); // monthly
        $totalDealingStatus = MerchantCornerService::getDealingStatus(4); //Total
        return view('merchantCorner.merchantDashboard', compact(
            'dailyDelingStatus', 'weeklyDealingStatus', 'monthlyDealingStatus', 'totalDealingStatus'
        ));
    }

    public function getMerchantSaleAndCancleProduct($serach_priode = null, $serach_content = null)
    {
        $products = MerchantCornerService::getMerchantSaleAndCancleProduct($serach_priode, $serach_content);
        return view('merchantCorner.merchantProductLoad', compact('products'));
    }

    public function orderProductDetailsModal($orderDetailsId = null)
    {
        $product = MerchantCornerService::getOrderProductDetailsModal($orderDetailsId);
        return view('merchantCorner.orderProductDetailsModal', compact('product'));
    }

    public function merchantManagement()
    {
        $getProducts = MerchantCornerService::getProducts();
        $getTotalProduct = MerchantCornerService::getTotalProduct();
        $productType = -99;
        $productCode = '';
        $productName = '';
        return view('merchantCorner.merchantManagement', compact(
            'getProducts', 'getTotalProduct', 'productType', 'productCode', 'productName'
        ));
    }

    public function merchantStockStatus($productId = null, $stockstatus = null)
    {
        MerchantCornerService::merchantStockStatus($productId, $stockstatus);
        return redirect()->back();
    }

    public function merchantProductSearch(Request $request)
    {
        $productType = $request->product_type;
        $productCode = $request->product_code;
        $productName = $request->product_name;
        $getProducts = MerchantCornerService::getSearchProducts($request->all());
        $getTotalProduct = MerchantCornerService::getSearchTotalProduct($request->all());
        return view('merchantCorner.merchantManagement', compact(
            'getProducts', 'getTotalProduct', 'productType', 'productCode', 'productName'
        ));
    }

    public function merchantOrder()
    {
        $allOrder = MerchantCornerService::getOrders();
        return view('merchantCorner.merchantOrder', compact('allOrder'));
    }

    public function merchantApproveOrders($id)
    {
        $approveOrder = MerchantCornerService::merchantApprovedOrders($id);
        if ($approveOrder === true) {
            return response()->json(['success' => true, 'status' => "Successfully Apperoved."]);
        } elseif ($approveOrder == false) {
            return response()->json(['error' => true, 'status' => "No Change Occour."]);
        } else {
            return response()->json(['error' => true, 'status' => $approveOrder]);
        }
    }

    public function merchantShiftmentOrder($id)
    {
        $status = MerchantCornerService::merchantShiftmentOrder($id);
        if ($status === true) {
            return response()->json(['success' => true, 'status' => "Successfully Shiftment Process."]);
        } elseif ($status == false) {
            return response()->json(['error' => true, 'status' => "No Change Occour."]);
        } else {
            return response()->json(['error' => true, 'status' => $status]);
        }
    }

    public function merchantDenyOrdersModal($orderId)
    {
        $orderConditions = MerchantCornerService::getOrderConditions();
        return view('merchantCorner.merchantOrderDenyModal', compact('orderConditions', 'orderId'));
    }

    public function merchantDenyOrdersConfirm(Request $request)
    {
        $confirm = MerchantCornerService::denyConfirm($request->all());
        if ($confirm === true) {
            return redirect()->route('merchantOrder')->with('success', 'Order Cancel Successfull.');
        } elseif ($confirm == 'false') {
            return redirect()->route('merchantOrder')->with('error', 'No Change');
        } else {
            return redirect()->route('merchantOrder')->with('error', $confirm);
        }
    }

    public function orderDetailsView($id)
    {
        $getAllSize = null;
        $getAllColour = null;
        $getAllData = OrderService::getOrderDetailsByIdForEdit($id);
        foreach ($getAllData as $allData) {
            $getAllSize = OrderService::getAllSizeByProductId($allData->product_id);
        }
        foreach ($getAllData as $allData) {
            $getAllColour = OrderService::getAllColorByProductId($allData->product_id);
        }
        $allInformation['details'] = $getAllData;
        $allInformation['sizes'] = $getAllSize;
        $allInformation['colors'] = $getAllColour;
        return view('merchantCorner.merchantOrderDetailsModal', compact('allInformation'));
    }


    public function merchantProduct()
    {
        $categories = MerchantCornerService::getActiveCategory();
        $sizes = MerchantCornerService::getActiveSizes();
        $colors = MerchantCornerService::getActiveColors();
        return view('merchantCorner.merchantProduct', compact('categories', 'sizes', 'colors'));
    }

    public function getCategoryWiseSubCategory($categoryId = null)
    {
        return MerchantCornerService::getCategoryWiseSubCategory($categoryId);
    }

    public function getSubCategoryWiseSubCategoryDetails($subCategoryId = null)
    {
        return MerchantCornerService::getSubCategoryWiseSubCategoryDetails($subCategoryId);
    }

    public function merchantAllProduct($id)
    {
        $merchantInfo = MerchantCornerService::getMerchantInfoById($id);
        $allProducts = MerchantCornerService::getMerchantWiseProduct($id);
        $menus = MerchantCornerService::getMerchantMenu($id);
        return view('merchantProductPanel.index', compact('allProducts', 'merchantInfo', 'menus'));
    }
    
    public function saveMerchantProduct(MerchantProductRequest $request)
    {
        $saveStatus = MerchantCornerService::saveMerchantProduct($request->all());
        if ($saveStatus === true) {
            return redirect()->route('merchantNextProductAdd')->with('flash_success', 'Save Category Successfull.');
        } elseif ($saveStatus == 'tooLarge') {
            return redirect()->route('merchantProduct')->with('flash_error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('merchantProduct')->with('flash_error', $saveStatus);
        }
    }
    public function merchantNextProductAdd()
    {
        return view('merchantCorner.merchantNextProductAdd');
    }

    public function merchantProductEdit($productId)
    {
        $categories = MerchantCornerService::getActiveCategory();
        $sizes = MerchantCornerService::getActiveSizes();
        $colors = MerchantCornerService::getActiveColors();
        $products = MerchantCornerService::getProductById($productId);
        return view('merchantCorner.merchantProductEdit', compact(
            'categories', 'sizes', 'colors', 'products'
        ));
    }

    public function saveMerchantProductEdit(Request $request)
    {
        $saveStatus = MerchantCornerService::saveMerchantProductEdit($request->all());
        if ($saveStatus === true) {
            return redirect()->back()->with('flash_success', 'Save Category Successfull.');
        } elseif ($saveStatus == 'tooLarge') {
            return redirect()->back()->with('flash_error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->back()->with('flash_error', $saveStatus);
        }
    }

    public function mercentRemoveProductImage(Request $request)
    {
        $saveStatus = MerchantCornerService::mercentRemoveProductImage($request->all());
        if ($saveStatus === true) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function merchantReport()
    {
        $merchantId = Session::get('merchant.id');
        $saleProducts = ReportService::getMercahntSaleProduct($merchantId);
        $getMerchantIncomeReport = ReportService::getMerchantWiseIncomeReport($merchantId);
        return view('merchantCorner.merchantReport', compact('saleProducts','getMerchantIncomeReport'));
    }

    public function manageProfile()
    {
        $getMerchantInfo = MerchantCornerService::getMerchantInfo();
        return view('merchantCorner.manageProfile', compact('getMerchantInfo'));
    }

    public function updateAccountInformation(Request $request)
    {
        $updateInfo = MerchantCornerService::updateAccountInformation($request->all());
        if ($updateInfo === true) {
            return redirect()->route('manageProfile')->with('success', 'Update Account Information Successful..!');
        } else {
            return redirect()->route('manageProfile')->with('error', $updateInfo);
        }
    }

    public function checkMerchantPassword(Request $request)
    {
        $data = DB::table('merchants')
            ->where('id', Session::get('merchant.id'))
            ->first();
        if (Hash::check($request->old_password, $data->password)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function updateEmailAndPass(Request $request)
    {
        $updateEmailAndPass = MerchantCornerService::updateEmailAndPass($request->all());
        if ($updateEmailAndPass === true) {

            return response()->json(['success' => true, 'status' => "Update Email And Password Successful..!"]);
        } else {
            return response()->json(['error' => true, 'status' => $updateEmailAndPass]);
        }
    }

    public function saveEditMerchantImage(Request $request)
    {
        $saveImage = MerchantCornerService::saveEditMerchantImage($request->all());
        if ($saveImage === true) {
            Session::set('merchant', Auth::guard('merchant')->user());
            return redirect()->route('manageProfile')->with('success', 'Image Update Successfull.');
        } elseif ($saveImage == 'tooLarge') {
            return redirect()->route('manageProfile')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('manageProfile')->with('error', $saveImage);
        }
    }

    public function categoryWiseProduct($merchantId = null, $categoryId = null)
    {
        $category = HomeService::getCategoryByid($categoryId);
        $subCategories = MerchantCornerService::getSubCategoryByCategoryid($categoryId, $merchantId);
        return view('merchantProductPanel.categoryWiseProduct', compact('category', 'subCategories', 'merchantId'));
    }

    public function categoryWiseProductLoad(Request $request)
    {
        return MerchantCornerService::merchantCategoryWiseProduct($request->all());
    }


    public function subCategoryWiseProduct($merchantId = null, $subCategoryId = null)
    {
        $subCategory = HomeService::getSubCategoryBySubCatId($subCategoryId);
        return view('merchantProductPanel.subCategoryWiseProduct', compact('subCategory', 'subSubCategories', 'merchantId'));
    }

    public function subCategoryWiseProductLoad(Request $request)
    {
        return MerchantCornerService::getSubCategoryWiseProduct($request->all());
    }

    public function subSubCategoryWiseProduct($merchantId = null, $subSubCategoryId = null)
    {
        $subSubCategory = DB::table('sub_sub_categories as ssc')
            ->where('ssc.id', $subSubCategoryId)
            ->first();
        return view('merchantProductPanel.subSubCategoryWiseProduct', compact('subSubCategory', 'merchantId'));
    }

    public function subSubCategoryWiseProductLoad(Request $request)
    {
        return $result = DB::table('products')
            ->join('product_wise_image as pwi', 'pwi.fk_product_id', '=', 'products.id')
            ->where('products.fk_sub_sub_category_id', 12)
            ->orderBy('products.id', 'DESC')
            ->select(
                'products.id as product_id',
                'products.*',
                'pwi.*'
            )
            ->get();
        return HomeService::getSubSubCategoryWiseProduct($request->all());
    }

}
