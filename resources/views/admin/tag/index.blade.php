@extends('layouts.admin')
@section('title')
    Admin - Tag
@endsection

@section('content')
    <div class="container">
        <h1>Tags
            <span class="float-right">
                <a href="{{ route('admin.tag.create') }}" class="btn btn-success" title="Create a new tag">
                    <i class="fas fa-plus"></i>
                </a>
            </span>
        </h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Created Ny</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>{{ \App\Models\Tag::$types[$tag->type] }}</td>
                    <td>{{ $tag->user->username }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>{{ $tag->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.tag.edit', [$tag]) }}" class="btn btn-primary" title="Edit tag">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('api.admin.tag.destroy', [$tag]) }}" class="btn btn-danger" title="Delete tag">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="100" class="table-danger">There's currently no tag</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <hr>

        <div class="row justify-content-center">
            {!! $tags->render() !!}
        </div>
    </div>
@endsection
