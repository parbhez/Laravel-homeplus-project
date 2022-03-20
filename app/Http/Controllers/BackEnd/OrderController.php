<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\BackEnd\OrderService;
use DB;
use Mail;

class OrderController extends Controller
{
    public function viewAllOrder()
    {
        $allOrder = OrderService::getAllOrder();
        return view('backend.orders.viewOrders', compact('allOrder'));
    }

    public function loadOrderDetailsModal($id)
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
        return view('backend.orders.orderDetailsEditModal', compact('allInformation'));
    }

    //==========@@ Order Approve Section @@===========

    public function approveOrder($orderId = null)
    {
        $approveOrder = OrderService::approveOrder($orderId);
        if ($approveOrder === true) {
            //OrderService::orderApproveCustomerMailSend($orderId);
            return response()->json(['success' => true]);
        } elseif ($approveOrder == false) {
            return response()->json(['error' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function saleConfirm($orderId = null)
    {
        $approveOrder = OrderService::saleConfirm($orderId);
        if ($approveOrder === true) {
            return response()->json(['success' => true]);
        } elseif ($approveOrder == false) {
            return response()->json(['error' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function denyOrder($orderId = null)
    {
        $denyOrder = OrderService::denyOrder($orderId);
        if ($denyOrder === true) {
            return response()->json(['success' => true]);
        } elseif ($denyOrder == false) {
            return response()->json(['error' => true]);
        } else {
            return response()->json(['error' => true]);
        }
    }

    public function saveEditOrdersInfo(Request $request)
    {
        $updateOrdersInfo = OrderService::updateEditOrdersInfo($request->all());
        if ($updateOrdersInfo === true) {
            return response()->json(['success' => true, 'status' => "Update Order Details Successfull."]);
        }else {
            return response()->json(['error' => true, 'status' => $updateOrdersInfo]);
        }
    }

    public function updateShippingCost(Request $request)
    {
        $updateShipping = OrderService::updateShippingCost($request->all());
        if ($updateShipping === true) {
            return response()->json(['success' => true, 'status' => "Shipping Cost Update Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $updateShipping]);
        }
    }

    public function deleteOrderDetails(Request $request)
    {
        $deleteOrderDetails = OrderService::deleteOrderDetails($request->all());
        if ($deleteOrderDetails === true) {
            return response()->json(['success' => true, 'status' => "Delete Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $deleteOrderDetails]);
        }
    }

}
