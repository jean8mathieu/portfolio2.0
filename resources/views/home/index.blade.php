@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Projects <small>{{ isset($tag) ? "({$tag->name})" : "" }}</small></h1>

        @if(isset($projectsSlider) && sizeof($projectsSlider) > 0)
            <div id="carouselProjects" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($projectsSlider as $project)
                        <li data-target="#carouselProjects" data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->index === 0 ? "active" : "" }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">

                    @foreach($projectsSlider as $project)
                        <div class="carousel-item {{ $loop->index === 0 ? "active" : "" }}">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img src="{{ $project->cover }}" class="w-100" alt="Project's image">
                            </div>

                            <div class="carousel-caption d-none d-md-block bgo-dark">
                                <h5>{{ $project->title }}</h5>
                                <p>{{ $project->summary }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <a class="carousel-control-prev" href="#carouselProjects" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselProjects" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <hr>
        @endif

        @forelse($projects ?? [] as $project)
            <div class="row mt-3">
                @include('block.content-box', ['model' => $project])
            </div>
            <hr>
        @empty
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">No project found...</h4>
                        <p>
                            We couldn't find any project... Please make sure you add some before people come visit your
                            site
                        </p>
                    </div>
                </div>
            </div>
        @endforelse

        <div class="row justify-content-center">
            {!! $projects->render() !!}
        </div>
    </div>
@endsection
