<x-app-layout>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts as $post)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('posts.show', $post) }}">
                        <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">{{ $post->title }}</h2>
                        <h3>{{ $post->user->name }}</h3>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            <span class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                            {{ $post->created_at }}
                        <p class="text-gray-700 ">教科: {{ $post->category }}</p>
                        <p class="text-gray-700 ">対象学年: {{ $post->grade }} 年</p>
                        </p>
                        <img class="w-full mb-2" src="{{ $post->file_path }}" alt="">
                        @if (in_array(strtolower(pathinfo($post->pdf_url(), PATHINFO_EXTENSION)), ['pdf']))
                            <iframe src="{{ $post->pdf_url() }}" width="100%" height="600px"></iframe>
                        @else
                            <img src="{{ $post->image_url() }}" alt="" class="mb-4">
                        @endif
                        <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                    </a>
                </article>
            @endforeach
            </div>
        </div>
        {{ $posts->links() }}
    </div>
</x-app-layout>
