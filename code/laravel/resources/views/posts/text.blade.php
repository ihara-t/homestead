<x-layout>
    <a href="{{ route('index.posts')}}" class="re">戻る</a>
    <h1>
        <span>{{ $post->title }}</span>
        <div class="new">
            <a href="{{ route('edit.posts',$post->id) }}">編集</a>
        </div>
        <form action="{{ route('destroy.posts',$post->id) }}" method="post">
            @method('DELETE')
            @csrf

            <button>削除</button>
        </form>
    </h1>
    <p>{{ $post->detail }}</p>

    <h2>Comments</h2>
    <ul>
        <li>
            <form class="comment" action="{{ route('store.comments', $post->id) }}" method="post">
                @csrf

                <input type="text" name="body">
                <button>コメント</button>
            </form>
        </li>
        @foreach ($post->comments()->latest()->get() as $comment)
        <li>
            {{ $comment->body}}
            <form class="dele" action="{{ route('destroy.comments',$comment->id) }}" method="post">
                @method('delete')
                @csrf

                <button>×</button>
            </form>
        </li>

        @endforeach
    </ul>
</x-layout>
