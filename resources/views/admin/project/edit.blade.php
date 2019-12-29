@extends('layouts.admin')
@section('title')
    Admin - Project - Edit - {{ $project->title }}
@endsection

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Project' => route('admin.home.index'),
                "Edit - {$project->title}" => route('admin.project.edit', [$project])
            ]
        ])
    </div>
@endsection
