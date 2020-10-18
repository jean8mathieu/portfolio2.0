@extends('layouts.admin')
@section('title')
    Admin - Experience - Edit - {{ $experience->position }} - {{ $experience->company_name }}
@endsection

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Experience' => route('admin.experience.index'),
                "Edit - {$experience->position} - {$experience->company_name}" => route('admin.experience.edit', [$experience])
            ]
        ])

        <form action="{{ route('api.admin.experience.update', [$experience]) }}" id="form" method="PUT" enctype="multipart/form-data">
            <label for="position">Position</label>
            <input id="position" type="text" name="position" class="form-control text-white bg-black" value="{{ $experience->position }}">

            <label for="company_name">Company name</label>
            <input id="company_name" type="text" class="form-control text-white bg-black" name="company_name" value="{{ $experience->company_name }}">

            <label for="location">Location</label>
            <input id="location" type="text" class="form-control text-white bg-black" name="location" value="{{ $experience->location }}">

            <label for="description">Description</label>
            <textarea id="description" class="form-control text-white bg-black markdown-editor" name="description" rows="10">{{ $experience->description }}</textarea>

            <label for="started_at">Started at</label>
            <input id="started_at" type="date" class="form-control text-white bg-black" name="started_at" value="{{ $experience->started_at }}">

            <label for="ended_at">Ended at</label>
            <input id="ended_at" type="date" class="form-control text-white bg-black" name="ended_at" value="{{ $experience->ended_at ? $experience->ended_at : "" }}">

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Save
            </button>
        </form>

        <hr>

        <form id="form-delete" action="{{ route('api.admin.experience.destroy', [$experience]) }}" method="DELETE">
            <button type="button" class="btn btn-danger btn-delete">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </div>
@endsection
