@extends('layouts.app')

@section('title', 'Edit Asset')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Edit Asset Details</h5>
                <a href="{{ route('assets.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('assets.update', $asset->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Asset Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $asset->name }}" placeholder="Enter asset name">
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Asset Type</label>
                        <select name="type" class="form-select" id="type">
                            <option value="image" {{ $asset->type == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="audio" {{ $asset->type == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="model" {{ $asset->type == 'model' ? 'selected' : '' }}>3D Model</option>
                             <option value="document" {{ $asset->type == 'document' ? 'selected' : '' }}>Document</option>
                            <option value="video" {{ $asset->type == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="archive" {{ $asset->type == 'archive' ? 'selected' : '' }}>Archive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="project_id" class="form-label">Project</label>
                        <select name="project_id" class="form-select" id="project_id">
                            <option value="" disabled>Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ $asset->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current File</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ basename($asset->file_path) }}" disabled readonly>
                            <a href="{{ $asset->file_path }}" target="_blank" class="btn btn-outline-secondary">Download</a>
                        </div>
                        <div class="form-text">To replace the file, please delete this asset and upload a new one.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Update Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
