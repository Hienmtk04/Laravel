<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function contact(){
        return view('frontend.contact');
    }

    public function create_contact(Request $request){
        $contact = new Contact();
        $user = Auth::user();

        $contact->user_id = $user->id;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->content = $request->content;

        $contact->status = $request->status;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->created_by = Auth::id() ?? 1; //id cua quan tri
        $contact->save();

        return redirect()->route('site.contact')->with('success', 'Lời nhắn của bạn đã được gửi thành công!');    }
}
