<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    private function findBySlug($slug){
        $post = Post::where("slug", $slug)->first();

        if(!$post) {
            abort(404);
        }

        return $post;
    }

    private function generateSlug($text){
        $toReturn = null;
        $counter = 0;

        do{
            $slug = Str::slug($text);

            if ($counter > 0) {
                $slug .= "-" . $counter;
            }

            $slug_exist = Post::where("slug", $slug)->first();

            if($slug_exist){
                $counter++;
            }else {
                $toReturn = $slug;
            }
        }while($slug_exist);

        return $toReturn;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy("created_at", "desc")->get();
        $user = Auth::user();
        $posts = $user->posts;

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|min:10",
            "content"=> "required|min:10"
        ]);

        $post = new Post();
        $post->fill($validated);
        $post->user_id = Auth::user()->id;
        
        $post->slug = $this->generateSlug($post->title);

        $post->save();
        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->findBySlug($slug);

        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = $this->findBySlug($slug);
        

        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            "title" => "required|min:10",
            "content"=> "required|min:10"
        ]);

        $post = $this->findBySlug($slug);

        if ($validated["title"] !== $post->title) {
            // genero un nuovo slug
            $post->slug = $this->generateSlug($validated["title"]);
        }

        $post->update($validated);

        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = $this->findBySlug($slug);

        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
