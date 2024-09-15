<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\AddUserController;
use App\Http\Controllers\Users\ViewUsersController;
use App\Http\Controllers\Users\EditUserController;
use App\Http\Controllers\Mail\SendMailController;
use App\Http\Controllers\Mail\MailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/viewusers', function () {
    return view('viewusers');
})->middleware(['auth', 'verified'])->name('viewusers.allviews');

Route::get('/mails', function () {
    return view('mails');
})->middleware(['auth', 'verified'])->name('mails.allmails');

Route::get('/edituser', function () {
    return view('edituser');
})->middleware(['auth', 'verified'])->name('edituser.edituserprofile');


 
Route::middleware('auth')->group(function () {
    Route::post('adduser', [AddUserController::class, 'store'])->name('adduser.store');
    Route::get('viewusers', [ViewUsersController::class, 'show'])->name('viewusers.show');

    Route::post('sendmails', [SendMailController::class, 'store'])->name('sendmails.store');
    Route::get('mails', [MailsController::class, 'show'])->name('mails.show');
    Route::get('edituser/{id}', [EditUserController::class, 'show'])->name('edituser.show');
    Route::put('edituserdetails/{id}', [EditUserController::class, 'update'])->name('edituserdetails.update'); 

    Route::delete('/viewusers', [AddUserController::class, 'destroy'])->name('deleteuser.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
