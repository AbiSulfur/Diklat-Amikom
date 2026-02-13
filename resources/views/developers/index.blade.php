@extends('layouts.app')

@section('title', 'Manage Developers')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-people me-2"></i>Developer Team</h5>
        <a href="{{ route('developers.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-person-plus me-1"></i> Add New Developer
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover datatable w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Assigned Projects</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($developers as $developer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-bold">{{ $developer->name }}</td>
                    <td><span class="badge bg-primary">{{ $developer->role }}</span></td>
                    <td>
                        <span class="badge bg-secondary">{{ $developer->projects_count }} Projects</span>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('developers.destroy',$developer->id) }}" method="POST">
                            <a class="btn btn-info btn-sm text-white" href="{{ route('developers.show',$developer->id) }}" title="View"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ route('developers.edit',$developer->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this developer?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
