<?php

namespace App\Http\Controllers;

use App\Functions\MailFn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function _auth()
    {
        return view('auth.login');
    }

    public function _forgot()
    {
        return view('auth.forgot');
    }

    public function _reset($token)
    {
        return view('auth.reset', compact('token'));
    }

    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect::route('views.profile.edit');
        }

        return Redirect::back()->with([
            'message' => __('Invalid login details'),
            'type' => 'error'
        ]);
    }

    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!MailFn::forgot($request->email)) {
            return Redirect::back()->with([
                'message' => __('The user does not exist'),
                'type' => 'error'
            ]);
        }

        return Redirect::back()->with([
            'message' => __('Please check your email for password reset instructions'),
            'type' => 'success'
        ]);
    }

    public function reset(Request $request, $token)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string'],
            'confirm_password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $row = DB::table('password_resets')->where('token', $token)->first();

        if (!$row) {
            return Redirect::back()->with([
                'message' => __('The link is invalid'),
                'type' => 'error'
            ]);
        }

        $user = User::where('email', $row->email)->first();

        if (!$user) {
            return Redirect::back()->with([
                'message' => __('The user does not exist'),
                'type' => 'error'
            ]);
        }

        if ($request->password != $request->confirm_password) {
            return Redirect::back()->with([
                'message' => __('Confirm password missmatch'),
                'type' => 'error'
            ]);
        }

        DB::table('password_resets')->where('token', $token)->delete();
        $user->password = Hash::make($request->password);
        $user->save();

        return Redirect::route("views.login.show")->with([
            'message' => __('Changed successfully'),
            'type' => 'success'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::route("views.login.show")->with([
            'message' => __('Logout successfully'),
            'type' => 'success'
        ]);
    }
}
