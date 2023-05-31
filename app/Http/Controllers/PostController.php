<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $post  = Post::get();
        return response()->json([
            $post
        ], 200);
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->note = $request->note;
        $post->created_by = $request->created_by;
        $post->save();
        return response()->json([
            "message"=>"Note added"
        ], 200);
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
