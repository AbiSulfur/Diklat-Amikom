@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Create New Project</h5>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
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

                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Game Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Enter game title">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" name="genre" class="form-control" id="genre" value="{{ old('genre') }}" placeholder="e.g. RPG, FPS, Puzzle">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="platform" class="form-label">Platform</label>
                            <select name="platform" class="form-select" id="platform">
                                <option value="" disabled selected>Select Platform</option>
                                <option value="PC" {{ old('platform') == 'PC' ? 'selected' : '' }}>PC</option>
                                <option value="Android" {{ old('platform') == 'Android' ? 'selected' : '' }}>Android</option>
                                <option value="iOS" {{ old('platform') == 'iOS' ? 'selected' : '' }}>iOS</option>
                                <option value="Console" {{ old('platform') == 'Console' ? 'selected' : '' }}>Console</option>
                                <option value="Web" {{ old('platform') == 'Web' ? 'selected' : '' }}>Web</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" id="status">
                            <option value="Konsep" {{ old('status') == 'Konsep' ? 'selected' : '' }}>Konsep</option>
                            <option value="Development" {{ old('status') == 'Development' ? 'selected' : '' }}>Development</option>
                            <option value="Release" {{ old('status') == 'Release' ? 'selected' : '' }}>Release</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Brief description of the game...">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
