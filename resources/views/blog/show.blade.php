@extends('layouts.app')
@section('title', "Blog - {$blog->title}")

@section('content')
    <div class="container">
        <h3>{{ $blog->title }}
            @auth
                <a href="{{ route('admin.blog.edit', [$blog]) }}" class="ml-3" target="_blank">
                    <i class="far fa-edit"></i>
                </a>
            @endauth
        </h3>

        <div class="embed-responsive">
            <div class="embed-responsive-16by9">
                @if(!empty($blog->cover))
                    <img src="{{ $blog->cover }}" alt="{{ $blog->title }}" class="w-100">
                @endif
            </div>
        </div>

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
