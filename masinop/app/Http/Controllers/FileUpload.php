<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
class FileUpload extends Controller
{
    public function createForm(){
        return view('file-upload');
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:ppt,pptx',
        ]);

        $file = new File();
        $file->name = $req->file('file')->getClientOriginalName();
        $file->file_contents = file_get_contents($req->file('file')->getRealPath());
        $file->save();

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}