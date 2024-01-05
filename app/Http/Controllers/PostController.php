<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

    public function __construct()
    { /* comprobar que el usuario ersta identificado */
      $this->middleware('auth')->except(['publicIndex', 'view']); //restringir metodos y otros no para usuariosin autentificar
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function publicIndex()
    {
        $posts = Post::all();
        return view('allPosts', compact('posts'));
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
        $post = new Post;
        $post->title = $request->titulo;
        $post->body = $request->body;

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $post)
    {
        //
        
    }

    public function viewUpdate($post) {
        $post = Post::find($post);
        return view('posts.viewEdit', (compact('post')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        dd($request->titulo);
        
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
