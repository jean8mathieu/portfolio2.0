@extends('layouts.admin')
@section('title', 'Admin - Setting - Create')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Setting' => route('admin.setting.index'),
                'Create' => route('admin.setting.create')
            ]
        ])

        <form action="{{ route('api.admin.setting.store') }}" id="form" method="POST">
            <label for="name">Key</label>
            <input id="name" type="text" name="key" class="form-control text-white bg-black">

            <label for="value" class="mt-3">Value</label>
            <textarea id="value" name="value" class="form-control text-white bg-black markdown-editor" rows="5"></textarea>

            <button type="button" class="btn btn-success btn-submit click mt-3">
                Create
            </button>
        </form>
    </div>
@endsection
