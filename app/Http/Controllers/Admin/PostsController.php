<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        $categories = Category::all();

        return view('admin.posts.index', compact('posts', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Titolo obbligatorio',
                'content.required' => 'Contenuto obbligatorio',
            ],
            
        );

        $data = $request->all();

        $new_post = new Post();
        $new_post->fill($data);
        $new_post->slug = Post::generateSlug($new_post->title);
        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post){
        return view('admin.posts.show', compact('post'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post =  Post::find($id);

        $categories = Category::all();

        if ($post){
            return view('admin.posts.edit', compact('post', 'categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Titolo obbligatorio',
                'content.required' => 'Contenuto obbligatorio',
            ],
            
        );

        $form_data = $request->all();

        if ($form_data['title'] != $post->title ){
            $form_data['slug'] = Post::generateSlug($form_data['title']);
        }

        $post->update($form_data);

        return redirect()->route('admin.posts.show', $post);
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

        return redirect()->route('admin.posts.index');
    }
}
