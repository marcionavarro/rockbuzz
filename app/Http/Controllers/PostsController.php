<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Category;
<<<<<<< HEAD
use App\Tag;
=======
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('posts.create')->with(['categorias' => Category::all(), 'tags' => Tag::all()]);
=======

        return view('posts.create')->with('categorias', Category::all());
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Uploade a imagem para armazenamento
        $image = $request->image->store('posts');
        // criar o post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category,
<<<<<<< HEAD
            'published_at' => $request->published_at,
            'image' => $image
=======
            'published_at' => $request->published_at
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        // mensagem flash
        session()->flash('success', "Post $post->title criado com sucesso");

        // redirecionar
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
<<<<<<< HEAD
        return view('posts.create')->with(['post' => $post, 'categorias' => Category::all(), 'tags' => Tag::all()]);
=======
        return view('posts.create')->with(['post' => $post, 'categorias' => Category::all()]);
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
<<<<<<< HEAD
        $data = $request->only(['title', 'description', 'content', 'category', 'published_at']);
        $post->category_id = $data['category'];
=======
        $data = $request->only(['title', 'description', 'content', 'published_at']);
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e

        // verifique se a nova imagem
        if ($request->hasFile('image')) {
            $image = $request->image->store('posts');

            // excluir imagem antiga
            $post->deleteImage();

            $data['image'] = $image;
        }

        // Atualizar tags
        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        // atualizar o post
        $post->update($data);

        // mensagem flash
        session()->flash('success', "Post $post->title atualizado com sucesso");

        // redirecionar
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
<<<<<<< HEAD
            session()->flash('success', "Post $post->title excluido permanentemente com sucesso");
=======
            session()->flash('success', "Post $post->name excluido permanentemente com sucesso");
>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e
        } else {
            $post->delete();
            session()->flash('success', "Post $post->title enviado para a lixeira com sucesso");
        }

        return redirect()->route('posts.index');
    }

    /**
     * Exibir uma lista de todas as postagens descartadas
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $trashed);
    }


    /**
     * Restaurar o post da lixeira
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        session()->flash('success', "Post $post->title restaurado com sucesso");
        return redirect()->route('posts.index');
    }
}
