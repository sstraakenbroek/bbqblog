@extends('layouts.base')

@section('page.title', config('app.name').' - '.$pageTitle)
@section('masthead.background', asset('storage/img/contact.jpg'))
@section('masthead.title', $pageTitle)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Laat hier een bericht achter en wij komen er zo snel mogelijk op terug.</p>
                <form name="sentMessage" id="contactForm" method="POST" action="{{ route('contact') }}" novalidate>
                    @csrf()
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Naam</label>
                            <input type="text" class="form-control" placeholder="Naam" id="name" name="name" value="{{ old('name') }}" required
                                   data-validation-required-message="Vul hier je naam in.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>E-mailaddress</label>
                            <input type="email" class="form-control" placeholder="E-mailaddress" id="email" name="email" value="{{ old('email') }}" required
                                   data-validation-required-message="Vul hier je e-mailadres in."
                                   data-validation-email-message="E-mailadres niet geldig">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Bericht</label>
                            <textarea rows="5" class="form-control" placeholder="Bericht" id="message" name="message" required
                                      data-validation-required-message="Vul hier je bericht in.">{{ old('message') }}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Verstuur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/jqBootstrapValidation.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/bootstrapValidation.js') }}"></script>
@endpush
