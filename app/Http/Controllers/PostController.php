<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    public function __construct()
    { /* comprobar que el usuario ersta identificado */
        $this->middleware('auth')->except(['publicIndex', 'view', 'postsByCategory']); //restringir metodos y otros no para usuariosin autentificar
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userPosts = Post::where('user_id', auth()->user()->id)->get();
        return view('posts.index', compact('userPosts'));
    }

    public function publicIndex()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('allPosts', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'body' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Cambiado a 'nullable'
        ]);

        $post = new Post;
        $post->title = $request->titulo;
        $post->body = $request->body;
        /* $post->author = auth()->user()->name; */
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->categoria;


        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = Storage::putFile('public/images', $request->file('imagen'));
            $nuevo_path = str_replace('public/', '', $path);
            $post->image_url = $nuevo_path;
        }

        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function view($post)
    {
        $post = Post::find($post);
        return view('posts.view', (compact('post')));
    }


    public function postsByCategory($category_id)
    {
        $category = Category::find($category_id);

        if (!$category) {
            // Manejar el caso en el que la categoría no existe
            return abort(404);
        }

        $posts = Post::where('category_id', $category_id)->get();
        $categories = Category::all();
        $postCount = $category->posts()->count();
        return view('posts.categoryPost', compact('posts', 'categories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        //

    }

    public function viewUpdate($post)
    {
        $post = Post::find($post);
        return view('posts.viewEdit', (compact('post')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $post = Post::findOrFail($id);

        $this->validate($request, [
            'titulo' => 'required|max:255',
            'body' => 'required',
            /* 'imagenw' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', */
        ]);

        $post->title = $request->titulo;
        $post->body = $request->body;
        $post->category_id = $request->categoria;

        //controlador del toggle (activo - desactivo) 
        if ($request->activo) {
            $post->active = 1;
        } else {
            $post->active = 0;
        }

        //controlador de la img  
        if ($request->imagen) {
            $file = $request->file('imagen');
            $path = Storage::putFile('public/images', $file);
            $nuevo_path = str_replace('public/', '', $path);
            $post->image_url = $nuevo_path;
            
        }

    
       /* dd($post); */

        $post->save();

        return redirect()->route('posts.index')->with('mensaje', '¡El post se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {
        /* $post = Post::find($post_id);
        dd($post->image_url);  */

        $post = Post::find($post_id);
        /* Storage::delete('file.jpg'); */
        $post->delete();

        return redirect()->route('posts.index');
    }
}
