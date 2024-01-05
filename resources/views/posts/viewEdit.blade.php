@extends('layouts.master')

@auth
    @section('content')

    <p class="text-center mt-5 font-bold text-white">Edición del post {{ $post->id }}</p>


    <div class="p-4 md:p-5">

        <form class="space-y-4" action="{{ route('posts.update',  $post->id) }}" method="put"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="Título"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Título</label>
                <input type="text" name="titulo" id="Título"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="" required value="{{$post->title}}">
            </div>


            <div>
                <label for="body"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Body</label>
                <textarea id="body" name="body"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required >{{$post->body}}</textarea>
            </div>


            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Imagen actual</label>
                @if($post->image_url)
                    <img src="{{ asset('storage/' . $post->image_url) }}" alt="Imagen actual" class="mb-2 max-w-xs">
                @else
                    <p>No hay imagen asociada</p>
                @endif
            </div>
            
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Editar imagen</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" name="imagen">
            </div>
            
            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Actualizar
            </button>

            <button type="submit"
                class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancelar
            </button>

        </form>
    </div>
    @endsection
@endauth


