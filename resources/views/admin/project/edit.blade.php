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
            <input id="title" type="text" name="title" class="form-control" value="{{ $project->title }}">

            <label for="summary">Summary</label>
            <textarea id="summary" class="form-control" name="summary">{{ $project->summary }}</textarea>

            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description">{{ $project->description }}</textarea>

            <label for="tag">Tag</label>
            <select id="tag" name="tag[]" class="tag custom-select" multiple></select>

            <label for="cover">Cover Picture</label>
            <input id="cover" type="file" name="cover" class="form-control">

            <label for="url">Website</label>
            <input id="url" type="url" name="url" class="form-control" value="{{ $project->url }}">

            <label for="repository">Repository</label>
            <input id="repository" type="url" name="repo_url" class="form-control" value="{{ $project->repo_url }}">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Update
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
