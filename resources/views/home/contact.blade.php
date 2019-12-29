@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Contact' => route('home.contact')
            ]
        ])
        <div class="row">
            <div class="col-md-12">
                <h1>Contact me</h1>
                <p>
                    You can contact me by email at
                    <a href="mailto:jean-mathieu.emond@jmdev.ca">
                        jean-mathieu.emond@jmdev.ca
                    </a>
                    and if you wish to have my phone number, let me know in the email. I will get back to you as soon as
                    possible.
                </p>

                <p>If you're looking for someone to build a website or an application for you. Please write a
                    descriptive email with an offer and I'll get back to you with future information.</p>
            </div>
        </div>
    </div>
@endsection
