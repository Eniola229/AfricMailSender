<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddUsers; 

class ViewUsersController extends Controller
{
    public function show(Request $request)
    {
        $users = AddUsers::all();
        
        return view('viewusers', compact('users'));
    }
}
 
