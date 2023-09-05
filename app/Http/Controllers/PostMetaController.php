<?php


namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostMeta;
use Illuminate\Http\Request;

class PostMetaController extends Controller
{
    public function thumbnail($id)
    {
        // $thumbnail = PostMeta::get()->where('post_id', $id)->where('meta_key', '_thumbnail_id')->first();
        // $thumbnail_id = $thumbnail['meta_value'];
        // $attachement = Post::findOrFail($thumbnail_id);
        $meta = PostMeta::get()->where('post_id', $id)->where('meta_key', '_thumbnail_id')->value('meta_value');
        $attachement = Post::get()->where('ID', $meta)->value('guid');
        return $attachement;
    }

    public function video($id)
    {
        $meta = PostMeta::get()->where('post_id', $id)->where('meta_key', '_video')->value('meta_value');
        $video = unserialize($meta);

        return $video['source_youtube'];
    }

    function preview($id) {
        $meta = PostMeta::get()->where('post_id', $id)->where('meta_key', '_is_preview')->value('meta_value');
        $previewed = unserialize($meta);

        return $previewed;
    }

    // "meta_id": 7421,
    // "post_id": 8254,
    // "meta_key": "_tutor_course_price_type",
    // "meta_value": "free"
}
