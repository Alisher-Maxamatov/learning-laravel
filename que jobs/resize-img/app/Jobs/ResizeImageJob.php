<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Photo;


class ResizeImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries    = 3;
    public $timeout  = 120;
    public $backoff  = 10;

    protected Photo $photo;
    public function     __construct(Photo $photo)
    {
        $this->photo = $photo;
        $this->onQueue('images');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->photo->update(['status' => 'processing']);
        $originalRel = $this->photo->original_path;
        $originalAbc = Storage::disk('public')->path(originalrel);

        $filename = pathinfo($originalRel, PATHINFO_FILENAME);
        $dir = 'uploads/processed';
        Storage::disk('public')->makeDirectory($dir);

        $sizes = [
          'thumb' => 150,
          'medium' => 600,
          'large' => 1200,
        ];
        $image = Image::make($originalAbc)
            ->orientate();
        $path = [
            'thumb' => null,
            'medium_path' => null,
            'large_path' => null,
        ];
        foreach ($sizes as $key => $with) {
            $clone = clone $image;
            $clone->resize($with, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $relative = "{$dir}/{$filename}/{$key}.jpg";
            $absolute = Storage::disk('public');
            $clone->save($absolute, 85, 'jpg');

            $field = $key . '_path';
            $path[$field] = $relative;
        }
        $this->photo->update(array_merge($path,(['status' => 'Done'])));
    }

    public function failed(\Throwable $e): void
    {
        $this->photo->update(['status' => 'failed']);
    }
}
