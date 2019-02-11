@extends('layout.base')

@section('page.title', config('app.name').' - '.$post->title)
@section('masthead.title', $post->title)
@if(!empty($post->subtitle))
    @section('masthead.subtitle', $post->subtitle)
@endif
@section('masthead.meta', $post->getMeta())

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Voeg hier een nieuw BBQ Blog artikel toe.</p>
                @include('posts.includes.error')
                <form name="updatePost" id="postForm" method="POST" action="{{ route('posts.update', $post->slug) }}"
                      novalidate>
                    @method('PATCH')
                    @csrf()
                    @include('posts.forms.create-edit')
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary" id="updatePostButton">Wijzigen</button>
                    </div>
                </form>
                <form name="deletePost" id="postFormDelete" method="POST"
                      action="{{ route('posts.destroy', $post->slug) }}">
                    @method('DELETE')
                    @csrf()
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger" id="destroyPostButton">Verwijderen</button>
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