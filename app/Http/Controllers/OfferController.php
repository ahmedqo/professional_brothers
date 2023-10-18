<?php

namespace App\Http\Controllers;

use App\Functions\FileFn;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function index()
    {
        $data = Offer::orderBy('id', 'DESC')->get();
        return view('admin.offer', compact('data'));
    }

    public function create(Request $request)
    {
        if (!$request->hasFile('images')) {
            return Redirect::back()->with([
                'message' => __('Atleast one image is required'),
                'type' => 'error'
            ]);
        }

        FileFn::store_offer($request->file('images'));

        return Redirect::route('views.offers.show')->with([
            'message' => __('Uploaded successfully'),
            'type' => 'success'
        ]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        foreach ($request->images as $image)
            FileFn::destroy_offer($image);

        return Redirect::route('views.offers.show')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
