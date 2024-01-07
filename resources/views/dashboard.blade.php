<x-app-layout>
    @auth
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Posts creados por: {{ Auth::user()->name }}
            </h2>
        </x-slot>

        @if ($userPosts->count())
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($userPosts as $post)
                            <a href="{{ route('posts.view', $post->id) }}"
                                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-full  h-96 md:h-20 md:w-48 ml-3"
                                    src="{{-- storage/ --}}{{ $post->image_url }}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $post->title }}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        <span
                                            style="display: inline-block;
                                                            width: 100px; 
                                                            white-space: nowrap;
                                                            overflow: hidden;
                                                            text-overflow: ellipsis; ">
                                                            {{ $post->body }}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-500 ">{{ $post->created_at->diffForHumans() }}</p>
                                    <p>Creado por: {{ $post->user->username }}</p>
                                    <p>Categoría: {{ $post->categoria->name }}</p>

                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="flex justify-center mt-10">
                <a href="{{ route('posts.index') }}"
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Aún no tienes
                        publicaciones</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-center">Empieza a crear pulsando aquí</p>
                </a>
            </div>
        @endif



    @endauth

</x-app-layout>
