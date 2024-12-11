<?php

namespace App\Http\Repository;

use App\Models\Office;
use Illuminate\Support\Facades\Storage;

class OfficeRepository
{
    public function get()
    {
        try {
            return Office::first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($data)
    {
        try {
            $office = Office::first();
            $office->name = $data->name;
            $office->address = $data->address;
            $office->no_telp = $data->no_telp;
            $office->email = $data->email;
            if ($data->file('image')) {
                if ($office->image) {
                    Storage::disk('public')->delete($office->image);
                }
                $file = $data->file('image');
                $path = Storage::disk('public')->put('office', $file);
                $office->image = $path;
            }
            $office->save();
            return $office;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}