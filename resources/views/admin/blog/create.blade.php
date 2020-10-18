@extends('layouts.admin')
@section('title', 'Admin - Blog - Create')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Blog' => route('admin.home.index'),
                'Create' => route('admin.blog.create')
            ]
        ])

        <form action="{{ route('api.admin.blog.store') }}" id="form" method="POST" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control text-white bg-black">

            <label for="summary">Summary</label>
            <textarea id="summary" class="form-control text-white bg-black" name="summary"></textarea>

            <label for="description">Description</label>
            <textarea id="description" class="form-control text-white bg-black markdown-editor" name="description" rows="10"></textarea>

            <label for="tag">Tag</label>
            <select id="tag" name="tag[]" class="tag custom-select" multiple></select>

            <label for="cover">Cover Picture</label>
            <input id="cover" type="file" name="cover" class="form-control">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Create
            </button>
        </form>
    </div>
@endsection
