@extends('layouts.admin')
@section('title')
    Admin - Project - Edit - {{ $project->title }}
@endsection

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Project' => route('admin.home.index'),
                "Edit - {$project->title}" => route('admin.project.edit', [$project])
            ]
        ])

        <form action="{{ route('api.admin.project.update', [$project]) }}" id="form" method="PUT" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control text-white bg-black" value="{{ $project->title }}">

            <label for="summary" class="mt-3">Summary</label>
            <textarea id="summary" class="form-control text-white bg-black" name="summary">{{ $project->summary }}</textarea>

            <label for="description" class="mt-3">Description</label>
            <textarea id="description" class="form-control text-white bg-black markdown-editor" name="description" rows="10">{{ $project->description }}</textarea>

            <label for="tag">Tag</label>
            <select id="tag" name="tag[]" class="tag custom-select" multiple></select>

            <label for="cover" class="mt-3">
                Cover Picture
                <small>
                    (Recommend a resolution of 16:9)
                </small>
            </label>
            <input id="cover" type="file" name="cover" class="form-control">

            <label for="url" class="mt-3">Website</label>
            <input id="url" type="url" name="url" class="form-control text-white bg-black" value="{{ $project->url }}">

            <label for="repository" class="mt-3">Repository</label>
            <input id="repository" type="url" name="repository" class="form-control text-white bg-black" value="{{ $project->repo_url }}">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Update
            </button>
        </form>

        <hr>

        <form id="form-delete" action="{{ route('api.admin.project.destroy', [$project]) }}" method="DELETE">
            <button type="button" class="btn btn-danger btn-delete">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        @if(!empty($project))
            @foreach($project->tags as $tag)
                $('#tag').tokenize2().trigger('tokenize:tokens:add', ['{{ $tag->id }}', '{{ $tag->name }}', true]);
            @endforeach
        @endif
    </script>
@endsection
