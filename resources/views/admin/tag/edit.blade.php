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
    </div>
@endsection
