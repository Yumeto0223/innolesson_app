<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">授業内容編集</h2>

        <x-validation-errors :errors="$errors" />

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="rounded pt-3 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="title">単元名</label>
                <input type="text" name="title" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3" required placeholder="単元名" value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="category">教科</label>
                <select name="category" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3" required>
                    @foreach(['国語', '社会', '算数', '理科', '生活', '音楽', '図画工作', '家庭', '体育', '道徳', '外国語活動', '総合的な学習の時間', '特別活動'] as $category)
                        <option value="{{ $category }}" {{ old('category', $post->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="grade">対象学年 (1〜6年)</label>
                <input type="number" name="grade" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3" min="1" max="6" required value="{{ old('grade', $post->grade) }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="description">説明</label>
                <textarea name="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3">{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="mb-4">
                <h2 class="text-center text-lg font-bold pt-6 tracking-widest">現在のファイル</h2>
                @if ($post->file_path)
                    @if (in_array(strtolower(pathinfo($post->file_url(), PATHINFO_EXTENSION)), ['pdf']))
                        <iframe src="{{ $post->file_url() }}" width="100%" height="600px"></iframe>
                    @else
                        <img src="{{ $post->file_url() }}" alt="" class="mb-4">
                    @endif
                @else
                    <p class="text-gray-500">現在、アップロードされたファイルはありません。</p>
                @endif
            </div>

            <div class="mb-4">
                <h2 class="text-center text-lg font-bold pt-6 tracking-widest">新しいファイルをアップロード (任意)</h2>
                <label class="block text-gray-700 text-sm mb-2" for="file">ファイル (PDF, 画像)</label>
                <input type="file" name="file_path" class="border-gray-300">
                <p class="text-gray-500 text-sm">※既存のファイルを変更したい場合のみ選択してください。</p>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    更新
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
