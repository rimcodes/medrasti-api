<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostMeta;

class PostController extends Controller
{
    // public $upgradedPosts = [];
    // public $posts = Post::get()->where('post_type', $type)->where('post_status', 'publish');

    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {

        $posts = Post::get()->where('post_type', $type)->where('post_status', 'publish');


        // $thumbnail = PostMeta::get()->where('post_id', $id)->where('meta_key', '_thumbnail_id')->value('meta_value);
        // $thumbnail_id = $thumbnail['meta_value'];
        // $attachement = Post::findOrFail($thumbnail_id);
        // foreach ($posts as $key => $key_value) {
        //     // $meta = PostMeta::get()->where('post_id', $key_value['ID'])->where('meta_key', '_thumbnail_id')->value('meta_value');
        //     // $attachement = Post::findOrFail($meta)->value('guid');
        //     // echo $attachement;
        //     // $key_value['guid'] = "img.png";
        // }

        return response()->json($posts);
    }

    public function loadThumbnails() {

    }

    public function posts()
    {

        $posts = Post::all();


        return response()->json($posts);
    }

    public function post($id) {
        return Post::get()->where('ID', $id)->first();
    }

    /**
     * Display a listing of the resource.
     */
    public function lessons($id)
    {
        return Post::get()->where('post_type', 'lesson')->where('post_parent', $id);
    }
    public function allLessons()
    {
        return Post::get()->where('post_type', 'lesson');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
