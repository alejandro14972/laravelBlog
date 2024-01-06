<?php
namespace App\Http\Controllers;

use App\Models\Post;


class DashboardController extends Controller
{
    public function index()
    {
         $userPosts = Post::where('user_id', auth()->user()->id)->get();

    return view('dashboard', compact('userPosts'));
    }

    public function __construct()
    { /* comprobar que el usuario ersta identificado */
      $this->middleware('auth'); //restringir metodos y otros no para usuariosin autentificar
    }
}