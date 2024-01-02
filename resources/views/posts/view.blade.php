@extends('layouts.master')


@if ($post->active)
    

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                <img class="object-cover w-full h-64 md:h-96" src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}">
                <div class="p-6">
                    <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">{{ $post->title }}</h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@else



@endif


