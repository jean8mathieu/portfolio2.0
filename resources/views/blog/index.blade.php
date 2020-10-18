@extends('layouts.app')
@section('title', 'Blogs')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            {!! $blogs->render() !!}
        </div>
    </div>
@endsection
