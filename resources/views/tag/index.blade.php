@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <h3>Projects <small>({{ $tag->name }})</small></h3>

        @forelse($projects ?? [] as $project)
            <div class="row mt-3">
                @include('block.content-box', ['model' => $project])
            </div>
        @empty
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">No project found...</h4>
                    </div>
                </div>
            </div>
        @endforelse


        <hr>

        <h3>Blogs <small>({{ $tag->name }})</small></h3>

        @forelse($blogs ?? [] as $blog)
            <div class="row mt-3">
                @include('block.content-box', ['model' => $blog])
            </div>
        @empty
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">No blog found...</h4>
                    </div>
                </div>
            </div>
        @endforelse

        <div class="row justify-content-center">
            {!! $blogs->render() !!}
        </div>
    </div>
@endsection
