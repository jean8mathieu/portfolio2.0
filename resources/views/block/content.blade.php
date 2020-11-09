@if($model->tags && sizeof($model->tags) > 0)
    @foreach($model->tags as $tag)
        {!! $tag->getButton() !!}
    @endforeach
@endif

<div class="mw-100 mt-3">
    {!! $model->markdown_description !!}
</div>
