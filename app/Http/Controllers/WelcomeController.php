<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $search = request()->query('search');

        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(6);
            if ($posts->count() <= 0) {
                return redirect($posts->previousPageUrl());
            }
        } else {
            $posts = Post::search()->simplePaginate(6);
            if ($posts->count() <= 0) {
                return redirect($posts->previousPageUrl());
            }
        }

        $head = $this->seo->render(
            env('APP_NAME') . ' - Blog',
            'Entre em contato com a gente e conheça nossos diferenciais em planejamento estratégico, lançamento de produtos,
             marketing digital e desenvolvimento de webapps e apps!',
            url('/'),
            asset('img/LogoWhiteRock.png')
        );

        $postSidebar = DB::table('posts')->limit(4)->inRandomOrder()->get();

        return view('welcome')->with([
            'head' => $head,
            'posts' => $posts,
            'postSidebar' => $postSidebar,
            'categorias' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }
}
