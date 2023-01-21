<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ContacstController;


Route::get('/', WelcomeController::class)->name('welcome');
// Route::post('/contact', ContactController::class);
// Route::get('send-mail', ContactController::class);
// Route::get('send-mail', [ContactController::class, 'sendMail']);


Route::get('mail', [ContactController::class, 'index'])->name('front_contact');
Route::post('send-mail', [ContactController::class, 'sendMail'])->name('sendMail');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/skills', SkillController::class);
    Route::resource('/projects', ProjectController::class);
    Route::resource('/contacts', ContacstController::class);

});

require __DIR__ . '/auth.php';
