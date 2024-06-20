<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddUsers extends Model
{
    use HasFactory;
    protected $table = "custormers";
    protected $fillable = [
        'name',
        'email',
        'plan',
    ];
}
