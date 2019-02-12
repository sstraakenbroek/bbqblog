@extends('layouts.base')

@section('masthead.subtitle', 'bar·be·cue (de; m; meervoud: barbecues)')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @forelse( $posts as $post )
                    <div class="post-preview">
                        <a href="/posts/{{ $post->slug }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            @if( !is_null($post->subtitle) )
                                <h3 class="post-subtitle">
                                    {{ $post->subtitle }}
                                </h3>
                            @endif
                        </a>
                        <p class="post-meta">{{ $post->getMeta() }}</p>
                    </div>
                    @if( !$loop->last )
                        <hr>
                    @endif
                @empty
                    Op dit moment zijn er nog geen berichten aanwezig.
                @endforelse
            </div>
        </div>
    </div>
@endsection