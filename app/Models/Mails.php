<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    use HasFactory;

    protected $table = "mails";

    protected $fillable = [
        'subject',
        'title',
        'message_head',
        'message_body',
        'message_ending',
        'attachments',
    ];
}
