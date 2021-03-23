<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Category;
use App\Tag;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create')->with(['categorias' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        // Uploade a imagem para armazenamento
        $image = $request->image->store('posts');

        // criar o post
         $post = Post::create([
             'user_id' => auth()->user()->id,
             'category_id' => $request->category,
             'title' => $request->title,
             'slug' => str_slug($request->title),
             'description' => $request->description,
             'content' => $request->input('content'),
             'image' => $image,
             'published_at' => $request->published_at
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
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with(['post' => $post, 'categorias' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->only(['title', 'description', 'content', 'category', 'published_at']);
        $post->slug = str_slug($request->title);
        $post->category_id = $data['category'];

        // verifique se a nova imagem
        if ($request->hasFile('image')) {
            $image = $request->image->store('posts');

            // excluir imagem antiga
            $post->deleteImage();

            $data['image'] = $image;
        }

        // Atualizar tags
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        // atualizar o post
        $post->update($data);

        // mensagem flash
        session()->flash('success', "Post $post->title atualizado com sucesso");

        // redirecionar
        return redirect()->route('posts.index');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('file')->storeAs('uploads', $filenametostore);

            // you can save image path below in database
            $path = asset('storage/uploads/' . $filenametostore);

            echo $path;
            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();

            session()->flash('success', "Post $post->title excluido permanentemente com sucesso");
        } else {
            $post->delete();
            session()->flash('success', "Post $post->title enviado para a lixeira com sucesso");
        }

        return redirect()->route('posts.index');
    }

    /**
     * Exibir uma lista de todas as postagens descartadas
     *
     * @return View
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts', $trashed);
    }


    /**
     * Restaurar o post da lixeira
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        session()->flash('success', "Post $post->title restaurado com sucesso");
        return redirect()->route('posts.index');
    }
}
