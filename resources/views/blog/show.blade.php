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


        <div class="border-bottom border-top py-2 my-3">
            <div class="h5">
                By {{ $blog->user->username }}
            </div>
            <div>
                <span class="h5">{{ $blog->created_at->format('M d, Y') }}</span>
                <span class="h4">|</span>
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }};src=sdkpreparse" class="h4"><i class="fab fa-facebook-square color-facebook mx-2"></i></a>
                <span class="h4">|</span>
                <a target="_blank" href="https://twitter.com/share?url={{ URL::current() }}&text={{ $blog->title }}" class="h4"><i class="fab fa-twitter-square color-twitter mx-2"></i></a>
            </div>
        </div>

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

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=1773629252719660&autoLogAppEvents=1" nonce="73voWiME"></script>
@endsection
