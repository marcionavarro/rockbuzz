<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $categoria)
    {
        return view('blog.category')->with([
            'categorias' => Category::all(),
            'categoria' => $categoria,
            'posts' => $categoria->posts()->search()->simplePaginate(6),
            'tags' => Tag::all()
        ]);
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')->with([
            'tags' => Tag::all(),
            'tag' => $tag,
            'posts' => $tag->posts()->search()->simplePaginate(6),
            'categorias' => Category::all()
        ]);
    }
}
