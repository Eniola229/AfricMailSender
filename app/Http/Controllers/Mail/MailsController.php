<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mails; 

class MailsController extends Controller
{
      public function show(Request $request)
    {
        $mails = Mails::all();
        
        return view('mails', compact('mails'));
    }
}
