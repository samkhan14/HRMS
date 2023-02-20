<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::updateOrCreate(
            [
                'id' => $request->postId
            ],
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );

        if ($post) {
            return response()->json(['status' => 'success', 'data' => $post]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Post not created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post) {
            return response()->json(['status' => 'success', 'data' => $post]);
        }
        return response()->json(['status' => 'failed', 'message' => 'No post found']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['status' => 'success', 'data' => $post]);
    }
}
