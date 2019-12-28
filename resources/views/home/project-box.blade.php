<div class="col-md-8">
    @if($project->cover)
        <img src="{{ $project->cover }}" alt="" class="mw-100">
    @else
    <!-- Default picture -->
    @endif

</div>
<div class="col-md-4">
    <h3>{{ $project->title }}</h3>

    {{ $project->description }}

    <div class="mt-3 row">
        @if($project->url)
        <div class="col-md-6">
            <a href="{{ $project->url }}" class="btn btn-primary w-100" target="_blank">View Project</a>
        </div>
        @endif

        @if($project->repo_url)
            <div class="col-md-6">
                <a href="{{ $project->repo_url }}" class="btn btn-primary w-100" target="_blank">View Source Code</a>
            </div>
        @endif
    </div>


    @if($project->tags && sizeof($project->tags) > 0)
        @foreach($project->tags as $tag)
            <span class="badge badge-primary">{{ $tag->name }}</span>
        @endforeach
    @endif
</div>
