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
    </div>
@endsection
