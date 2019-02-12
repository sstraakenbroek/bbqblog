@extends('layouts.base')

@section('page.title', config('app.name').' - '.$pageTitle)
@section('masthead.title', $pageTitle)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Voeg hier een nieuw BBQ Blog artikel toe.</p>
                @include('posts.includes.error')
                <form name="sentPost" id="postForm" method="POST" action="{{ route('posts.index') }}" novalidate>
                    @csrf()
                    @include('posts.forms.create-edit')
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary" id="sendPostButton">Toevoegen</button>
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