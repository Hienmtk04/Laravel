<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'slug', 'status')
            ->get();
        return view('backend.topic.index', compact('list'));
    }
    public function trash()
    {
        $list = Topic::where('status', '=', 0)
            ->select('id', 'name', 'slug', 'status')
            ->get();
        return view('backend.topic.trash', compact('list'));
    }

    public function create()
    {
    }

    public function store(StoreProductRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;


        //upload file
        // if ($request->image) {
        //     $exten = $request->file('image')->extension();
        //     if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
        //         $filename =  $topic->slug . "." . $exten;
        //         $request->image->move(public_path("images/topic"), $filename);
        //         $topic->image = $filename;
        //     }
        // }

        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1; //id cua quan tri
        $topic->save();

        //Chuyển hướng trang
        return redirect()->route('admin.topic.index')->with('message','Thêm chủ đề thành công!');
    }

    public function show(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        return view('backend.topic.show', compact('topic'));
    }

    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        return view('backend.topic.edit', compact('topic'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {

        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        //upload file
        // if ($request->image) {
        //     $exten = $request->file('image')->extension();
        //     if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
        //         $filename =  $brand->slug . "." . $exten;
        //         $request->image->move(public_path("images/brand"), $filename);
        //         $brand->image = $filename;
        //     }
        // }

        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1; //id cua quan tri
        $topic->save();

        //Chuyển hướng trang
        return redirect()->route('admin.topic.index')->with('message','Cập nhật chủ đề thành công!');
    }

    public function status(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = ($topic->status == 2) ? 1 : 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1; //id cua quan tri
        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1; //id cua quan tri
        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.brand.index');
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1; //id cua quan tri
        $topic->save();
        return redirect()->route('admin.topic.index');
    }

    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash');
    }
}
