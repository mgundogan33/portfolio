<?php
namespace App\Http\Controllers;

use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required'
        ], [
            'name.required' => 'İsim Alanı Zorunludur',
            'email.required' => 'Email Alanı Zorunludur',
            'body.required' => 'Açıklama Alanı Zorunludur'
        ]);
        $maildata = new \App\Models\Mail();
        $maildata->name = $request->name;
        $maildata->email = $request->email;
        $maildata->body = $request->body;
        $maildata->save();

        \Mail::to('gundogan.mehmet33@gmail.com')->send(new sendMail($maildata));
        return back()->with('success','İşlem Başarılı.');
    }
}