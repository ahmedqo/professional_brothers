<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function password()
    {
        return view('admin.profile.password');
    }

    public function edit()
    {
        $data = Auth::user();
        return view('admin.profile.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'unique:users,email,' . $data->id],
            'phone' => ['required', 'string', 'unique:users,phone,' . $data->id],
            'identity' => ['required', 'string', 'unique:users,identity,' . $data->id],
            'nationality' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
            'birth_date' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        User::findorfail($data->id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'identity' => $request->identity,
            'nationality' => $request->nationality,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'birthDate' => $request->birth_date,
            'gender' => $request->gender,
        ]);

        return Redirect::route('views.profile.edit')->with([
            'message' => __('Updated Successfully'),
            'type' => 'success'
        ]);
    }

    public function change(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
            'confirm_password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return Redirect::back()->with([
                'message' => __('Old password missmatch'),
                'type' => 'error'
            ]);
        }

        if ($request->new_password != $request->confirm_password) {
            return Redirect::back()->with([
                'message' => __('Confirm password missmatch'),
                'type' => 'error'
            ]);
        }

        $password = Hash::make($request->new_password);
        User::find(Auth::user()->id)->update([
            "password" => $password
        ]);

        return Redirect::route('views.profile.password')->with([
            'message' => __('Changed successfully'),
            'type' => 'success'
        ]);
    }
}
