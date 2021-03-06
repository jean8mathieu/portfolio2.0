@extends('layouts.admin')
@section('title', 'Admin - Tag - Create')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Tag' => route('admin.tag.index'),
                'Create' => route('admin.tag.create')
            ]
        ])

        <form action="{{ route('api.admin.tag.store') }}" id="form" method="POST">
            <label for="name" class="mt-3">Name</label>
            <input id="name" type="text" name="name" class="form-control text-white bg-black">

            <label for="type" class="mt-3">Type</label>
            <select id="type" name="type" class="form-control text-white bg-black">
                <option></option>
                @foreach(\App\Models\Tag::$types as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Create
            </button>
        </form>
    </div>
@endsection
