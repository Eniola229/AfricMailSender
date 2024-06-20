<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\AddUsers;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class AddUserController extends Controller
{
    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:custormers,email'],
            'plan' => ['nullable', 'string', 'max:255'],
        ]);

        $add = AddUsers::create([
            'name' => $request->name,
            'email' => $request->email,
            'plan' => $request->plan,
        ]);

        return redirect()->back()->with('status', 'User Successfully Added'); 
    } 


    public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        $userId = $request->input('user_id');
        $user = AddUsers::find($userId);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('status', 'User Successfully Deleted');
        } else {
            return redirect()->back()->with('status', 'User Not Found');
        }
    }
}