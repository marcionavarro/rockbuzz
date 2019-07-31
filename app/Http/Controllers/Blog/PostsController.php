<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post, Request $request)
    {
        $post = Post::where('slug', $request->slug)->first();
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $categoria, Request $request)
    {
        $categoria = Category::where('slug', $request->slug)->first();

        $categoriaRedirect = $categoria->posts()->search()->simplePaginate(6);
        if($categoriaRedirect->count() <= 0 ){
            return redirect($categoriaRedirect->previousPageUrl());
        }

        return view('blog.category')->with([
            'categorias' => Category::all(),
            'categoria' => $categoria,
            'posts' =>  $categoriaRedirect,
            'tags' => Tag::all()
        ]);
    }

    public function tag(Tag $tag, Request $request)
    {
        $tag = Tag::where('slug', $request->slug)->first();

        $tagRedirect = $tag->posts()->search()->simplePaginate(6);
        if($tagRedirect->count() <= 0 ){
            return redirect($tagRedirect->previousPageUrl());
        }

        return view('blog.tag')->with([
            'tags' => Tag::all(),
            'tag' => $tag,
            'posts' => $tagRedirect,
            'categorias' => Category::all()
        ]);
    }
}
