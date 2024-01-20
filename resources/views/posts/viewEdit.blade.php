@extends('layouts.master')

@auth
    @section('content')
        <p class="text-center mt-5 font-bold text-white">Edición del post {{ $post->id }}</p>


        <div class="p-4 md:p-5">

            <form class="space-y-4" action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div>
                    <label for="Título" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Título</label>
                    <input type="text" name="titulo" id="Título"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" required value="{{ $post->title }}">
                </div>


                <div>
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Body</label>
                    <textarea id="body" name="body"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>{{ $post->body }}</textarea>
                </div>


                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la categoría</label>
                    <select id="countries" name="categoria"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1">Informática</option>
                        <option value="2">Social</option>
                        <option value="3">Ciencia</option>
                        <option value="4">Videojuegos</option>
                    </select>
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Imagen
                        actual</label>
                    @if ($post->image_url)
                        <img src="{{ asset('storage/' . $post->image_url) }}" alt="Imagen actual" class="mb-2 max-w-xs">
                    @else
                        <p>No hay imagen asociada</p>
                    @endif
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Editar
                        imagen</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file" name="imagen">
                </div>

                @if ($post->active)
                <div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="1" class="sr-only peer" name="activo" checked>
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Estado</span>
                    </label>
                </div>
                @else
                <div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="1" class="sr-only peer" name="activo" >
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Estado</span>
                    </label>
                </div>
                @endif

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Actualizar
                </button>



            </form>

            <button type="submit"
                class="mt-4 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Cancelar
            </button>
        </div>
    @endsection
@endauth
