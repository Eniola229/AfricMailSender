<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mails;  
use App\Models\AddUsers;  
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Mail\AfricTv;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class SendMailController extends Controller {
    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'attachments' => ['required', 'image', 'max:2048'],
            'message_head' => ['required', 'string', 'max:255'], 
            'message_body' => ['required', 'string'],
            'message_ending' => ['required', 'string','max:255'],
        ]);

          // Handle attachment upload and resizing
          if ($request->hasFile('attachments')) {
                $uploadCloudinary = cloudinary()->upload(
                    $request->file('attachments')->getRealPath(),
                    [
                        'folder' => 'africmailsender/mail_images',
                        'resource_type' => 'auto',
                        'transformation' => [
                            'quality' => 'auto',
                            'fetch_format' => 'auto',
                        ]
                    ]
                );
                $attachmentsPath = $uploadCloudinary->getSecurePath();
        } else {
            return redirect()->back()->with('status', 'Attachments Must be Uploaded');
        }


        $send = Mails::create([
            'title' => $request->title,
            'subject' => $request->subject,
            'attachments' => $attachmentsPath,
            'message_head' => $request->message_head,
            'message_body' => $request->message_body,
            'message_ending' => $request->message_ending,
        ]);

        $users = AddUsers::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new AfricTv($send));
        }

        return redirect()->back()->with('status', 'Mail Sent Successfully');
    }
}
