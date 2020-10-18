@extends('layouts.admin')
@section('title', 'Admin - Home')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Blog' => route('admin.blog.index')
            ]
        ])

        <h1>Blogs
            <span class="float-right">
                <a href="{{ route('admin.blog.create') }}" class="btn btn-success" title="Create a new blog">
                    <i class="fas fa-plus"></i>
                </a>
            </span>
        </h1>

        <table class="table table-dark table-hover text-white mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created By</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->user->username }}</td>
                    <td>{{ $blog->created_at }}</td>
                    <td>{{ $blog->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.blog.edit', [$blog]) }}" class="btn btn-primary" title="Edit blog">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="table-danger">There's currently no blog</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <hr>

        <div class="row justify-content-center">
            {!! $blogs->render() !!}
        </div>
    </div>
@endsection

@section('js')

@endsection
