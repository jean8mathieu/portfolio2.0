@extends('layouts.admin')
@section('title', 'Admin - Experience')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Admin' => route('admin.home.index'),
                'Experience' => route('admin.experience.index')
            ]
        ])

        <h1>Experience
            <span class="float-right">
                <a href="{{ route('admin.experience.create') }}" class="btn btn-success" title="Create a new Experience">
                    <i class="fas fa-plus"></i>
                </a>
            </span>
        </h1>

        <table class="table table-dark table-hover text-white mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Position</th>
                <th scope="col">Company name</th>
                <th scope="col">Started at</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @forelse($experiences as $experience)
                <tr>
                    <th scope="row">{{ $experience->id }}</th>
                    <td>{{ $experience->position }}</td>
                    <td>{{ $experience->company_name }}</td>
                    <td>{{ $experience->started_at }}</td>
                    <td>{{ $experience->created_at }}</td>
                    <td>{{ $experience->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.experience.edit', [$experience]) }}" class="btn btn-primary" title="Edit Experience">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="table-danger">There's currently no experience</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <hr>

        <div class="row justify-content-center">
            {!! $experiences->render() !!}
        </div>
    </div>
@endsection

@section('js')

@endsection
