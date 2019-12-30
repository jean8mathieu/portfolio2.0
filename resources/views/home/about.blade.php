@extends('layouts.app')
@section('title', 'About')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'About' => route('home.about')
            ]
        ])
        <div class="row">
            <div class="col-md-12">
                {!! $aboutme  !!}

                <h1>Coding Competition</h1>
                <hr>
                <div class="mt-3">
                    <h3>DementiaHack 2014</h3>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315"
                                src="https://www.youtube.com/embed/V8IHI3kjyQY" frameborder="0"
                                allowfullscreen></iframe>
                    </div>
                </div>

                <div class="mt-3">
                    <h3>Sheridan Hackathon 2014</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315"
                                src="https://www.youtube.com/embed/w_it1ZC8Bfo" frameborder="0"
                                allowfullscreen></iframe>
                    </div>
                </div>

                <div class="mt-3">
                    <h3>Hackathought <small>(1h 56m 15s)</small></h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315"
                                src="https://www.youtube.com/embed/9moKKqj6dsQ?t=1h56m15s" frameborder="0"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
