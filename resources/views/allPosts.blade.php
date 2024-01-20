@extends('layouts.master')

@section('content')


    <div class="flex justify-center mt-3">
        @foreach ($categories as $category)
            <a href="{{ route('posts.category', $category->id) }}"
                class="inline-block px-4 py-2 mx-2 my-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
    


    <div class="py-12" id="posts-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    @if ($post->active)
                        <a href="{{ route('posts.view', $post->id) }}"
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full  h-96 md:h-20 md:w-48 ml-3"
                                src="storage/{{ $post->image_url }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $post->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span
                                        style="display: inline-block;
                                    width: 100px; 
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis; ">{{ $post->body }}</span>
                                </p>
                                <p class="mt-4 text-gray-600 dark:text-gray-300">Tema: {{ $post->categoria->name }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->user->username }}
                                </p>
                                <p class="text-sm text-gray-500 ">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
