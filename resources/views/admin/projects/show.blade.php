@extends('layouts.admin')

@section('page-title', $project->title)

@section('content')
<a href="{{ route('admin.projects.index') }}" class="btn btn-link ps-0 mb-3 text-decoration-none">
    <i class="bi bi-arrow-left"></i> Torna ai progetti
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

        <div class="d-flex flex-wrap gap-2 mb-3">
            @foreach ($project->technologies as $technology)
                <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
            @endforeach
        </div>

        <div class="d-flex gap-2 mt-3">
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="btn btn-outline-dark">
                    <i class="bi bi-github"></i> Repository
                </a>
            @endif
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-secondary">
                <i class="bi bi-pencil"></i> Modifica
            </a>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-trash"></i> Elimina
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi eliminare il progetto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Elimina definitivamente">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
