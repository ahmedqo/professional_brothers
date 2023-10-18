<?php

namespace App\Functions;

use App\Models\File;
use App\Models\Offer;
use Illuminate\Support\Facades\Storage;

class FileFn
{
    public static function store_service($service, $files)
    {
        foreach ($files as $file) {
            $name = substr(Storage::putFile('public/services', $file), strlen('public/services/'));
            $type = $file->getClientMimeType();
            $size = $file->getSize();

            File::create([
                'service' => $service,
                'name' => $name,
                'type' => $type,
                'size' => $size
            ]);
        }
    }

    public static function destroy_service($id)
    {
        $files = File::where('id', $id)->get();
        foreach ($files as $file) {
            if (Storage::exists('public/services/' . $file->name))
                Storage::delete('public/services/' . $file->name);
            $file->delete();
        }
    }


    public static function store_offer($files)
    {
        foreach ($files as $file) {
            $name = substr(Storage::putFile('public/offers', $file), strlen('public/offers/'));
            $type = $file->getClientMimeType();
            $size = $file->getSize();

            Offer::create([
                'name' => $name,
                'type' => $type,
                'size' => $size
            ]);
        }
    }

    public static function destroy_offer($id)
    {
        $files = Offer::where('id', $id)->get();
        foreach ($files as $file) {
            if (Storage::exists('public/offers/' . $file->name))
                Storage::delete('public/offers/' . $file->name);
            $file->delete();
        }
    }
}
