<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReactionsController extends Controller
{
    /**
     * @param string $message
     */
    private function flash(string $message)
    {
        session()->flash('message', $message);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    private function validateReaction(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]); // @TODO - custom error messages
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post)
    {
        $attributes = $this->validateReaction($request);
        $post->addReaction($attributes);

        $this->flash('Reactie toegevoegd.');

        return back();
    }
}
