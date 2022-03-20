<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MerchantProductRequest;
use App\Services\BackEnd\ProductService;
use App\Services\BackEnd\BasicSetupService;

class ProductController extends Controller
{
//=======@@ Start Product Section  @@=======

    public function product()
    {
        $viewProducts = ProductService::getAllMerchantsProduct();
        $categories = BasicSetupService::getActiveCategory();
        $sizes = BasicSetupService::getSize();
        $colors = BasicSetupService::getColor();
        return view('backend.product.product', compact('viewProducts','categories','sizes','colors'));
    }
    public function merchantProductsView($merchantId = null)
    {
        $viewProducts = ProductService::getProductsByMerchantId($merchantId);
        return view('backend.product.product', compact('viewProducts'));
    }

    public function getCategoryWiseSubCategory($categoryId = null)
    {
        return ProductService::getCategoryWiseSubCategory($categoryId);
    }

    public function getSubCategoryWiseSubCategoryDetails($subCategoryId = null)
    {
        return ProductService::getSubCategoryWiseSubCategoryDetails($subCategoryId);
    }

    public function singelProductView($productId = null)
    {
        $products = ProductService::singelItemProductView($productId);
        return view('backend.product.singleProductDetailsModal', compact('products'));
    }

    public function saveProduct(MerchantProductRequest $request)
    {
        $saveProduct = ProductService::saveProduct($request->all());
        if ($saveProduct === true) {
            return redirect()->route('product')->with('success', 'Product Add Successfull.');
        } elseif ($saveProduct == 'tooLarge') {
            return redirect()->route('product')->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('product')->with('error', $saveProduct);
        }
    }

    public function productEditView($productId = null)
    {
        $product = ProductService::productEditView($productId);
        $categories = BasicSetupService::getActiveCategory();
        $sizes = BasicSetupService::getSize();
        $colors = BasicSetupService::getColor();
        return view('backend.product.productEditView', compact('categories', 'sizes', 'colors', 'product'));
    }

    public function saveEditProductDetails(Request $request)
    {
        $saveProduct = ProductService::saveEditProductDetails($request->all());
        if ($saveProduct === true) {
            return redirect()->route('productEditView', $request->product_id)->with('success', 'Product Update Successfull.');
        } else {
            return redirect()->route('productEditView', $request->product_id)->with('error', $saveProduct);
        }
    }

    public function saveEditProductProperties(Request $request)
    {        
        $saveProduct = ProductService::saveEditProductProperties($request->all());
        if ($saveProduct === true) {
            return redirect()->route('productEditView', $request->product_id)->with('success', 'Product Update Successfull.');
        } else {
            return redirect()->route('productEditView', $request->product_id)->with('error', $saveProduct);
        }
    }

    public function saveEditProductImage(Request $request)
    {
        $saveProduct = ProductService::saveEditProductImage($request->all());
        if ($saveProduct === true) {
            return redirect()->route('productEditView', $request->product_id)->with('success', 'Product Update Successfull.');
        } elseif ($saveProduct == 'tooLarge') {
            return redirect()->route('productEditView', $request->product_id)->with('error', 'Image Too Large. Your Image Size Must Less Than 1000KB');
        } else {
            return redirect()->route('productEditView', $request->product_id)->with('error', $saveProduct);
        }
    }

    public function removeImage(Request $request)
    {
        $removeImage = ProductService::removeImage($request->all());
        if ($removeImage == true) {
            return response()->json(['success' => true]);
        }
    }

    public function inactiveProduct($id = null)
    {
        $productInactive = ProductService::productInactive($id);
        if ($productInactive === true) {
            return response()->json(['success' => true, 'status' => "Product Inactive Successfull."]);
        } else {
            return response()->json(['error' => true, 'status' => $productInactive]);
        }
    }
    public function denyProduct($id = null)
    {
        $denyProduct = ProductService::denyProduct($id);
        return redirect()->back();
    }

    public function activeProduct($id = null)
    {
        // print_r($id) ; exit;
        $productActive = ProductService::productActive($id);
        return redirect()->back();
    }


//=======@@ End Product Section @@=======inactiveProduct
}
