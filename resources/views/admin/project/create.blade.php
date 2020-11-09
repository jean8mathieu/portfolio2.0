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
            <label for="title" class="mt-3">Title</label>
            <input id="title" type="text" name="title" class="form-control text-white bg-black">

            <label for="summary" class="mt-3">Summary</label>
            <textarea id="summary" class="form-control text-white bg-black" name="summary"></textarea>

            <label for="description" class="mt-3">Description</label>
            <textarea id="description" class="form-control text-white bg-black markdown-editor" name="description" rows="10"></textarea>

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
            <input id="url" type="url" name="url" class="form-control text-white bg-black">

            <label for="repository" class="mt-3">Repository</label>
            <input id="repository" type="url" name="repository" class="form-control text-white bg-black">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Create
            </button>
        </form>
    </div>
@endsection
