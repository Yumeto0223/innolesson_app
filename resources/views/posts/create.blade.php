<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">授業内容登録</h2>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-2" role="alert">
                <p>
                    <b>{{ count($errors) }}件のエラーがあります。</b>
                </p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="title">単元名</label>
                <input type="text" name="title" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3" required placeholder="単元名" value="{{ old('title') }}">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="category">教科</label>
                <select name="category" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3" required>
                    <option value="国語">国語</option>
                    <option value="社会">社会</option>
                    <option value="算数">算数</option>
                    <option value="理科">理科</option>
                    <option value="生活">生活</option>
                    <option value="音楽">音楽</option>
                    <option value="図画工作">図画工作</option>
                    <option value="家庭">家庭</option>
                    <option value="体育">体育</option>
                    <option value="道徳">道徳</option>
                    <option value="外国語活動">外国語活動</option>
                    <option value="総合的な学習の時間">総合的な学習の時間</option>
                    <option value="特別活動">特別活動</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="grade">対象学年 (1〜6年)</label>
                <input type="number" name="grade" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3" min="1" max="6" required value="{{ old('grade') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="description">説明</label>
                <textarea name="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <h2 class="text-center text-lg font-bold pt-6 tracking-widest">指導案・資料をアップロード</h2>
                <label class="block text-gray-700 text-sm mb-2" for="file">ファイル (PDF, 画像)</label>
                <input type="file" name="file_path" class="border-gray-300">
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    アップロード
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
