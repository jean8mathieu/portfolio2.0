@if(!empty($model->cover))
    <div class="col-md-8">
        <div class="embed-responsive embed-responsive-16by9">
            <img src="{{ $model->cover }}" alt="{{ $model->title }}" class="embed-responsive-item img-fluid rounded">
        </div>
    </div>
@endif
<div class="col-md-{{empty($model->cover) ? 12 : 4}}">
    <h3>
        @if(\App\Models\Blog::class === get_class($model))
            <a href="{{ route('blog.show', [$model->getSlug()]) }}" class="text-decoration-none">
                {{ $model->title }}
            </a>
        @else
            {{ $model->title }}
        @endif
    </h3>

    @if(\App\Models\Blog::class === get_class($model))
        @include('block.blog', ['model' => $model])
    @else
        @include('block.content', ['model' => $model])
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
