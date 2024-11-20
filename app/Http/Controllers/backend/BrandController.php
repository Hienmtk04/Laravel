<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'slug', 'image', 'sort_order', 'status')
            ->get();

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
        }
        return view('backend.brand.index', compact('list', 'htmlsortorder'));
    }
    public function trash()
    {
        $list = Brand::where('status', '=', 0)
            ->select('id', 'image', 'name', 'slug', 'status', 'sort_order')
            ->get();
        return view('backend.brand.trash', compact('list'));
    }

    public function create()
    {
    }

    public function store(StoreProductRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $brand->slug . "." . $exten;
                $request->image->move(public_path("images/brand"), $filename);
                $brand->image = $filename;
            }
        }

        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1; //id cua quan tri
        $brand->save();

        //Chuyển hướng trang
        return redirect()->route('admin.brand.index')->with('message','Thêm thương hiệu thành công!');
    }

    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        return view('backend.brand.show', compact('brand'));
    }

    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $list = Brand::where('status', '!=', 0)
            ->select('id', 'name', 'sort_order')
            ->get();

        //Xử lý sort_order
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($brand->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            }
        }
        return view('backend.brand.edit', compact('list', 'htmlsortorder', 'brand'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {

        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $brand->slug . "." . $exten;
                $request->image->move(public_path("images/brand"), $filename);
                $brand->image = $filename;
            }
        }

        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1; //id cua quan tri
        $brand->save();

        //Chuyển hướng trang
        return redirect()->route('admin.brand.index')->with('message','Cập nhật thương hiệu thành công!');
    }

    public function status(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = ($brand->status == 2) ? 1 : 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1; //id cua quan tri
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1; //id cua quan tri
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1; //id cua quan tri
        $brand->save();
        return redirect()->route('admin.brand.index');
    }

    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->delete();
        return redirect()->route('admin.brand.trash');
    }
}
