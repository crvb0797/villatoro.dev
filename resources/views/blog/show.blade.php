<x-app-layout>
    <div class="container pt-8 pb-32">
        <h1 class="px-2 lg:px-0 font-bold text-gray-300 mb-6">{{ $post->name }}</h1>

        {{-- <p class="px-2 lg:px-0 text-base md:text-lg text-gray-200 py-2">
            {!! Str::limit($post->body, 200, '...') !!}
        </p> --}}

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- CONTENIDO PRINCIPAL --}}
            <div class="lg:col-span-2">
                <figure class="relative">

                    <img class="rounded-xl w-full h-80 object-cover object-center" src=" @if ($post->image) {{ Storage::url($post->image->url) }} @else {{ asset('./img/default.jpg') }}@endif "
                        alt="{{ $post->name }}">

                    <div class="mb-2 absolute top-0 px-6 py-4 space-x-1">
                        @foreach ($post->tags as $tag)
                            <span
                                class="inline-block px-3 h-6 bg-{{ $tag->color }}-custom text-white rounded-full">{{ $tag->name }}</span>
                        @endforeach
                    </div>

                    <div class="absolute bottom-2 left-4 px-4 py-2 bg-metalic-900 rounded-xl">
                        <div class="flex items-center">
                            <img class="rounded-full h-9 w-9 object-cover shadow-xl border-2 border-yellow-500"
                                src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
                            <p class="font-semibold text-white text-base ml-2">{{ $post->user->name }}</p>
                        </div>
                    </div>

                    <div class="absolute bottom-2 right-4 px-4 py-2 bg-metalic-900 rounded-xl">
                        <span class="text-metalic-100">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </figure>

                <div class="content px-6 text-gray-500 text-base py-6 leading-8 mt-8 md:rounded-xl bg-white">
                    {!! $post->body !!}
                </div>
            </div>

            {{-- CONTENIDO RELACIONADO --}}
            <aside class="py-6 px-8 bg-white lg:rounded-xl shadow-xl" style="max-height: 40rem">
                <h3 class="font-bold text-gray-600 mb-6">Post Relacionados con "<span
                        class="text-yellow-500">{{ $post->category->name }}</span>"</h3>
                <ul class="space-y-6">
                    @foreach ($similares as $similar)
                        <li>
                            <a class="flex items-center" href="{{ route('blog.show', $similar) }}">
                                <img class="w-36 h-20 object-cover object-center" src="
                                                                  @if ($similar->image){{ Storage::url($similar->image->url) }}
                            @else {{ asset('./img/default.jpg') }} @endif" alt="{{ $similar->name }}">

                                <span class="ml-2 text-gray-600">{{ Str::limit($similar->name, 30, '...') }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>

    </div>
</x-app-layout>
