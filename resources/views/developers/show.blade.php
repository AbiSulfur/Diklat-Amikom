@extends('layouts.app')

@section('title', 'Developer Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Developer Details</h5>
                <a href="{{ route('developers.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="display-1 text-secondary mb-3"><i class="bi bi-person-circle"></i></div>
                    <h3 class="fw-bold">{{ $developer->name }}</h3>
                    <span class="badge bg-primary fs-6">{{ $developer->role }}</span>
                </div>

                <hr>

                <h5 class="mb-3"><i class="bi bi-folder2-open me-2"></i>Assigned Projects</h5>
                @if($developer->projects->count() > 0)
                    <div class="list-group">
                        @foreach($developer->projects as $project)
                            <a href="{{ route('projects.show', $project->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $project->title }}</h6>
                                    <small class="text-muted">{{ $project->platform }}</small>
                                </div>
                                <span class="badge bg-secondary">{{ $project->status }}</span>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        This developer is not assigned to any projects yet.
                    </div>
                @endif
                
                <div class="mt-4 text-center">
                    <div class="text-muted small">Joined: {{ $developer->created_at->format('d M Y') }}</div>
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end gap-2">
                <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i> Edit Developer</a>
            </div>
        </div>
    </div>
</div>
@endsection
