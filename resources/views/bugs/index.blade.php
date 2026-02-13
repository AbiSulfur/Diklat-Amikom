@extends('layouts.app')

@section('title', 'Bug Reports')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-bug me-2"></i>Bug Tracker</h5>
        <a href="{{ route('bugs.create') }}" class="btn btn-danger btn-sm">
            <i class="bi bi-exclamation-circle me-1"></i> Report New Bug
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover datatable w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Project</th>
                    <th>Severity</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bugs as $bug)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-bold">{{ $bug->title }}</td>
                    <td>
                        <a href="{{ route('projects.show', $bug->project->id) }}" class="text-decoration-none">
                            {{ $bug->project->title }}
                        </a>
                    </td>
                    <td>
                        @if($bug->severity == 'Ringan')
                            <span class="badge bg-success">Low</span>
                        @elseif($bug->severity == 'Sedang')
                            <span class="badge bg-warning text-dark">Medium</span>
                        @elseif($bug->severity == 'Berat')
                            <span class="badge bg-danger">High</span>
                        @else
                            <span class="badge bg-secondary">{{ $bug->severity }}</span>
                        @endif
                    </td>
                    <td>
                        @if($bug->status == 'Belum Diperbaiki')
                            <span class="badge bg-danger">Open</span>
                        @elseif($bug->status == 'Sedang Diperbaiki')
                            <span class="badge bg-warning text-dark">In Progress</span>
                        @elseif($bug->status == 'Selesai')
                            <span class="badge bg-success">Resolved</span>
                        @else
                            <span class="badge bg-light text-dark">{{ $bug->status }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('bugs.destroy',$bug->id) }}" method="POST">
                            <a class="btn btn-info btn-sm text-white" href="{{ route('bugs.show',$bug->id) }}" title="View"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ route('bugs.edit',$bug->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this bug report?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
