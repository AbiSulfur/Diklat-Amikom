@extends('layouts.app')

@section('title', 'Manage Assets')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0"><i class="bi bi-folder-symlink me-2"></i>Asset Library</h5>
        <a href="{{ route('assets.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-cloud-upload me-1"></i> Upload New Asset
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover datatable w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Project</th>
                    <th>File</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-bold">{{ $asset->name }}</td>
                    <td><span class="badge bg-secondary">{{ strtoupper($asset->type) }}</span></td>
                    <td>
                        <a href="{{ route('projects.show', $asset->project->id) }}" class="text-decoration-none">
                            {{ $asset->project->title }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ $asset->file_path }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('assets.destroy',$asset->id) }}" method="POST">
                            <a class="btn btn-info btn-sm text-white" href="{{ route('assets.show',$asset->id) }}" title="View"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-primary btn-sm" href="{{ route('assets.edit',$asset->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this asset?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
