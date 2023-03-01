<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //show
    public function show(){
        $contacts = Contact::get();
        return view('admin.contact.list',compact('contacts'));
    }


    //delete
    public function delete($id){
        $contact = Contact::where('id',$id)->delete();
        return back()->with(['success' => 'Message Deleted...']);
    }

    //reply
    public function reply($id,Request $request){
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            $contact = Contact::where('id',$id)->first();
            $contact->status  = 'true';
            $contact->save();

            $reply = [
                'subject' => $request->subject,
                'message' => $request->message
            ];
            Mail::to($request->sendEmail)->send(new ReplyMail($reply));
            return back()->with(['success' => 'Email Sent Successfully...']);
        } catch (\Exception $e) {
            return back()->with(['error' => 'Email Sending Failed :<...']);
        }
    }
}
