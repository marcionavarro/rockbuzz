<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
<<<<<<< HEAD
        'title', 'description', 'content', 'category_id', 'published_at', 'image'
=======
        'image', 'title', 'description', 'content',  'category_id', 'published_at'
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

<<<<<<< HEAD
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

=======
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e
    /**
     * delete post image from storage
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    /**
     * check if post has tag
     *
     * @return boolean
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
