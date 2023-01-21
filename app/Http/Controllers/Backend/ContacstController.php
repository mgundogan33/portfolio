<?php

namespace App\Http\Controllers\Backend;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContacstController extends Controller
{
    public function index()
    {
        $mails = Mail::all();
        return view('mail.mail', compact('mails'));
    }
    public function destroy($id)
    {
        $mails = Mail::find($id);
        $mails->delete();
        return back()->with('error', 'Mail Silindi..');
    }
}
