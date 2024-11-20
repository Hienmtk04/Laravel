<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $list = Contact::where('status', '!=', 0)->get();
        return view('backend.contact.index', compact('list'));
    }
    public function trash()
    {
        $list = Contact::where('status', '=', 0)
            ->get();
        return view('backend.contact.trash', compact('list'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }

        return view('backend.contact.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        return view('backend.contact.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->id = $request->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone; 
        $contact->title = $request->title; //không thay đổi
        $contact->content = $request->content; //không thay đổi
        $contact->reply_id = $request->reply_id;

        $contact->status = $request->status;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1; //id cua quan tri
        $contact->save();

        //Chuyển hướng trang
        return redirect()->route('admin.contact.index')->with('message', 'Cập nhật liên hệ thành công!');
    }

    public function status(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->status = ($contact->status == 2) ? 1 : 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1; //id cua quan tri
        $contact->save();
        return redirect()->route('admin.contact.index');
    }
    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1; //id cua quan tri
        $contact->save();
        return redirect()->route('admin.contact.index');
    }

    public function restore(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id() ?? 1; //id cua quan tri
        $contact->save();
        return redirect()->route('admin.contact.trash');
    }

    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->delete();
        return redirect()->route('admin.contact.trash');
    }
}
