<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * @param string $message
     */
    private function flash(string $message)
    {
        session()->flash('message', $message);
    }

    /**
     * @param $title
     * @return string
     */
    private function generateSlug($title)
    {
        return str_slug($title, '-'); // @TODO - check if slug is unique and slug is not a route value
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', ['pageTitle' => 'Artikel toevoegen']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]); // @TODO - custom error messages
        $create = array_merge($attributes, $request->only(['subtitle']));
        $create['user_id'] = 1; // @TODO - get from auth login
        $create['slug'] = $this->generateSlug($create['title']);
        $post = Post::create($create);

        $this->flash(sprintf('Artikel "%s" toegevoegd', $post->title));

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->only('title', 'subtitle', 'description'));

        $this->flash(sprintf('Artikel "%s" gewijzigd', $post->title));

        return redirect(route('posts.update', $post->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        $this->flash(sprintf('Artikel "%s" verwijderd', $post->title));

        return redirect(route('home'));
    }
}
