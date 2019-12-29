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
                <p>My name is Jean-Mathieu and I'm from an upper middle class family and bilingual (French & English).
                    Since 2014, I have been working on multiple projects
                    that people always been enjoying to use. I always try to make my code as efficient as possile and
                    bug free. My expertise
                    is working on the backend code of website. I have also wrote some autonomous script that could play
                    a game for me using Java.
                </p>

                <p>My technical expertise include cross-platform proficiency (Windows, Linux and Mac). The languages
                    that I'm the most fluent in
                    are PHP, HTML, CSS, Javascript, JQuery, Ajax, MySQL, Oracle SQL and Java. I have developed multiple
                    application using
                    the MVC model and I have also use CakePHP as one of my framework for Web Development.</p>

                <p>I'm always looking to learn new things that could help me to be more efficient in the making of
                    certain application. I enjoy coding
                    and I have participated to multiple hackathon</p>

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
