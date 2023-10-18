<?php

namespace App\Http\Controllers;

use App\Functions\MailFn;
use App\Models\File;
use App\Models\Offer;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function home()
    {
        return view('guest.home');
    }

    public function service()
    {
        return view('guest.service');
    }

    public function price()
    {
        $data = Type::get();
        return view('guest.price', compact('data'));
    }

    public function work()
    {
        $glass = File::where('service', 'glass facade cleaning')->orderBy('id', 'DESC')->get();
        $stone = File::where('service', 'stone facade cleaning in kuwait')->orderBy('id', 'DESC')->get();
        $floor = File::where('service', 'exterior floor cleaning')->orderBy('id', 'DESC')->get();
        return view('guest.work', compact('glass', 'stone', 'floor'));
    }

    public function offer()
    {
        $data = Offer::orderBy('id', 'DESC')->get();
        return view('guest.offer', compact('data'));
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        MailFn::contact([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return Redirect::back()->with([
            'message' => __('Sent successfully'),
            'type' => 'success'
        ]);
    }
}
