<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        //$this->middleware('auth')->except(['index','show']);
    }

    /**
     * @param string $message
     */
    private function flash(string $message): void
    {
        session()->flash('message', $message);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    private function validatePost(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]); // @TODO - custom error messages
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $posts = Post::with('user')->orderBy('id', 'DESC')->get();
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('posts.create', ['pageTitle' => 'Artikel toevoegen']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $create = array_merge($this->validatePost($request), $request->only(['subtitle']));
        $create['user_id'] = Auth::id();
        $post = Post::create($create);

        $this->flash(sprintf('Artikel "%s" toegevoegd', $post->title));

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post
     * @return \Illuminate\View\View
     */
    public function show(Post $post): \Illuminate\View\View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Post $post): \Illuminate\View\View
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $post);

        $update = array_merge($this->validatePost($request), $request->only(['subtitle']));
        $post->update($update);

        $this->flash(sprintf('Artikel "%s" gewijzigd', $post->title));

        return redirect(route('posts.update', $post->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $post);

        $post->reactions()->delete();
        $post->delete();

        $this->flash(sprintf('Artikel "%s" verwijderd', $post->title));

        return redirect(route('home'));
    }
}
