<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Sentinel;
use Reminder;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    public function index()
    {
        return view('auth.passwords.forgotpassword');
    }

    // public function restore(Request $request)
    // {
    //     $user = User::where('email', '=', $request->email);

    //     if($user == null){
    //         return redirect()->back()->with(['error' => 'Cet utilisateur est introuvable']);
    //     }

    //     Mail::to($request->email)->send(new ResetPassword());

    //     return redirect()->back()->with(['success' => 'Le lien pour réinitialiser votre mot de passe a été envoyé à votre adresse mail']);
    // }

    // public function reset($email)
    // {
    //     $user = User::whereEmail($email)->first();

    //     if($user == null) {
    //         echo 'This user does not exist!';
    //     }

    //     $user = Sentinel::findById($user->id);

    //     return view('auth.passwords.resetpassword')->with(['user' => $user]);
    // }

    // public function resetPassword(Request $request)
    // {
    //     $this->validate($request, [
    //         'password' => 'required|min:8|confirmed',
    //         'password_confirmation' => 'required|min:8'
    //     ]);
    // }

    public function restore(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if($user == null) {
            return redirect()->back()->with(['error' => 'This user does not exist!']);
        }

        $user = Sentinel::findById($user->id);
        // $reminder = Reminder::exists($user) ? : Reminder::create($user);
        // $this->sendEmail($user, $reminder);
        $this->sendEmail($user);

        return redirect()->back()->with(['success' => 'The reset password link has been sent to your email']);
    }

    public function sendEmail($user)
    {
        Mail::send(
            'emails.forgot',
            ['user' => $user],
            function($message) use($user){
                $message->to($user->email);
                $message->subject("$user->name, reset your password");
            }
        );
    }

    public function reset($email)
    {
        $user = User::whereEmail($email)->first();

        if($user == null) {
            echo 'This user does not exist!';
        }

        $user = Sentinel::findById($user->id);

        return view('auth.passwords.resetpassword')->with(['user' => $user]);
    }

    public function resetPassword(Request $request, $email)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        $user = User::whereEmail($email)->first();
        if($user === null) {
            return redirect()->back()->with(['error' => 'This user does not exist!']);
        }

        // $user = Sentinel::findById($user->id);
        $user = User::find($user->id);
        // dd($user->name);
        $user->password = Hash::make($request->password);

        $user->save();

        // $user->passowrd = Hash::make($request->password);

        return redirect('/login')->with('success', 'Password reseted. Login with the new one bro!');
    }
}
