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
        $attachement = Post::findOrFail($meta)->value('guid');
        return $attachement;
    }
}
