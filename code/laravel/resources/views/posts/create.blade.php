<x-layout>
    <a href="{{ route('index.posts')}}" class="re">戻る</a>
    <h1>新規追加</h1>
    <form action="{{ route('store.posts')}}" method="POST">
        @csrf

        <label>
            Title
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
        <label>
            Datail
            <textarea name="detail" rows="10">{{ old('detail') }}</textarea>
        </label>
        @error('detail')
            <div class="error">{{ $message }}</div>
        @enderror
        <div class="btn"><button>新規追加</button></div>
    </form>
</x-layout>
