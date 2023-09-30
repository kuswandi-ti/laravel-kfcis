<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Mail\AdminSendResetLinkMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\AdminAuthLoginRequest;
use App\Http\Requests\Admin\AdminAuthResetPasswordRequest;
use App\Http\Requests\Admin\AdminAuthSendResetLinkRequest;

class AdminAuthController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function handleRegister()
    {
        //
    }

    public function registerVerify($token)
    {
        $admin = User::where('register_token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($admin)) {
            if (!$admin->email_verified_at) {
                $admin->email_verified_at = now();
                $admin->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('admin.login')->with('success', $message);
    }

    public function login()
    {
        Session::put('url.intended', URL::previous());

        if (!Auth::check()) {
            return view('admin.auth.login');
        } else {
            // return redirect()->route('admin.dashboard.index');
            return Redirect::to(Session::get('url.intended'));
        }
    }

    public function handleLogin(AdminAuthLoginRequest $request)
    {
        $request->authenticate();

        // return redirect()->route('admin.dashboard.index');
        return Redirect::to(Session::get('url.intended'));
    }

    public function forgotPassword()
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLink(AdminAuthSendResetLinkRequest $request)
    {
        $token = Str::random(64);

        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendResetLinkMail($token, $request->email));

        return redirect()->back()->with('success', __('admin.A mail has been sent to your email address. Please check your email.'));
    }

    public function resetPassword($token)
    {
        return view('admin.auth.reset-password', compact('token'));
    }

    public function handleResetPassword(AdminAuthResetPasswordRequest $request)
    {
        $admin = User::where([
            'email' => $request->email,
            'remember_token' => $request->token,
        ])->first();

        if (!$admin) {
            return back()->with('error', __('admin.Token is invalid !'));
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success', __('admin.Password reset successfully. Please login first'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
