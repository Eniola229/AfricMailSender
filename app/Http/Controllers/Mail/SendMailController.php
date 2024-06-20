<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mails;  
use App\Models\AddUsers;  
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Mail\AfricGEM;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SendMailController extends Controller {
    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'attachments' => ['required', 'image', 'max:2048'],
            'message_head' => ['required', 'string', 'max:55'], 
            'message_body' => ['required', 'string', 'max:255'],
            'message_ending' => ['required', 'string','max:255'],
        ]);

        // Handle attachment upload and resizing
        if ($request->hasFile('attachments')) {
            $attachmentsFile = $request->file('attachments');
            $attachmentsSize = $attachmentsFile->getSize();

            // Check if the attachments exceeds 2MB
            if ($attachmentsSize > 2048000) { // 2MB in bytes
                // Resize the image to reduce file size
                $image = Image::make($attachmentsFile)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                // Store the resized attachments
                $attachmentsPath = $image->store('public/attachments'); // Store the resized image
                $attachmentsPath = str_replace('public/', '', $attachmentsPath);
            } else {
                // attachments is within 2MB size limit, store it 
                $attachmentsPath = $request->file('attachments')->store('public/attachments');
                $attachmentsPath = str_replace('public/', '', $attachmentsPath);
            }
            $image_url = Storage::url($attachmentsPath);
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
            Mail::to($user->email)->send(new AfricGEM($send, $image_url));
        }

        return redirect()->back()->with('status', 'Mail Sent Successfully');
    }
}
