@extends('layouts.admin');

@section('title','Modifica progetto');

@section('content');

<form action="{{ route("admin.projects.update", $project) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" id="title" value="{{ $project->title }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ $project->slug }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" id="description" rows="5" class="form-control">{{ $project->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="image-preview mb-2">
        @endif
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
        <div class="form-text">Lascia vuoto per mantenere l'immagine attuale. Formato consigliato 16:9, max 2MB.</div>
    </div>

    <div class="mb-3">
        <label for="repo_url" class="form-label">Link repository GitHub</label>
        <input type="url" name="repo_url" id="repo_url" value="{{ $project->repo_url }}" class="form-control" placeholder="https://github.com/...">
    </div>

    <div class="mb-3">
        <label for="type_id" class="form-label">Tipologia</label>
        <select name="type_id" id="type_id" class="form-control">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @selected($project->type_id === $type->id)>{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

</form>

@endsection