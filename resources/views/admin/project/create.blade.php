@extends('layouts.admin')
@section('title', 'Admin - Project - Create')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Project' => route('admin.home.index'),
                'Create' => route('admin.project.create')
            ]
        ])

        <form action="{{ route('api.admin.project.store') }}" id="form" method="POST" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control text-white" style="background-color: #222">

            <label for="summary">Summary</label>
            <textarea id="summary" class="form-control text-white" style="background-color: #222" name="summary"></textarea>

            <label for="description">Description</label>
            <textarea id="description" class="form-control text-white" style="background-color: #222" name="description" rows="10"></textarea>

            <label for="tag">Tag</label>
            <select id="tag" name="tag[]" class="tag custom-select" multiple></select>

            <label for="cover">Cover Picture</label>
            <input id="cover" type="file" name="cover" class="form-control">

            <label for="url">Website</label>
            <input id="url" type="url" name="url" class="form-control text-white" style="background-color: #222">

            <label for="repository">Repository</label>
            <input id="repository" type="url" name="repository" class="form-control text-white" style="background-color: #222">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Submit
            </button>
        </form>
    </div>
@endsection
