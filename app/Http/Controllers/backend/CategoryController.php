<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'slug', 'status', 'sort_order')
            ->get();

        //Xử lý parent_id, sort_order
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlparentid .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
        }
        return view('backend.category.index', compact('list', 'htmlparentid', 'htmlsortorder'));
    }
    public function trash()
    {
        $list = Category::where('status', '=', 0)
            ->select('id', 'image', 'name', 'slug', 'status', 'sort_order')
            ->get();
        return view('backend.category.trash', compact('list'));
    }

    public function create()
    {
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $category->slug . "." . $exten;
                $request->image->move(public_path("images/categories"), $filename);
                $category->image = $filename;
            }
        }

        $category->status = $request->status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1; //id cua quan tri
        $category->save();

        //Chuyển hướng trang
        return redirect()->route('admin.category.index')->with('message','Thêm danh mục thành công!');
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        return view('backend.category.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $list = Category::where('status', '!=', 0)
            ->select('id', 'name', 'sort_order')
            ->get();

        //Xử lý parent_id, sort_order
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($category->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='" . $row->id . "'> " . $row->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            }
            if ($category->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            }
        }
        return view('backend.category.edit', compact('list', 'htmlparentid', 'htmlsortorder', 'category'));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {

        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $category->slug . "." . $exten;
                $request->image->move(public_path("images/categories"), $filename);
                $category->image = $filename;
            }
        }

        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1; //id cua quan tri
        $category->save();

        //Chuyển hướng trang
        return redirect()->route('admin.category.index')->with('message','Cập nhật danh mục thành công!');
    }

    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1; //id cua quan tri
        $category->save();
        return redirect()->route('admin.category.index');
    }

    public function restore(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1; //id cua quan tri
        $category->save();
        return redirect()->route('admin.category.trash');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->delete();
        return redirect()->route('admin.category.trash');
    }
    public function status(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = ($category->status == 2) ? 1 : 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1; //id cua quan tri
        $category->save();
        return redirect()->route('admin.category.index');
    }
}
