<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    public function index()
    {
        $list = Menu::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        $args_page = [
            ['status', '!=', 0],
            ['type', '=', 'page']
        ];
        $list_page = Post::where($args_page)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'title')
            ->get();


            $htmlparentid = "";
            foreach ($list as $row) {
                $htmlparentid .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            }

        return view('backend.menu.index', compact('list', 'list_category', 'list_brand', 'list_topic', 'list_page','htmlparentid'));
    }
    public function trash()
    {
        $list = Menu::where('status', '=', 0)
            ->get();
        return view('backend.menu.trash', compact('list'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        if (isset($request->createCategory)) {
            $list_id = $request->categoryid;
            if ($list_id) {
                foreach ($list_id as $id) {
                    $category = Category::find($id);
                    if ($category != null) {
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = $category->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'category';
                        $menu->table_id = $id;
                        $menu->position = $category->position;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1; //id cua quan tri
                        $menu->status = $category->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm Menu thành công!');
            } 
        }
        if (isset($request->createBrand)) {
            $list_id = $request->brandid;
            if ($list_id) {
                foreach ($list_id as $id) {
                    $brand = Brand::find($id);
                    if ($brand != null) {
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = $brand->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'brand';
                        $menu->table_id = $id;
                        $menu->position = $brand->position;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1; //id cua quan tri
                        $menu->status = $brand->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm Menu thành công!');
            } 
        }
        if (isset($request->createTopic)) {
            $list_id = $request->topicid;
            if ($list_id) {
                foreach ($list_id as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = $topic->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'topic';
                        $menu->table_id = $id;
                        $menu->position = $topic->position;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1; //id cua quan tri
                        $menu->status = $topic->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm Menu thành công!');
            } 
        }
        if (isset($request->createPage)) {
            $list_id = $request->pageid;
            if ($list_id) {
                foreach ($list_id as $id) {
                    $page = Post::where([['id', '=', $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu();
                        $menu->name = $page->name;
                        $menu->link = $page->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'page';
                        $menu->table_id = $id;
                        $menu->position = $page->position;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1; //id cua quan tri
                        $menu->status = $page->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm Menu thành công!');
            }
        }
        if (isset($request->createCustom)) {
            if (isset($request->name, $request->link)) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order = 0;
                $menu->parent_id = 0;
                $menu->type = 'customer';
                $menu->position = $request->position;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1; //id cua quan tri
                $menu->status = $request->status;
                $menu->save();
            }
            return redirect()->route('admin.menu.index')->with('message','Thêm Menu thành công!');
        }
    }

    public function show(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        return view('backend.menu.show', compact('menu'));
    }

    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $list = Menu::where('status', '!=', 0)
            ->get();

        //Xử lý parent_id, sort_order
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($menu->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='" . $row->id . "'> " . $row->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            }
            if ($menu->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:  " . $row->name . "</option>";
            }
        }
        return view('backend.menu.edit', compact('list', 'htmlparentid', 'htmlsortorder', 'menu'));
    }

    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->type = $request->type;
        $menu->parent_id = $request->parent_id;
        $menu->sort_order = $request->sort_order;
        $menu->position = $request->position;


        $menu->status = $request->status;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1; //id cua quan tri
        $menu->save();

        //Chuyển hướng trang
        return redirect()->route('admin.menu.index')->with('message','Cập nhật Menu thành công!');
    }

    public function status(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = ($menu->status == 2) ? 1 : 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1; //id cua quan tri
        $menu->save();
        return redirect()->route('admin.menu.index');
    }
    public function delete(string $id)
    {
        $menu = menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1; //id cua quan tri
        $menu->save();
        return redirect()->route('admin.menu.index');
    }

    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1; //id cua quan tri
        $menu->save();
        return redirect()->route('admin.menu.trash');
    }

    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->delete();
        return redirect()->route('admin.menu.trash');
    }
}
