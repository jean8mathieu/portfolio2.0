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
    </div>
@endsection
