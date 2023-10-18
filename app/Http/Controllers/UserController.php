<?php

namespace App\Http\Controllers;

use App\Functions\MailFn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->get();
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
        $data = User::findorfail($id);
        return view('admin.user.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'identity' => ['required', 'string', 'unique:users'],
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

        User::create([
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
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ]);

        MailFn::forgot($request->email);
        return Redirect::route('views.users.show')->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'unique:users,phone,' . $id],
            'identity' => ['required', 'string', 'unique:users,identity,' . $id],
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

        User::findorfail($id)->update([
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
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ]);

        return Redirect::route('views.users.show')->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        User::findorfail($id)->delete();

        return Redirect::back()->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
