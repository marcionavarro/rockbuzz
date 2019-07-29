<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = ['published_at'];

    protected $fillable = [
        'user_id', 'category_id', 'image', 'title', 'description', 'content', 'published_at'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

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


    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeSearch($query)
    {
        $search = request()->query('search');
        if(!$search){
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%$search%");
    }
}
