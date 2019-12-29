@extends('layouts.admin')
@section('title')
    Admin - Tag - Edit - {{ $tag->name }}
@endsection

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Tag' => route('admin.tag.index'),
                "Edit - {$tag->name}" => route('admin.tag.edit', [$tag])
            ]
        ])

        <form action="{{ route('api.admin.tag.update', [$tag]) }}" method="POST">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ $tag->name }}">

            <label for="type">Type</label>
            <select id="type" class="form-control">
                <option></option>
                @foreach(\App\Models\Tag::$types as $key => $value)
                    <option value="{{ $key }}" {{ $key === $tag->type ? "selected" : "" }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Update
            </button>
        </form>
    </div>
@endsection
