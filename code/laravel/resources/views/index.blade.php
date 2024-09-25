<x-layout>
    <h1>
        <span>Hello Laravel!</span>
        <div class="new">
            <a href="{{ route('create.posts') }}">新規追加</a>
        </div>
        <div class="search">
            <a href="{{ route('show.search') }}">検索</a>
        </div>
    </h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('text.posts', $post->id) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>
