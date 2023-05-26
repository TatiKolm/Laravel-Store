<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Intervention\Image\Facades\Image;

class Product extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $fillable = ['title', 'description', 'image'];

    public function trademarks() {
        return $this->belongsToMany(Trademark::class);
    }

    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function uploadImage($file)
    {
        if ($file == null) return false;

        $originalFileName = 'image_' . $this->id . '.' .$file->extension();
        $middleFileName = 'image_' . $this->id . '_middle.' .$file->extension();
        $smallFileName = 'image_' . $this->id . '_small.' .$file->extension();


        $path = 'products/product_' . $this->id . '/';


        if(!File::exists('uploads/' . $path)){
            File::makeDirectory('uploads/' . $path);
        }


        $compressImageFull = Image::make($file);
        // $compressImage->resize(300, 200)->save();

        $compressImageFull->save('uploads/' . $path . '/' . $originalFileName, 100);

        $compressImageMiddle = Image::make($file);
        $compressImageMiddle->resize(600, null, function($constraint){
            $constraint->aspectRatio();
        })->save('uploads/' . $path . '/' . $middleFileName, 100);

        $compressImageSmall = Image::make($file);
        $compressImageSmall->resize(300, null, function($constraint){
            $constraint->aspectRatio();
        })->save('uploads/' . $path . '/' . $smallFileName, 100);


        $this->removeImage();
        $file->storeAs($path, $originalFileName, 'uploads');
        $this->image = $path . $originalFileName;
        $this->save();
    }

    public function getImage()
    {
        $image = $this->image;

        return $image ? asset('uploads/' . $image) : asset("assets/images/no-img.png");
    }

    public function removeImage()
    {
        if($this->image){
            Storage::disk("uploads")->delete($this->image);
            $this->image = null;
            $this->save();
        }
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function getPrice()
    {
        return number_format($this->price, 2, ',', ' ') . ' руб';
    }

    public function getTrademarks()
    {
        $trademarks = [];
        foreach($this->trademarks as $tr){
            $trademarks[] = '<a href="#">'.$tr->name.'</a>';
        }
        return implode(', ', $trademarks);
    }
}
