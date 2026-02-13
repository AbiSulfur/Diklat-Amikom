@extends('layouts.app')

@section('title', 'Report Bug')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Report New Bug</h5>
                <a href="{{ route('bugs.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
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

                <form action="{{ route('bugs.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Bug Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Enter bug title (e.g. Game crash on level 2)">
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

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="severity" class="form-label">Severity</label>
                            <select name="severity" class="form-select" id="severity">
                                <option value="Ringan" {{ old('severity') == 'Ringan' ? 'selected' : '' }}>Low (Ringan)</option>
                                <option value="Sedang" {{ old('severity') == 'Sedang' ? 'selected' : '' }}>Medium (Sedang)</option>
                                <option value="Berat" {{ old('severity') == 'Berat' ? 'selected' : '' }}>High (Berat)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option value="Belum Diperbaiki" {{ old('status') == 'Belum Diperbaiki' ? 'selected' : '' }}>Open (Belum Diperbaiki)</option>
                                <option value="Sedang Diperbaiki" {{ old('status') == 'Sedang Diperbaiki' ? 'selected' : '' }}>In Progress (Sedang Diperbaiki)</option>
                                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Resolved (Selesai)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Describe the issue in detail...">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-triangle me-1"></i> Submit Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
