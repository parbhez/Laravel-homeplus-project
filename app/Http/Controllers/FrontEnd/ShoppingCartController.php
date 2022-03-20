<?php
namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ShoopingCartSaveRequest;
use App\Services\FrontEnd\ShoppingCartService;
use Session;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request)
    {
        $products = array();
        if (!isset($request->product_size_id) || !isset($request->product_color_id)){
            $status = ShoppingCartService::checkProductSizeColorExists($request->all());
            if ($status == 'color'){
                return response()->json(['check'=>true,'status'=> 'Product Color Not Checked']);
            }elseif ($status == 'size'){
                return response()->json(['check'=>true,'status'=> 'Product Size Not Checked']);
            }elseif($status == 'both'){
                return response()->json(['check'=>true,'status'=> 'Product Color & Size Not Checked']);
            }
        }

        $prductInfo = ShoppingCartService::geProductDetails($request->all());
        if (count($prductInfo) < 1){
            return response()->json(['error' => true, 'status' => 'Product Not Found']);
        }
        $data = $prductInfo;
        /*shopping cart start */
        $numberOfProductInCart = Session::has('cartInfo') ? count(Session::get('cartInfo')) : 0;
        if ($numberOfProductInCart < 1) {
            $data->cart_item_id = date('Ymdhis');
            $data->quantity = 1;
            $products = array($data);
            Session::set('cartInfo', $products);
        } else {
            $notFound = 0;
            $products = Session::get('cartInfo');
            for ($i = 0; $i < $numberOfProductInCart; $i++) {
                if (isset($request->product_color_id) && isset($request->product_size_id)){
                    if ($products[$i]->product_id == $data->product_id && $products[$i]->product_wise_color_id == $data->product_wise_color_id && $products[$i]->product_wise_size_id == $data->product_wise_size_id) {
                        if ($products[$i]->quantity >= $prductInfo->quantity) {
                            return response()->json(['error' => true, 'status' => 'Product Not Available']);
                        }
                        $products[$i]->quantity += 1;
                        Session::set('cartInfo', $products);
                        $notFound = 0;
                        break;
                    } else {
                        $notFound = 1;
                    }
                }elseif (isset($request->product_color_id)){
                    if ($products[$i]->product_id == $data->product_id && $products[$i]->product_wise_color_id == $data->product_wise_color_id) {
                        if ($products[$i]->quantity >= $prductInfo->quantity) {
                            return response()->json(['error' => true, 'status' => 'Product Not Available']);
                        }
                        $products[$i]->quantity += 1;
                        Session::set('cartInfo', $products);
                        $notFound = 0;
                        break;
                    } else {
                        $notFound = 1;
                    }
                }elseif (isset($request->product_size_id)){
                    if ($products[$i]->product_id == $data->product_id && $products[$i]->product_wise_size_id == $data->product_wise_size_id) {
                        if ($products[$i]->quantity >= $prductInfo->quantity) {
                            return response()->json(['error' => true, 'status' => 'Product Not Available']);
                        }
                        $products[$i]->quantity += 1;
                        Session::set('cartInfo', $products);
                        $notFound = 0;
                        break;
                    } else {
                        $notFound = 1;
                    }
                }else{
                    if ($products[$i]->product_id == $data->product_id) {
                        if ($products[$i]->quantity >= $prductInfo->quantity) {
                            return response()->json(['error' => true, 'status' => 'Product Not Available']);
                        }
                        $products[$i]->quantity += 1;
                        Session::set('cartInfo', $products);
                        $notFound = 0;
                        break;
                    } else {
                        $notFound = 1;
                    }
                }
            } //end of for
            if ($i == $numberOfProductInCart) {
                if ($notFound == 1) {
                    $products = Session::get('cartInfo');
                    $data->cart_item_id = date('Ymdhis');
                    $data->quantity = 1;
                    array_push($products, $data);
                    Session::set('cartInfo', $products);
                }
            }
        }
        $result = $this->cartItemCalculation();
        return response()->json($result);
    }

    public function cartItemCalculation()
    {
        $totalItem = count(Session::get('cartInfo'));
        $totalTaka = 0;
        $totalQty = 0;

        foreach (Session::get('cartInfo') as $key => $value) {
            $totalTaka += $value->sale_price * $value->quantity;
            $totalQty += $value->quantity;
        }
        return array(
            'success'    => true,
            'total_item' => $totalItem,
            'total_taka' => $totalTaka,
            'total_qty'  => $totalQty
        );
    }

    public function dropFromCart(Request $request)
    {
        $products = Session::get('cartInfo');
        $products = array_values($products);
        for ($i = 0; $i < count($products); $i++) {
            if ($products[$i]->cart_item_id == $request->cart_item_id) {
                unset($products[$i]);
                Session::set('cartInfo',$products);
                break;
            }
        }
        $result = $this->cartItemCalculation();
        if (count(Session::get('cartInfo')) < 1){
            Session::forget('cartInfo');
        }
        return response()->json($result);
    }

    public function editQuantity(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $products = Session::get('cartInfo');
        for ($i = 0; $i < count($products); $i++) {
            if ($products[$i]->product_id == $productId) {
                $products[$i]->quantity = $quantity;
                Session::set('cartInfo', $products);
            }
        }
        $result = $this->cartItemCalculation();
        return response()->json($result);
    }

    public function getProductQuantity($productId = null)
    {
        $availableQuantity = ShoppingCartService::getProductQuantity($productId);
        return response()->json(['status' => true,'availableQuantity' => $availableQuantity->quantity]);
    }

    public function shoppingCartModal()
    {
        return view('frontend.shoppingCartModalLoad');
    }

    public function getMarcentWiseCityCost($cityId = null)
    {
        $costObj = ShoppingCartService::getMarcentWiseCityCost($cityId);
        if (count($costObj) > 0){
            echo $costObj->cost;
        }else{
            echo 0;
        }
    }


    public function saveShoppingCartItem(ShoopingCartSaveRequest $request)
    {
        if (! Session::has('cartInfo')) {
            return redirect()->route('userDashboard')->with('flash_error', 'No Products Place In Cart.');
        }
        $saveCart = ShoppingCartService::saveShoopingCartItem($request->all());
        if ($saveCart == true) {

            Session::forget('cartInfo');
            return redirect()->route('userDashboard')->with('flash_success', 'Order Add Successfull.');
        } else {
            return redirect()->route('userDashboard')->with('flash_error', $saveCart);
        }
    }

    public function checkout()
    {
        if (Session::has('frontendUser.id')) {
            return redirect()->route('userDashboard');
        } else {
            return redirect()->route('userLogin');
        }
    }
}










