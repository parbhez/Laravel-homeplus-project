<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Helper;
use App\Services\BackEnd\ReportService;
use App\Services\BackEnd\OrderService;


class ReportController extends Controller
{
    public function report()
    {
        return view('backend.report.report');
    }

    public function getmerchent()
    {
        $getAllMerchant = ReportService::getAllMerchant();
        return view('backend.report.merchantWiseIncomeReport', compact('getAllMerchant'));
    }

    public function merchantWiseIncomeLoad($merchantId)
    {
        $saleProducts = ReportService::getMercahntSaleProduct($merchantId);
        $getMerchantIncomeReport = ReportService::getMerchantWiseIncomeReport($merchantId);
        return view('backend.report.merchantWiseIncomeLoad', compact('getMerchantIncomeReport','saleProducts'));
    }

}
