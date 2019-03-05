<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactSend;
use Illuminate\Http\Request;

class ContactController extends Controller
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
    private function validateContact(Request $request)
    {
       return $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]); // @TODO - custom error messages
    }

    /**
     * @param \App\Models\Contact $contact
     * @return mixed
     */
    private function mailNotify(Contact $contact)
    {
        return \Mail::to('stefan@straakenbroek.nl')->send(
            new ContactSend($contact)
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('contact', ['pageTitle' => 'Contact']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $contact = Contact::create($this->validateContact($request));
        $this->mailNotify($contact);
        $this->flash('Bericht verzonden.');

        return redirect(route('home'));
    }
}
