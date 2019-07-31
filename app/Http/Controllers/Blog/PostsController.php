<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show(Post $post, Request $request)
    {
        $post = Post::where('slug', $request->slug)->first();

        $head = $this->seo->render(
            env('APP_NAME') . ' - Post ' . $post->title,
            $post->description,
            url($post->slug),
            asset('storage/' . $post->image)
        );


        return view('blog.show')->with([
            'head' => $head,
            'post' => $post
        ]);
    }

    public function category(Category $categoria, Request $request)
    {
        $categoria = Category::where('slug', $request->slug)->first();

        $categoriaRedirect = $categoria->posts()->search()->simplePaginate(6);
        if ($categoriaRedirect->count() <= 0) {
            return redirect($categoriaRedirect->previousPageUrl());
        }

        $head = $this->seo->render(
            env('APP_NAME') . ' - Categoria ' . $categoria->name,
            'Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like',
            url($categoria->slug),
            asset('img/LogoWhiteRock.png')
        );

        $postSidebar = DB::table('posts')->limit(4)->inRandomOrder()->get();

        return view('blog.category')->with([
            'head' => $head,
            'categorias' => Category::all(),
            'categoria' => $categoria,
            'posts' =>  $categoriaRedirect,
            'postSidebar' => $postSidebar,
            'tags' => Tag::all()
        ]);
    }

    public function tag(Tag $tag, Request $request)
    {
        $tag = Tag::where('slug', $request->slug)->first();

        $tagRedirect = $tag->posts()->search()->simplePaginate(6);
        if ($tagRedirect->count() <= 0) {
            return redirect($tagRedirect->previousPageUrl());
        }

        $head = $this->seo->render(
            env('APP_NAME') . ' - Tag ' . $tag->name,
            'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below',
            url($tag->slug),
            asset('img/LogoWhiteRock.png')
        );

        $postSidebar = DB::table('posts')->limit(4)->inRandomOrder()->get();

        return view('blog.tag')->with([
            'head' => $head,
            'tags' => Tag::all(),
            'tag' => $tag,
            'posts' => $tagRedirect,
            'postSidebar' => $postSidebar,
            'categorias' => Category::all()
        ]);
    }
}
