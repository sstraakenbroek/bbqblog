<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactSend;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @param string $message
     */
    private function flash(string $message)
    {
        session()->flash('message', $message);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contact', ['pageTitle' => 'Contact']);
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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]); // @TODO - custom error messages
        $contact = Contact::create($attributes);

        \Mail::to('stefan@straakenbroek.nl')->send(
            new ContactSend($contact)
        );

        $this->flash('Bericht verzonden.');

        return redirect(route('home'));
    }
}
