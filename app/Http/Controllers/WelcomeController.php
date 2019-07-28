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
        return view('welcome')->with([
            'posts' => Post::all(),
            'categorias' => Category::all(),
            'tags' => Tag::all(), 
        ]);
    }
}
