@extends('layouts.app')

@section('title', 'Add Developer')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0">Add New Developer</h5>
                <a href="{{ route('developers.index') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
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

                <form action="{{ route('developers.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter developer name">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-select" id="role">
                            <option value="" disabled selected>Select Role</option>
                            <option value="Programmer" {{ old('role') == 'Programmer' ? 'selected' : '' }}>Programmer</option>
                            <option value="Game Designer" {{ old('role') == 'Game Designer' ? 'selected' : '' }}>Game Designer</option>
                            <option value="2D Artist" {{ old('role') == '2D Artist' ? 'selected' : '' }}>2D Artist</option>
                            <option value="3D Artist" {{ old('role') == '3D Artist' ? 'selected' : '' }}>3D Artist</option>
                            <option value="Sound Designer" {{ old('role') == 'Sound Designer' ? 'selected' : '' }}>Sound Designer</option>
                            <option value="Writer" {{ old('role') == 'Writer' ? 'selected' : '' }}>Writer</option>
                            <option value="QA Tester" {{ old('role') == 'QA Tester' ? 'selected' : '' }}>QA Tester</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assign Projects</label>
                        <div class="card p-3 bg-light">
                            @if($projects->count() > 0)
                                <div class="row">
                                    @foreach($projects as $project)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="projects[]" value="{{ $project->id }}" id="project_{{ $project->id }}" {{ in_array($project->id, old('projects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="project_{{ $project->id }}">
                                                    {{ $project->title }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">No projects available. <a href="{{ route('projects.create') }}">Create a project first.</a></p>
                            @endif
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Save Developer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
