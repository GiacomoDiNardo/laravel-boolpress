<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return response()->json($posts);
    }

    public function show($slug) {
        $post = Post::where("slug", $slug)->first();

        $post->post_img = Storage::url($post->post_img);
        return response()->json($post);
    }
}
