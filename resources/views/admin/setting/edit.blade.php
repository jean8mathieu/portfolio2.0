@extends('layouts.admin')
@section('title')
    Admin - Setting - Edit - {{ $setting->name }}
@endsection

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Setting' => route('admin.setting.index'),
                "Edit - {$setting->key}" => route('admin.setting.edit', [$setting])
            ]
        ])

        <form action="{{ route('api.admin.setting.update', [$setting]) }}" id="form" method="PUT">
            <label for="name">Key</label>
            <input id="name" type="text" name="key" class="form-control text-white bg-black" value="{{ $setting->key }}">

            <label for="value" class="mt-3">Value</label>
            <textarea id="value" name="value" class="form-control text-white bg-black markdown-editor" rows="5">{{ $setting->value }}</textarea>

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Update
            </button>
        </form>

        <hr>

        <form id="form-delete" action="{{ route('api.admin.setting.destroy', [$setting]) }}" method="DELETE">
            <button type="button" class="btn btn-danger btn-delete">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </div>
@endsection
