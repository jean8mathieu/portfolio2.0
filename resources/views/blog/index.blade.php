@extends('layouts.app')
@section('title', 'Blogs')

@section('content')
    <div class="container">
        @forelse($blogs ?? [] as $blog)
            <div class="row mt-3">
                @include('block.content-box', ['model' => $blog])
            </div>
            <hr>
        @empty
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">No blog found...</h4>
                        <p>
                            We couldn't find any blog... Please make sure you add some before people come visit your
                            site
                        </p>
                    </div>
                </div>
            </div>
        @endforelse

        <div class="row justify-content-center">
            {!! $blogs->render() !!}
        </div>
    </div>
@endsection
