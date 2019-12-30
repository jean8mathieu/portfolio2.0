<div class="col-md-8">
    @if(!empty($project->cover))
        <img src="{{ $project->cover }}" alt="" class="w-100">
    @else
        <img src="/storage/images/assets/notfound.jpg" alt="" class="w-100 cover">
    @endif

</div>
<div class="col-md-4">
    <h3>{{ $project->title }}</h3>

    {!! $project->markdown_description !!}


    <div class="mt-3 row">
        @if($project->url)
        <div class="col-md-6">
            <a
                href="{{ $project->url }}"
                class="btn btn-primary w-100"
                target="_blank"
                data-toggle="tooltip"
                title="View Project">
                <i class="fas fa-paperclip"></i>
            </a>
        </div>
        @endif

        @if($project->repo_url)
            <div class="col-md-6">
                <a href="{{ $project->repo_url }}"
                   class="btn btn-primary w-100"
                   target="_blank"
                   data-toggle="tooltip"
                   title="View Source Code">
                    <i class="fas fa-code"></i>
                </a>
            </div>
        @endif
    </div>


    @if($project->tags && sizeof($project->tags) > 0)
        <hr>
        @foreach($project->tags as $tag)
            <a
                href="{{ route('home.tag', [$tag]) }}"
                class="badge badge-{{ $tag->type }}"
                style="font-size: 14px"
                data-toggle="tooltip"
                title="{{ \App\Models\Tag::$types[$tag->type] }}">
                {{ $tag->name }}
            </a>
        @endforeach
    @endif
</div>
