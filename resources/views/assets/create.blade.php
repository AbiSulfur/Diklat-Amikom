@extends('layouts.app')

@section('title', 'Upload Asset')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Upload New Asset</h5>
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

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Asset Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter asset name">
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Asset Type</label>
                        <select name="type" class="form-select" id="type">
                            <option value="" disabled selected>Select Type</option>
                            <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image (Sprite, Background)</option>
                            <option value="audio" {{ old('type') == 'audio' ? 'selected' : '' }}>Audio (SFX, Music)</option>
                            <option value="model" {{ old('type') == 'model' ? 'selected' : '' }}>3D Model</option>
                            <option value="document" {{ old('type') == 'document' ? 'selected' : '' }}>Document (GDD, Script)</option>
                            <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="archive" {{ old('type') == 'archive' ? 'selected' : '' }}>Archive (ZIP, RAR)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="project_id" class="form-label">Project</label>
                        <select name="project_id" class="form-select" id="project_id">
                            <option value="" disabled selected>Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Upload</label>
                        <input class="form-control" type="file" id="file" name="file" required>
                        <div class="form-text">Max file size: 10MB.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-upload me-1"></i> Upload Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
