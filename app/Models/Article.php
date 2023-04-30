<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'is_published'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function add(array $input)
    {
        $article = new static;
        $article->fill($input);
        $article->content = $input["text"];
        $article->category_id = $input["category"];
        $article->save();

        return $article;
    }

    public function getPublishStatus()
    {
        if($this->is_published){
            return "Да";
        }
        return "Нет";
    }

    public function uploadImage($file)
    {
        if ($file == null) return false;

        $filename = $file->getClientOriginalName();
        $path = 'articles/article_' . $this->id . '/';

        $this->removeImage();
        $file->storeAs($path, $filename, 'uploads');
        $this->image = $path . $filename;
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

}
