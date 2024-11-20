<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $list = Order::where('status', '!=', 0)->get();
        return view('backend.order.index', compact('list'));
    }
    public function trash()
    {
        $list = Order::where('status', '=', 0)
            ->get();
        return view('backend.order.trash', compact('list'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }

        $order_details = OrderDetail::where('order_id', $order->id)
            ->get();

        $products = Product::whereIn('id', $order_details->pluck('product_id'))
            ->get()
            ->keyBy('id');

        return view('backend.order.show', compact('order', 'order_details', 'products'));
    }

    public function edit(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        return view('backend.order.edit', compact('order'));
    }

    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->id = $request->id;
        $order->name = $request->name;
        $order->gender = $request->gender;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->note = $request->note;

        $order->status = $request->status;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1; //id cua quan tri
        $order->save();

        //Chuyển hướng trang
        return redirect()->route('admin.order.index')->with('message','Cập nhật đơn hàng thành công!');
    }

    public function status(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = ($order->status == 2) ? 1 : 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1; //id cua quan tri
        $order->save();
        return redirect()->route('admin.order.index');
    }
    public function delete(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1; //id cua quan tri
        $order->save();
        return redirect()->route('admin.order.index');
    }

    public function restore(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id() ?? 1; //id cua quan tri
        $order->save();
        return redirect()->route('admin.order.trash');
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        OrderDetail::where('order_id', $order->id)->delete();
        $order->delete();
        return redirect()->route('admin.order.trash');
    }
}
