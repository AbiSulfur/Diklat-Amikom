@extends('layouts.app')

@section('title', 'Manage Tasks')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-list-check me-2"></i>Task List</h5>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add New Task
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover datatable w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Project</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-bold">{{ $task->title }}</td>
                    <td>
                        <a href="{{ route('projects.show', $task->project->id) }}" class="text-decoration-none">
                            {{ $task->project->title }}
                        </a>
                    </td>
                    <td>
                        @if($task->status == 'Pending')
                            <span class="badge bg-secondary">Pending</span>
                        @elseif($task->status == 'In Progress')
                            <span class="badge bg-warning text-dark">In Progress</span>
                        @elseif($task->status == 'Completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-light text-dark">{{ $task->status }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                            <a class="btn btn-info btn-sm text-white" href="{{ route('tasks.show',$task->id) }}" title="View"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit',$task->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this task?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
