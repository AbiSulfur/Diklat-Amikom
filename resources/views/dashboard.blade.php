@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Dashboard Overview</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                    <p class="card-text">You are now logged in to the Game Project Management System.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('projects.index') }}" class="btn btn-primary">
                            <i class="bi bi-folder2-open me-1"></i> Manage Projects
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

