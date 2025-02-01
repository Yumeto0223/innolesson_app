<x-app-layout>
    <div class="container max-w-7xl mx-auto px-6 md:px-12 pb-6 mt-6">
        <!-- タイトル -->
        <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">
            授業指導案・資料一覧
        </h1>

        <!-- 投稿一覧 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 duration-300">
                    <a href="{{ route('posts.show', $post) }}" class="block">
                        
                        <!-- サムネイル表示（PDF or 画像） -->
                        @if (in_array(strtolower(pathinfo($post->file_url(), PATHINFO_EXTENSION)), ['pdf']))
                            <iframe src="{{ $post->file_url() }}" width="100%" height="250px" class="rounded-t-lg"></iframe>
                        @else
                            <img src="{{ $post->file_url() }}" alt="投稿画像" class="w-full h-48 object-cover rounded-t-lg">
                        @endif

                        <!-- 投稿詳細 -->
                        <div class="p-4">
                            <!-- タイトル（見切れ防止） -->
                            <h2 class="text-2xl font-bold text-blue-700 break-words line-clamp-2">
                                {{ $post->title }}
                            </h2>

                            <!-- 投稿者 -->
                            <h3 class="text-sm text-gray-600 mt-1">
                                {{ $post->user->name }}
                            </h3>

                            <!-- 投稿日時 & NEWアイコン -->
                            <p class="text-xs text-gray-500 mt-1">
                                <span class="text-red-500 font-bold">
                                    {{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}
                                </span>
                                {{ $post->created_at->format('Y-m-d H:i') }}
                            </p>

                            <!-- 教科 & 学年 -->
                            <div class="flex flex-wrap mt-2">
                                <span class="text-sm text-gray-700 bg-gray-100 px-2 py-1 rounded mr-2">
                                    教科: {{ $post->category }}
                                </span>
                                <span class="text-sm text-gray-700 bg-gray-100 px-2 py-1 rounded">
                                    対象学年: {{ $post->grade }} 年
                                </span>
                            </div>

                            <!-- 本文（50文字まで） -->
                            <p class="text-gray-700 mt-4 text-sm line-clamp-2">
                                {{ Str::limit($post->body, 50) }}
                            </p>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <!-- ページネーション -->
        <div class="mt-8 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
