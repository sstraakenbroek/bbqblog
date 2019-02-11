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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return Response
     */
    public function store(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]); // @TODO - custom error messages
        $post->addReaction($attributes);

        $this->flash('Reactie toegevoegd.');

        return back();
    }
}
