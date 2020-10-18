@extends('layouts.app')
@section('title', "Blog - {$blog->title}")

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            {!! $blogs->render() !!}
        </div>
    </div>
@endsection
