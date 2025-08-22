<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Jobs\ResizeImageJob;
use Illuminate\Support\Facades\Storage;
class PhotoController extends Controller
{
    public function create()
    {
        return view('photos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $path = $request->file('image')->store('uploads/originals', 'public');

        $photo = new Photo();
        $photo->original_path = $path;
        $photo->status = 'pending';
        $photo->save();


        ResizeImageJob::dispatch($photo);

        return redirect()->route('photos.show', $photo->id)
            ->with('success', 'Rasm yuklandi resize jarayoni fonda bajarilmoqda');
    }
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }
}
