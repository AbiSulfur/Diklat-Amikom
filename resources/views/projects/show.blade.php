@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Project Details: {{ $project->title }}</h5>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Game Title:</div>
                    <div class="col-md-8">{{ $project->title }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Genre:</div>
                    <div class="col-md-8"><span class="badge bg-secondary">{{ $project->genre }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Platform:</div>
                    <div class="col-md-8">{{ $project->platform }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Status:</div>
                    <div class="col-md-8">
                        @if($project->status == 'Konsep')
                            <span class="badge bg-info text-dark">Konsep</span>
                        @elseif($project->status == 'Development')
                            <span class="badge bg-warning text-dark">Development</span>
                        @elseif($project->status == 'Release')
                            <span class="badge bg-success">Release</span>
                        @else
                            <span class="badge bg-light text-dark">{{ $project->status }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Description:</div>
                    <div class="col-md-8 text-secondary">
                        {{ $project->description ?: 'No description available.' }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Created At:</div>
                    <div class="col-md-8">{{ $project->created_at->format('d M Y, H:i') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Last Updated:</div>
                    <div class="col-md-8">{{ $project->updated_at->format('d M Y, H:i') }}</div>
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end gap-2">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i> Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
