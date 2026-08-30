@extends('layouts.admin');

@section('title','Modifica progetto');

@section('content');

<form action="{{ route("admin.projects.update", $project) }}" method="POST">

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
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="mb-3">
        <label for="repo_url" class="form-label">Link repository GitHub</label>
        <input type="url" name="repo_url" id="repo_url" value="{{ $project->repo_url }}" class="form-control" placeholder="https://github.com/...">
    </div>

</form>

@endsection