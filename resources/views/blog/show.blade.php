@extends('layouts.app')
@section('title', "Blog - {$blog->title}")

@section('meta')
    <meta property="og:url" content="{{ route('blog.show', [$blog->getSlug()]) }}"/>
    <meta property="og:site_name" content="{{ config('app.name', 'JMDev') }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $blog->title }}"/>
    <meta property="og:description" content="{{ $blog->summary }}"/>
    @if($blog->cover)
        <meta property="og:image" content="{{ $blog->cover }}"/>
        <meta name="twitter:image" content="{{ $blog->cover }}"/>
    @endif

    @if(!empty(env('TWITTER_NAME')))
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="{{ "@" . env('TWITTER_NAME') }}"/>
        <meta name="twitter:title" content="{{ $blog->title }}"/>
        <meta name="twitter:description" content="{{ $blog->summary }}"/>
        @if($blog->cover)
            <meta name="twitter:image" content="{{ $blog->cover }}"/>
        @endif
    @endif
@endsection

@section('content')
    <div class="container">
        <h3>{{ $blog->title }}
            @auth
                <a href="{{ route('admin.blog.edit', [$blog]) }}" class="ml-3" target="_blank">
                    <i class="far fa-edit"></i>
                </a>
            @endauth
        </h3>

        @if($blog->cover)
            <div class="embed-responsive embed-responsive-16by9">
                <img src="{{ $blog->cover }}" alt="{{ $blog->title }}" class="embed-responsive-item img-fluid rounded">
            </div>
        @endif

        <div class="mt-3 mw-100">
            {!! $blog->markdown_description !!}
        </div>

        @if($blog->tags && sizeof($blog->tags) > 0)
            @foreach($blog->tags as $tag)
                {!! $tag->getButton() !!}
            @endforeach
        @endif
    </div>
@endsection
