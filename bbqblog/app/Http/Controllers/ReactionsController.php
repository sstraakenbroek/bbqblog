<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ReactionsController extends Controller
{
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
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $attributes = $this->validateReaction($request);
        $post->addReaction($attributes);

        $this->flash('Reactie toegevoegd.');

        return back();
    }
}
