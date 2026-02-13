@extends('layouts.app')

@section('title', 'Bug Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-danger">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0"><i class="bi bi-bug-fill me-2"></i>Bug Report Details</h5>
                <a href="{{ route('bugs.index') }}" class="btn btn-light btn-sm text-danger"><i class="bi bi-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body">
                <h4 class="mb-3">{{ $bug->title }}</h4>
                
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Project:</div>
                    <div class="col-md-9">
                        <a href="{{ route('projects.show', $bug->project->id) }}" class="text-decoration-none fw-bold">
                            {{ $bug->project->title }}
                        </a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Severity:</div>
                    <div class="col-md-9">
                        @if($bug->severity == 'Ringan')
                            <span class="badge bg-success">Low (Ringan)</span>
                        @elseif($bug->severity == 'Sedang')
                            <span class="badge bg-warning text-dark">Medium (Sedang)</span>
                        @elseif($bug->severity == 'Berat')
                            <span class="badge bg-danger">High (Berat)</span>
                        @else
                            <span class="badge bg-secondary">{{ $bug->severity }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Status:</div>
                    <div class="col-md-9">
                        @if($bug->status == 'Belum Diperbaiki')
                            <span class="badge bg-danger">Open (Belum Diperbaiki)</span>
                        @elseif($bug->status == 'Sedang Diperbaiki')
                            <span class="badge bg-warning text-dark">In Progress (Sedang Diperbaiki)</span>
                        @elseif($bug->status == 'Selesai')
                            <span class="badge bg-success">Resolved (Selesai)</span>
                        @else
                            <span class="badge bg-light text-dark">{{ $bug->status }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Description:</div>
                    <div class="col-md-9">
                        <div class="p-3 bg-light rounded border">
                            {!! nl2br(e($bug->description)) !!}
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top text-muted small">
                    Reported: {{ $bug->created_at->format('d M Y, H:i') }} | Last Updated: {{ $bug->updated_at->format('d M Y, H:i') }}
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end gap-2">
                <a href="{{ route('bugs.edit', $bug->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i> Edit Report</a>
            </div>
        </div>
    </div>
</div>
@endsection
