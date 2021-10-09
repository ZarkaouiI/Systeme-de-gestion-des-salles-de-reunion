<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\MeetingsController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
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
    return view('home');
})->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('adminpage');

Route::get('/admin/employees', [EmployeesController::class, 'index'])->name('employees');

Route::get('/admin/rooms', [RoomsController::class, 'index'])->name('rooms');


Route::get('/meetings', [MeetingsController::class, 'index'])->name('meetings');
Route::post('/meetings', [MeetingsController::class, 'store']);

Route::delete('/meetings/{id}', [MeetingsController::class, 'destroy'])->name('deletemeeting');

Route::get('/meetings/{id}', [MeetingsController::class, 'update'])->name('modifymeeting');
Route::put('/meetings/{id}', [MeetingsController::class, 'updatemeeting']);

Route::post('/admin/rooms/add', [RoomsController::class, 'store'])->name('addroom');

Route::get('/admin/rooms/{id}', [RoomsController::class, 'update'])->name('modifyroom');
Route::put('/admin/rooms/{id}', [RoomsController::class, 'updateroom']);

Route::delete('/admin/rooms/{id}', [RoomsController::class, 'destroy'])->name('deleteroom');

Route::delete('/admin/employees/{id}', [EmployeesController::class, 'destroy'])->name('deleteemployee');

Route::get('/admin/employees/{id}', [EmployeesController::class, 'update'])->name('modifyemployee');
Route::put('/admin/employees/{id}', [EmployeesController::class, 'updateemployee']);


Route::post('/admin/employees/add', [EmployeesController::class, 'store'])->name('addemployee');


Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/rooms', [RoomsController::class, 'show'])->name('rooms.index');

//_________________________________________ResetPassword____________________________________________:

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
