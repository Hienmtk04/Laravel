<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    public function index()
    {
        $list = Product::where('status', '!=', 0)
            ->with(['brand:id,name', 'category:id,name'])
            ->orderBy('created_at', 'DESC')
            ->select('id', 'brand_id', 'category_id', 'image', 'name', 'slug', 'price', 'pricesale', 'status')
            ->get();

        return view('backend.product.index', compact('list'));
    }
    public function trash()
    {
        $list = Product::where('status', '=', 0)
            ->get();

        return view('backend.product.trash',compact('list'));
    }

    public function create()
    {
        $brand = Brand::where('status', '=', 1)->get();
        $category = Category::where('status', '=', 1)->get();

        $htmlbrand = "";
        $htmlcategory = "";

        foreach ($category as $row) {
            $htmlcategory .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
        }

        foreach ($brand as $row) {
            $htmlbrand .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
        }

        return view('backend.product.create', compact('htmlcategory', 'htmlbrand'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->qty = $request->qty;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }

        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1; //id cua quan tri
        $product->save();

        //Chuyển hướng trang
        return redirect()->route('admin.product.index')->with('message','Thêm sản phẩm thành công!');
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
           
        return view('backend.product.show',compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $brand = Brand::where('status', '=', 1)->get();
        $category = Category::where('status', '=', 1)->get();

        $htmlbrand = "";
        $htmlcategory = "";

        foreach ($category as $row) {
            if ($product->category_id == $row->id) {
                $htmlcategory .= "<option selected value='" . $row->id . "'> " . $row->name . "</option>";
            } else {
                $htmlcategory .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            }
        }

        foreach ($brand as $row) {
            if ($product->brand_id == $row->id) {
                $htmlbrand .= "<option selected value='" . $row->id . "'> " . $row->name . "</option>";
            } else {
                $htmlbrand .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            }
        }

        return view('backend.product.edit', compact('htmlcategory', 'htmlbrand', 'product'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->qty = $request->qty;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }

        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1; //id cua quan tri
        $product->save();

        //Chuyển hướng trang
        return redirect()->route('admin.product.index')->with('message','Cập nhật sản phẩm thành công!');
    }

    public function status(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = ($product->status == 2) ? 1:2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1; //id cua quan tri
        $product->save();
        return redirect()->route('admin.product.index');
    }
    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1; //id cua quan tri
        $product->save();
        return redirect()->route('admin.product.trash');
    }

    public function restore(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1; //id cua quan tri
        $product->save();
        return redirect()->route('admin.product.trash');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->delete();
        return redirect()->route('admin.product.trash');
    }
}
