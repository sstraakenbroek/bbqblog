<?php

namespace App\Http\Controllers;

use App\Events\ContactCreated;
use App\Models\Contact;
use App\Mail\ContactSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        return Mail::to(env('MAIL_FROM_ADDRESS'))->send(
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
        //$this->mailNotify($contact);
        event(new ContactCreated($contact));
        $this->flash('Bericht verzonden.');

        return redirect(route('home'));
    }
}
