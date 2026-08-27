@extends('layouts.admin')

@section('page-title', $project->title)

@section('content')
<a href="{{ route('admin.projects.index') }}" class="btn btn-link ps-0 mb-3 text-decoration-none">
    <i class="bi bi-arrow-left"></i> {{ __('Torna ai progetti') }}
</a>

<div class="project-show card overflow-hidden">
    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-cover">
    @else
        <div class="project-cover project-cover-placeholder">
            <i class="bi bi-image"></i>
        </div>
    @endif

    <div class="card-body p-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge project-slug-badge">{{ $project->slug }}</span>
        @if ($project->type)
            <span class="badge project-slug-badge">{{ $project->type->name }}</span>
        @endif
        </div>

        

        <h1 class="project-title">{{ $project->title }}</h1>

        <p class="project-description">{{ $project->description }}</p>
    </div>
</div>
@endsection
