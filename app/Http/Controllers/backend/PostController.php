<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $list = Post::where('status', '!=', 0)
            ->with(['topic:id,name'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.post.index', compact('list'));
    }
    public function trash()
    {
        $list = Post::where('status', '=', 0)
            ->with(['topic:id,name'])
            ->get();

        return view('backend.post.trash', compact('list'));
    }

    public function create()
    {
        $topic = Topic::where('status', '!=', 0)->get();

        $htmltopic = "";

        foreach ($topic as $row) {
            $htmltopic .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
        }

        return view('backend.post.create', compact('htmltopic'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $post->title . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }

        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1; //id cua quan tri
        $post->save();

        //Chuyển hướng trang
        return redirect()->route('admin.post.index')->with('message','Thêm bài viết thành công!');
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        return view('backend.post.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $topic = Topic::where('status', '!=', 0)->get();

        $htmltopic = "";

        foreach ($topic as $row) {
            if ($post->topic_id == $row->id) {
                $htmltopic .= "<option selected value='" . $row->id . "'> " . $row->name . "</option>";
            } else {
                $htmltopic .= "<option value='" . $row->id . "'> " . $row->name . "</option>";
            }
        }
        return view('backend.post.edit', compact('htmltopic', 'post'));
    }

    public function update(Request $request, string $id)
    {

        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;

        //upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename =  $post->title . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }

        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1; //id cua quan tri
        $post->save();

        //Chuyển hướng trang
        return redirect()->route('admin.post.index')->with('message','Cập nhật bài viết thành công!');
    }

    public function status(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = ($post->status == 2) ? 1 : 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1; //id cua quan tri
        $post->save();
        return redirect()->route('admin.post.index');
    }
    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 0;
        $post->updated_by = Auth::id() ?? 1; //id cua quan tri
        $post->save();
        return redirect()->route('admin.post.trash');
    }

    public function restore(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 2;
        $post->updated_by = Auth::id() ?? 1; //id cua quan tri
        $post->save();
        return redirect()->route('admin.post.trash');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->delete();
        return redirect()->route('admin.post.trash');
    }
}
