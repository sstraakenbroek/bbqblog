@extends('layout.base')

@section('page.title', config('app.name').' - '.$post->title)
@section('masthead.title', $post->title)
@if(!empty($post->subtitle))
    @section('masthead.subtitle', $post->subtitle)
@endif
@section('masthead.meta', $post->getMeta())

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! nl2br(e($post->description)) !!}
                </div>
                <div class="col-lg-8 col-md-10 mx-auto mt-3">
                    <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-primary">Wijzigen</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <h2 class="section-heading">Reacties ({{ $post->reactions->count() }})</h2>
                </div>
            </div>
            @if( $post->reactions->count() > 0 )
                @foreach( $post->reactions as $reaction )
                    <div class="row mt-3">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="card">
                                <h5 class="card-header">{{ $reaction->getMeta() }}</h5>
                                <div class="card-body">
                                    <p class="card-text mt-0">{!! nl2br(e($reaction->message)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row mt-3">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        Nog geen reactie geplaatst
                    </div>
                </div>
            @endif
            <div class="row mt-3">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <hr>
                    <h3>Plaats hier jouw reactie.</h3>
                    @include('posts.includes.error')
                    <form name="sentPostReaction" id="postReactionForm" method="POST"
                          action="{{ route('posts.reactions.create', $post->slug) }}" novalidate>
                        @csrf()
                        @include('posts.forms.reaction')
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-secondary" id="sendPostReactionButton">Verzenden
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/jqBootstrapValidation.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/bootstrapValidation.js') }}"></script>
@endpush