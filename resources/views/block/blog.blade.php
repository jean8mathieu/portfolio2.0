<div class="mw-100">
    {{ $model->summary }}
</div>

<div class="mt-3">
@if($model->tags && sizeof($model->tags) > 0)
    @foreach($model->tags as $tag)
        {!! $tag->getButton() !!}
    @endforeach
@endif
</div>
