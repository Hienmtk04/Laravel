<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
    public function index()
    {
        $cart_list = session('cart', []);
        return view('frontend.cart', compact('cart_list'));
    }
    public function addcart()
    {
        $productid = $_GET['productid'];
        $qty = $_GET['qty'];
        $product = Product::find($productid);
        $cart_item = array(
            'id' => $productid,
            'name' => $product->name,
            'image' => $product->image,
            'price' => ($product->pricesale) > 0 ? $product->pricesale : $product->price,
            'qty' => $qty
        );
        $cart = session('cart', []);
        if (is_array($cart) && count($cart) == 0) {
            array_push($cart, $cart_item);
        } else {
            $check_exist = true;
            foreach ($cart as $key => $item) {
                if (in_array($productid, $item)) {
                    $cart[$key]['qty'] += $qty;
                    $check_exist = false;
                    break;
                }
            }
            if ($check_exist == true) {
                array_push($cart, $cart_item);
            }
        }

        session(['cart' => $cart])->with('message','Thêm giỏ hàng thành công!');
        echo count(session(['cart', []]));
    }
    public function update(Request $request)
    {
        $carts = session('cart', []);
        $list_qty = $request->qty;
        foreach ($carts as $keys => $cart) {
            foreach ($list_qty as $productid => $qtyvalue) {
                if ($carts[$keys]['id'] == $productid) {
                    $carts[$keys]['qty'] = $qtyvalue;
                }
            }
        }
        session(['cart' => $carts]);
        return redirect()->route('site.cart.index')->with('message','Cập nhật giỏ hàng thành công!');
    }

    public function delete($id)
    {
        $carts = session('cart', []);
        foreach ($carts as $keys => $cart) {
            if ($carts[$keys]['id'] == $id) {
                unset($carts[$keys]);
            }
        }
        session(['cart' => $carts]);
        return redirect()->route('site.cart.index')->with('error','Đã xóa sản phẩm!');
    }
    public function checkout()
    {
        $list_cart = session('cart', []);
        return view('frontend.checkout', compact('list_cart'));
    }
    public function docheckout(Request $request)
    {
        $user = Auth::user();
        $carts = session('cart', []);

        if (count($carts) > 0) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->name = $request->name;
            $order->gender = $request->gender;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->note = $request->note;
            $order->created_at = date('Y-m-d H:i:s');
            $order->type = 'online';
            $order->status = 2;
            if ($order->save()) {
                foreach ($carts as $cart) {
                    $orderdetail = new OrderDetail();
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $cart['id'];
                    $orderdetail->price = $cart['price'];
                    $orderdetail->qty = $cart['qty'];
                    $orderdetail->discount = 0;
                    $orderdetail->amount = $cart['price'] * $cart['qty'];
                    $orderdetail->save();
                }
            }
            session(['cart' => []]);
        }
        return view('frontend.checkout_message');
    }
}
