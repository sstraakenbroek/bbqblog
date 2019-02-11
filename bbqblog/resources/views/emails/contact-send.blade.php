@component('mail::message')
# Nieuw bericht van: {{ $contact->name }} <{{ $contact->email }}>

{!! nl2br(e($contact->message)) !!}
@endcomponent
