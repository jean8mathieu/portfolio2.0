@extends('layouts.admin')
@section('title')
    Admin - Setting
@endsection

@section('content')
    <div class="container">
        <h1>Tags
            <span class="float-right">
                <a href="{{ route('admin.setting.create') }}" class="btn btn-success" title="Create a new tag">
                    <i class="fas fa-plus"></i>
                </a>
            </span>
        </h1>

        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Key</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>
            @forelse($settings as $setting)
                <tr>
                    <th scope="row">{{ $setting->id }}</th>
                    <td>{{ $setting->key }}</td>
                    <td>{{ $setting->created_at }}</td>
                    <td>{{ $setting->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.setting.edit', [$setting]) }}" class="btn btn-primary" title="Edit tag">
                            <i class="far fa-edit"></i>
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
            {!! $settings->render() !!}
        </div>
    </div>
@endsection
