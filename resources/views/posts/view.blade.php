@extends('layouts.master')

@auth
    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    @if ($post->image_url)
                        <img class="object-cover w-full h-64 md:h-96" src="{{ asset(/* 'storage/' . */ $post->image_url) }}"
                            alt="con imagen">
                    @else
                        <img class="object-cover w-full h-64 md:h-96" src="{{ asset('images/468833.png') }}" alt="Sin imagen">
                    @endif
                    <div class="p-6">
                        <p class="mt-4 text-gray-600 dark:text-gray-300">{{ $post->categoria->name }}</p>
                        <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">{{ $post->title }}</h2>
                        <p class="mt-4 text-gray-600 dark:text-gray-300">{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endauth

@guest
    @if ($post->active)
        @section('content')
            <div class="py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                        @if ($post->image_url)
                            <img class="object-cover w-full h-64 md:h-96" src="{{ asset(/* 'storage/' . */ $post->image_url) }}"
                                alt="con imagen">
                        @else
                            <img class="object-cover w-full h-64 md:h-96" src="{{ asset('images/468833.png') }}"alt="Sin imagen">
                        @endif
                        <div class="p-6">
                            <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">{{ $post->title }}</h2>
                            <p class="mt-4 text-gray-600 dark:text-gray-300">{{ $post->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    @else
        @section('content')
            <div class="flex justify-center mt-10">
                <a href="#"
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Acceso restringido a
                        usuarios</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Perdonde las molestias</p>
                </a>
            </div>
        @endsection
    @endif
@endguest
