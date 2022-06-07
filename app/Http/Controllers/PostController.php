<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
       $validateData = $request->validated();
        $post = Post::create([
            'title' => $validateData['title'],
            'body' =>  $validateData['body'],
            'author_name' =>  $validateData['author_name'],
        ]);

        $post->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $validateData = $request->validated();

        $post->title = $validateData['title'];
        $post->body = $validateData['body'];
        $post->author_name = $validateData['author_name'];

        $post->save();
        
        return redirect()->route('posts.show', ['post' => $post]);
       
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
