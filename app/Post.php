<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image', 'title', 'description', 'content',  'category_id', 'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * excluir a imagem do storage
     *
     * @return void
     */ 
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
