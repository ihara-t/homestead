<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    // private $posts = [
    //     'Model',
    //     'View',
    //     'Controller',
    // ];

    public function index() {
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at','desc')->get();
        $posts = Post::latest()->get();

        return view('index')->with(['posts'=> $posts]);
    }

    public function text($id) {
        $post = Post::findOrFail($id);

        return view('posts.text')->with(['post'=> $post]);
    }

    // public function text($id) {
    //     $post = Post::findOrFail($id);
    //     return view('posts.text')->with(['post' => $post]);
    // }


    //新規追加ページへの遷移
    public function create() {
        return view('posts.create');
    }

    //新規追加機能
    public function store(PostRequest $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();

        return redirect()->route('index.posts');
    }

    //更新ページへの遷移
    public function edit($id) {
        $post = Post::findOrFail($id);

        return view('posts.edit')->with(['post'=> $post]);
    }

    //入力した内容の更新
    public function update(PostRequest $request,$id) {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();

        return redirect()->route('text.posts',$post->id);
    }

    //入力したページの削除
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('index.posts',$post->id);
    }

    //検索ページへの遷移
    public function showSearchForm() {
        return view('search');
    }

    //検索機能の追加
    public function search(Request $request) {
        $keyword = $request->input('keyword');

        $posts = Post::where('title', 'LIKE', "%{$keyword}%")
                    ->get();

        return view('search')->with(['posts' => $posts]);
    }


}
