<?php

namespace App\Http\Controllers;

use App\Functions\FileFn;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class GalleryController extends Controller
{
    public function index()
    {
        $data = File::orderBy('id', 'DESC')->get();
        return view('admin.gallery', compact('data'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!$request->hasFile('images')) {
            return Redirect::back()->with([
                'message' => __('Atleast one image is required'),
                'type' => 'error'
            ]);
        }

        FileFn::store_service($request->service, $request->file('images'));

        return Redirect::route('views.gallery.show')->with([
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
            FileFn::destroy_service($image);

        return Redirect::route('views.gallery.show')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
