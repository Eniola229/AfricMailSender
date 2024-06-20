<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddUsers; 


class EditUserController extends Controller
{
        public function show($id)
        {
            // Retrieve the user with the given ID
            $users = Addusers::find($id);

            // Check if user exists
            if (!$users) {
                return redirect()->back()->with('error', 'User not found');
            }

            // Return the view with user and ecounter details
            return view('edituser', compact('users'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'plan' => ['nullable', 'string', 'max:255'],
            ]);

            $user = AddUsers::find($id);

            if ($user) {
                // Update user properties
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->plan = $request->input('plan');

                $user->save();

                return redirect()->back()->with('status', 'User Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'User not found');
            }
        }

}