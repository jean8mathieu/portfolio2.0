<div class="col-md-8">
    @if(!empty($model->cover))
        <img src="{{ $model->cover }}" alt="" class="w-100 cover">
    @else
        <img src="/storage/images/assets/notfound.jpg" alt="" class="w-100 cover">
    @endif

</div>
<div class="col-md-4">
    <h3>
        @if(\App\Models\Blog::class === get_class($model))
            <a href="{{ route('blog.show', [$model]) }}" class="text-decoration-none">
                {{ $model->title }}
            </a>
        @else
            {{ $model->title }}
        @endif

    </h3>

    @if($model->tags && sizeof($model->tags) > 0)
        @foreach($model->tags as $tag)
            {!! $tag->getButton() !!}
        @endforeach
    @endif

    @if(\App\Models\Blog::class === get_class($model))
        {!! $model->getFirstParagraph() !!}
    @else
        {!! $model->markdown_description !!}
    @endif


    <div class="mt-3 row">
        @if(isset($model->url))
        <div class="col-md-6">
            <a
                href="{{ $model->url }}"
                class="btn btn-primary w-100"
                target="_blank"
                data-toggle="tooltip"
                title="View Project">
                <i class="fas fa-paperclip"></i>
            </a>
        </div>
        @endif

        @if(isset($model->repo_url))
            <div class="col-md-6">
                <a href="{{ $model->repo_url }}"
                   class="btn btn-primary w-100"
                   target="_blank"
                   data-toggle="tooltip"
                   title="View Source Code">
                    <i class="fas fa-code"></i>
                </a>
            </div>
        @endif
    </div>
</div>
