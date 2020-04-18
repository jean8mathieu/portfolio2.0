@extends('layouts.app')
@section('title', 'Experience')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Experience' => route('home.experience')
            ]
        ])
        <h1>Work Experiences</h1>
        <hr>
        @forelse($experiences as $experience)
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $experience->position  }} <small>at {{ $experience->company_name }}</small></h3>
                    <h6>
                        {{ \Carbon\Carbon::parse($experience->started_at)->format("M Y") }} - {{ $experience->ended_at ? \Carbon\Carbon::parse($experience->ended_at)->format('M Y') : "Present" }}
                    </h6>
                    @if($experience->location)
                        <h6>{{ $experience->location }}</h6>
                    @endif
                    <div>
                        {!! $experience->markdown_description !!}
                    </div>
                </div>
            </div>
            @if(!$loop->last)
                <hr>
            @endif
        @empty
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-danger">There's currently no experience set</h1>
                </div>
            </div>
        @endforelse
    </div>
@endsection
