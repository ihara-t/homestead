<x-layout>
    <a href="{{ route('index.posts') }}" class="re">戻る</a>
    <h1>検索画面</h1>

    <p>Title検索</p>
    <form action="{{ route('search.posts') }}" method="POST">
        @csrf
        <input type="text" name="keyword" placeholder="入力" value="{{ old('keyword', request('keyword')) }}">
        <button type="submit" class="search_btn">検索</button>
    </form>

    <h2>検索結果</h2>

    @if(isset($posts))
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('text.posts', $post->id) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>

        @if($posts->isEmpty())
            <p>該当する投稿がありません。</p>
        @endif
    @endif
</x-layout>
