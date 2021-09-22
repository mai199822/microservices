<?php

namespace App\Http\Controllers;

use App\Jobs\PostCreated;
use App\Models\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return Post::all();
    }

    public function show($id){
        return Post::findOrFail($id);
    }

    public function store(Request $request){
        $post = Post::create($request->only('title','description','image'));
        PostCreated::dispatch($post->toArray());
        return response($post, 201);
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->update($request->only('title','description','image'));
        return response($post, 202);
    }

    public function destroy($id){
        Post::destroy($id);
        return response(null,204);
    }
}
