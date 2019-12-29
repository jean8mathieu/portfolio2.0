@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Projects
            <span class="float-right">
                <a href="#" class="btn btn-success" title="Create a new project">
                    <i class="fas fa-plus"></i>
                </a>
            </span>
        </h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created By</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
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
                    <a href="#" class="btn btn-primary" title="Edit project">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger" title="Delete project">
                        <i class="far fa-trash-alt"></i>
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
