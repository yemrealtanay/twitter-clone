<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TwitController;
use App\Models\User;
use App\Models\Twit;


use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
Route::get('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
Route::get('twits/{twit}/retwit', [TwitController::class, 'retwit'])->name('twits.retwit');

Route::resource('twits', TwitController::class);

Route::get('/dashboard', function () {
    $users = User::where('id', '!=', auth()->id())->get();
    $twits = Twit::all();
    return view('dashboard', compact('twits', 'users'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
