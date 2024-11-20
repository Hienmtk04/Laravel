<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $list = User::where('status','!=',0)->get();
        return view('backend.user.index', compact('list'));
    }
    public function trash()
    {
        $list = User::where('status', '=', 0)
            ->get();

        return view('backend.user.trash',compact('list'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1; //id cua quan tri
        $user->save();

        return redirect()->route('admin.user.index')->with('message','Thêm người dùng thành công');

    }

    public function show(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        return view('backend.user.show',compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->roles = $request->roles;
        $user->status = $request->status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1; //id cua quan tri
        $user->save();

        return redirect()->route('admin.user.index')->with('message','Cập nhật người dùng thành công');
    }

    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = ($user->status == 2) ? 1:2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1; //id cua quan tri
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1; //id cua quan tri
        $user->save();
        return redirect()->route('admin.user.trash');
    }

    public function restore(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1; //id cua quan tri
        $user->save();
        return redirect()->route('admin.user.trash');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->delete();
        return redirect()->route('admin.user.trash');
    }
}
