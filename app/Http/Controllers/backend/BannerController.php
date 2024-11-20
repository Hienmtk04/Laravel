<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $list = Banner::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'image', 'sort_order', 'status', 'position')
            ->get();

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
        }
        return view('backend.banner.index', compact('list', 'htmlsortorder'));
    }
    public function trash()
    {
        $list = Banner::where('status', '=', 0)
            ->select('id', 'image', 'name', 'status', 'sort_order')
            ->get();
        return view('backend.banner.trash', compact('list'));
    }

    public function create()
    {
    }

    public function store(StoreProductRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;
        $banner->description = $request->description;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $banner->name . "." . $exten;
                $request->image->move(public_path("images/banner"), $filename);
                $banner->image = $filename;
            }
        }

        $banner->status = $request->status;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1; //id cua quan tri
        $banner->save();

        //Chuyển hướng trang
        return redirect()->route('admin.banner.index')->with('message', 'Thêm banner thành công!');
    }

    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        return view('backend.banner.show', compact('banner'));
    }

    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $list = Banner::where('status', '!=', 0)
            ->select('id', 'name', 'sort_order')
            ->get();

        //Xử lý sort_order
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($banner->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            }
        }
        return view('backend.banner.edit', compact('list', 'htmlsortorder', 'banner'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {

        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $banner->slug . "." . $exten;
                $request->image->move(public_path("images/banner"), $filename);
                $banner->image = $filename;
            }
        }

        $banner->status = $request->status;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1; //id cua quan tri
        $banner->save();

        //Chuyển hướng trang
        return redirect()->route('admin.banner.index')->with('message', 'Cập nhật banner thành công!');
    }

    public function status(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = ($banner->status == 2) ? 1 : 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1; //id cua quan tri
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1; //id cua quan tri
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1; //id cua quan tri
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();
        return redirect()->route('admin.banner.trash');
    }
}
