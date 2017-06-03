<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Posts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Post::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $post = new Post;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->save();

        return 'Post successfully created with id ' . $post->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->save();

        return "Sucess updating post #" . $post->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $post = Post::find($request->id);

        $post->delete();

        return "Post successfully deleted #" . $request->id;
    }
}