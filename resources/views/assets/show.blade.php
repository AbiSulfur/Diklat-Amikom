@extends('layouts.app')

@section('title', 'Asset Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Asset Details</h5>
                <a href="{{ route('assets.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 text-center mb-3 mb-md-0">
                        @if($asset->type == 'image')
                            <img src="{{ $asset->file_path }}" class="img-fluid rounded border shadow-sm" alt="{{ $asset->name }}">
                        @elseif($asset->type == 'audio')
                            <div class="p-5 bg-light rounded border">
                                <i class="bi bi-music-note-beamed display-1 text-secondary"></i>
                            </div>
                            <audio controls class="w-100 mt-3">
                                <source src="{{ $asset->file_path }}">
                                Your browser does not support the audio element.
                            </audio>
                        @elseif($asset->type == 'video')
                             <div class="p-2 bg-light rounded border">
                                <video controls class="w-100">
                                    <source src="{{ $asset->file_path }}">
                                    Your browser does not support the video element.
                                </video>
                            </div>
                        @else
                            <div class="p-5 bg-light rounded border">
                                <i class="bi bi-file-earmark-text display-1 text-secondary"></i>
                            </div>
                        @endif
                        
                        <div class="mt-3">
                            <a href="{{ $asset->file_path }}" target="_blank" class="btn btn-primary w-100">
                                <i class="bi bi-download me-1"></i> Download File
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <h4 class="mb-3">{{ $asset->name }}</h4>
                        
                        <table class="table table-borderless">
                            <tr>
                                <th class="ps-0" style="width: 100px;">Type:</th>
                                <td><span class="badge bg-secondary">{{ strtoupper($asset->type) }}</span></td>
                            </tr>
                            <tr>
                                <th class="ps-0">Project:</th>
                                <td>
                                    <a href="{{ route('projects.show', $asset->project->id) }}" class="text-decoration-none fw-bold">
                                        {{ $asset->project->title }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th class="ps-0">Uploaded:</th>
                                <td>{{ $asset->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="ps-0">File URL:</th>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" value="{{ asset($asset->file_path) }}" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="navigator.clipboard.writeText('{{ asset($asset->file_path) }}')">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end gap-2">
                <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square me-1"></i> Edit Details</a>
            </div>
        </div>
    </div>
</div>
@endsection
