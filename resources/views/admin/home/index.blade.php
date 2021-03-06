@extends('layouts.admin')
@section('title', 'Admin - Home')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index')
            ]
        ])

        <h1>Projects
            <span class="float-right">
                <a href="{{ route('admin.project.create') }}" class="btn btn-success" title="Create a new project">
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
            @forelse($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->user->username }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.project.edit', [$project]) }}" class="btn btn-primary" title="Edit project">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="table-danger">There's currently no project</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <hr>

        <div class="row justify-content-center">
            {!! $projects->render() !!}
        </div>
    </div>
@endsection

@section('js')

@endsection
