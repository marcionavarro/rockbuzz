<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    public function index()
    {   
        $search = request()->query('search');

        if($search){
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(6);
        }else{
            $posts = Post::search()->simplePaginate(6);
        }

        return view('welcome')->with([
            'posts' => $posts,
            'categorias' => Category::all(),
            'tags' => Tag::all(), 
        ]);
    }
}
