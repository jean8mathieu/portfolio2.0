@extends('layouts.admin')
@section('title')
    Admin - Blog - Edit - {{ $blog->title }}
@endsection

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Blog' => route('admin.home.index'),
                "Edit - {$blog->title}" => route('admin.blog.edit', [$blog])
            ]
        ])

        <form action="{{ route('api.admin.blog.update', [$blog]) }}" id="form" method="PUT" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control text-white bg-black" value="{{ $blog->title }}">

            <label for="summary">Summary</label>
            <textarea id="summary" class="form-control text-white bg-black" name="summary">{{ $blog->summary }}</textarea>

            <label for="description">Description</label>
            <textarea id="description" class="form-control text-white bg-black markdown-editor" name="description" rows="10">{{ $blog->description }}</textarea>

            <label for="tag">Tag</label>
            <select id="tag" name="tag[]" class="tag custom-select" multiple></select>

            <label for="cover">Cover Picture</label>
            <input id="cover" type="file" name="cover" class="form-control">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Update
            </button>
        </form>

        <hr>

        <form id="form-delete" action="{{ route('api.admin.blog.destroy', [$blog]) }}" method="DELETE">
            <button type="button" class="btn btn-danger btn-delete">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        @if(!empty($blog))
            @foreach($blog->tags as $tag)
                $('#tag').tokenize2().trigger('tokenize:tokens:add', ['{{ $tag->id }}', '{{ $tag->name }}', true]);
            @endforeach
        @endif
    </script>
@endsection
