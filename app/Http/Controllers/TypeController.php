<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function index()
    {
        $data = Type::get();
        return view('admin.type', compact('data'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'array'],
            'price' => ['required', 'array'],
            'discount' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        foreach ($request->name as $idx => $value) {
            $row = Type::where('name', $request->name[$idx])->first();
            if ($row) {
                $row->update([
                    'name' => $request->name[$idx],
                    'price' => (float) $request->price[$idx],
                    'discount' => (float) $request->discount[$idx],
                    'status' => isset($request->status) && in_array($request->name[$idx], $request->status) ? true : false,
                ]);
            }
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }
}
