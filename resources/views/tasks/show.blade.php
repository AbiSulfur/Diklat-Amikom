@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Task Details</h5>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body">
                <h4 class="mb-3">{{ $task->title }}</h4>
                
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Project:</div>
                    <div class="col-md-9">
                        <a href="{{ route('projects.show', $task->project->id) }}" class="text-decoration-none fw-bold">
                            {{ $task->project->title }}
                        </a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Status:</div>
                    <div class="col-md-9">
                        @if($task->status == 'Pending')
                            <span class="badge bg-secondary">Pending</span>
                        @elseif($task->status == 'In Progress')
                            <span class="badge bg-warning text-dark">In Progress</span>
                        @elseif($task->status == 'Completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-light text-dark">{{ $task->status }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Description:</div>
                    <div class="col-md-9 text-secondary">
                        {{ $task->description ?: 'No description provided.' }}
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top text-muted small">
                    Created: {{ $task->created_at->format('d M Y, H:i') }} | Last Updated: {{ $task->updated_at->format('d M Y, H:i') }}
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end gap-2">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i> Edit Task</a>
            </div>
        </div>
    </div>
</div>
@endsection
