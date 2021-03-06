@extends('layouts.admin')
@section('title', 'Admin - Experience - Create')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Experience' => route('admin.experience.index'),
                'Create' => route('admin.experience.create')
            ]
        ])

        <form action="{{ route('api.admin.experience.store') }}" id="form" method="POST" enctype="multipart/form-data">
            <label for="position" class="mt-3">Position</label>
            <input id="position" type="text" name="position" class="form-control text-white bg-black">

            <label for="company_name" class="mt-3">Company name</label>
            <input id="company_name" type="text" class="form-control text-white bg-black" name="company_name">

            <label for="location" class="mt-3">Location</label>
            <input id="location" type="text" class="form-control text-white bg-black" name="location">

            <label for="description" class="mt-3">Description</label>
            <textarea id="description" class="form-control text-white bg-black markdown-editor" name="description" rows="10"></textarea>

            <label for="started_at" class="mt-3">Started at</label>
            <input id="started_at" type="date" class="form-control text-white bg-black" name="started_at">

            <label for="ended_at" class="mt-3">Ended at</label>
            <input id="ended_at" type="date" class="form-control text-white bg-black" name="ended_at">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Create
            </button>
        </form>
    </div>
@endsection
