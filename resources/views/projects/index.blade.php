@extends('layouts.app')

@section('title', 'Manage Projects')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-list-task me-2"></i>Project List</h5>
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Project
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover datatable w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Platform</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-bold">{{ $project->title }}</td>
                    <td><span class="badge bg-secondary">{{ $project->genre }}</span></td>
                    <td>{{ $project->platform }}</td>
                    <td>
                        @if($project->status == 'Konsep')
                            <span class="badge bg-info text-dark">Konsep</span>
                        @elseif($project->status == 'Development')
                            <span class="badge bg-warning text-dark">Development</span>
                        @elseif($project->status == 'Release')
                            <span class="badge bg-success">Release</span>
                        @else
                            <span class="badge bg-light text-dark">{{ $project->status }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                            <a class="btn btn-info btn-sm text-white" href="{{ route('projects.show',$project->id) }}" title="View"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ route('projects.edit',$project->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this project?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
