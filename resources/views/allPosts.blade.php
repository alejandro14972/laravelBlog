@extends('layouts.master')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    @if ($post->active)
                        <a href="{{ route('posts.view', $post->id) }}"
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-20 md:w-48 md:rounded-none md:rounded-s-lg"
                                src="storage/{{ $post->image_url }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $post->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->user->username }}</p>
                                <p class="text-sm text-gray-500 ">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
