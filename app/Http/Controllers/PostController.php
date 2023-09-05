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

        $posts = Post::where('post_type', $type)->where('post_status', 'publish')->orderBy('ID', 'DESC')->get();

        return response()->json($posts);
    }

    public function posts()
    {

        $posts = Post::get();


        return response()->json($posts);
    }

    public function post($id)
    {
        return Post::get()->where('ID', $id)->first();
    }

    public function course($id)
    {
        $meta = PostMeta::get()->where('post_id', $id);
        $metaValues = [];
        $course = Post::get()->where('ID', $id)->first();

        foreach ($meta as $key => $value) {
            $metaValues[$value['meta_key']] = $value['meta_value'];
        }
        $attachement = Post::get()->where('ID', $metaValues['_thumbnail_id'])->value('guid');
        // $meta = PostMeta::get()->where('post_id', $id)->where('meta_key', '_video')->value('meta_value');
        $video = unserialize($metaValues['_video'])['source_youtube'];

        // set up for meta data collected
        $course['thumbnail'] = $attachement;
        $course['video'] = $video;

        return $course;

    }

    /**
     * Display a listing of the resource.
     */
    public function lessons($id)
    {
        $lessons = Post::get()->where('post_type', 'lesson')->where('post_parent', $id);

        foreach ($lessons as $key => $lesson) {
            $meta = PostMeta::get()->where('post_id', $lesson['ID'])->where('meta_key', '_is_preview')->value('meta_value');


            if ($meta) {
                $lesson['is_preview'] = $meta;

            } else {
                $lesson['is_preview'] = "0";

            }

        }

        return $lessons;
    }

    public function singlelesson($id)
    {
        $meta = PostMeta::get()->where('post_id', $id);
        $metaValues = [];
        $course = Post::get()->where('ID', $id)->first();

        foreach ($meta as $key => $value) {
            $metaValues[$value['meta_key']] = $value['meta_value'];
        }
        // $attachement = Post::get()->where('ID', $metaValues['_thumbnail_id'])->value('guid');
        // $meta = PostMeta::get()->where('post_id', $id)->where('meta_key', '_video')->value('meta_value');

        // set up for meta data collected
        // $course['thumbnail'] = $attachement;
        if (array_key_exists('_is_preview', $metaValues)) {
            $course['is_preview'] = $metaValues['_is_preview'];

        } else {
            $course['is_preview'] = "0";

        }

        if (array_key_exists('_video', $metaValues)) {
            $video = unserialize($metaValues['_video'])['source_youtube'];
            $course['video'] = $video;
        }
        return $course;

    }
    public function topics($id)
    {
        return Post::get()->where('post_type', 'topics')->where('post_parent', $id);
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
