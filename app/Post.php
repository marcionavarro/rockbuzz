<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image', 'title', 'description', 'content', 'published_at'
    ];

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
