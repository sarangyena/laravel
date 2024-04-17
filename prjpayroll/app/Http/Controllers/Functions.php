<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;

class Functions extends Controller
{
    public function getUserName(Request $request)
    {
        $data = $request->input('role');
        $count = Employee::where('role', $data)
            ->orderBy('id', 'desc')
            ->value('id') + 1;
        $role = $data[0];
        $length = strlen($count);
        switch ($length) {
            case 1:
                return response()->json($role . '-00' . $count);
            case 2:
                return response()->json($role . '-0' . $count);
            default:
                return response()->json($role . '-' . $count);
        }
    }
    public function QR($id)
    {
        // Retrieve the image record from the database
        $image = Image::findOrFail($id);
        // Set headers to identify the response as an image
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $image->image_name . '"',
        ];

        // Output the image data
        return response()->stream(function () use ($image) {
            echo $image->qr_data;
        }, 200, $headers);
    }
}
