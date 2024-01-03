<?php
namespace App\Http\Controllers;

use App\Models\Post;


class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

    public function __construct()
    { /* comprobar que el usuario ersta identificado */
      $this->middleware('auth'); //restringir metodos y otros no para usuariosin autentificar
    }
}