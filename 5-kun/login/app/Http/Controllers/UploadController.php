<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function showImageUpload()
    {
        $uploads = Upload::where('user_id', auth()->id())
            ->where('file_type', 'image')
            ->latest()
            ->get();

        return view('admin.upload-image', compact('uploads'));
    }

    public function showFileUpload()
    {
        $uploads = Upload::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('superadmin.upload-file', compact('uploads'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        Upload::create([
            'original_name' => $file->getClientOriginalName(),
            'file_path' => $filePath,
            'file_type' => 'image',
            'file_size' => $file->getSize(),
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Rasm muvaffaqiyatli yuklandi!');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5120' // 5MB
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        Upload::create([
            'original_name' => $file->getClientOriginalName(),
            'file_path' => $filePath,
            'file_type' => 'document',
            'file_size' => $file->getSize(),
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Muvaffaqtiyatli');
    }
    public function deleteFile($id)
    {
        $upload = Upload::findOrFail($id);

        if ($upload->user_id !== auth()->id()) {
            abort(403);
        }

        Storage::disk('public')->delete($upload->file_path);

        $upload->delete();

        return redirect()->back()->with('success', 'Fayl o\'chirildi!');
    }
}
